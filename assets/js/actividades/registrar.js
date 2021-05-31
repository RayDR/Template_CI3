var inputs;

$(document).off('change','.objetivos').on('change','.objetivos',fajustar_meses);
$(document).off('change','.meses').on('change','.meses',fcalcular_total);

$(document).ready(function() {
    $('#guardar').click(fguardar);

    $('.selector-tipo').click(ftipo_registro);
    $('#area_origen').change(fget_ums);

    finicia_select2();
});

function finicia_select2(){
    // Estilizar Select2
    $('.form-select').select2();
    // Configurar Select2 de Áreas
    var datos_select2 = fu_json_query(url('Configurador/get_areas_select2', true, false));
    if ( datos_select2 ){
        if ( datos_select2.exito ){
            $('.areas_select2').select2({
                data: datos_select2.result,
                pagination: {
                    'more': true
                }
            });
        }
    }
    // Configurar Select2 de Proyectos
    var datos_select2 = fu_json_query(url('Configurador/get_proyectos_select2', true, false));
    if ( datos_select2 ){
        if ( datos_select2.exito ){
            $('.proyectos_select2').select2({
                data: datos_select2.result,
                pagination: {
                    'more': true
                }
            });
        }
    }
}

function fguardar(e){
    e.preventDefault();
    $('#guardar').html(`
        <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span class="ms-1">Registrando...</span>
        </button>`);

    var respuesta,
        errores = '',
        datos   = {};

    if ( inputs ){ // Verifica si se seleccionó proyecto o preproyecto
        try {
            // Validar valores
            inputs.forEach( function(input, index) {
                let valor           = $(`#${input.nombre}`).val();
                datos[input.nombre] = valor;
                if ( input.nombre == 'financiero_objetivo_anual' || input.nombre == 'fisico_objetivo_anual'){
                    if ( valor < 1 )
                        errores += `El <a href="#${input.nombre}">${input.texto}</a> no puede ser 0.<br>`;
                } else if ( input.nombre == 'programado-fisico' ){
                    if ( !fejecuta_calculo_total('fisico') )
                        errores += `El <a href="#${input.nombre}">${input.texto}</a> no es correcto.<br>`;
                    else{
                        pFisico = $(`#${input.nombre} .meses`);
                        dFisico = [];
                        pFisico.each(function(index, mes) {
                            dFisico.push($(mes).val());
                        });
                        datos[input.nombre] = dFisico;
                    }
                } else if ( input.nombre == 'programado-financiero' ){
                    if ( !fejecuta_calculo_total('financiero') )
                        errores += `El <a href="#${input.nombre}">${input.texto}</a> no es correcto.<br>`;
                    else{
                        pFinanciero = $(`#${input.nombre} .meses`);
                        dFinanciero = [];
                        pFinanciero.each(function(index, mes) {
                            dFinanciero.push($(mes).val());
                        });
                        datos[input.nombre] = dFinanciero;
                    }
                } else if( valor == '' || valor == null || valor == undefined )
                    errores += `El campo <a href="#${input.nombre}">${input.texto}</a> es requerido.<br>`;
                
            });
            if ( ! errores ){
                respuesta   = fu_json_query(
                    url('Actividades/guardar', true, false),
                    datos 
                );
                if ( respuesta.exito ){
                    fu_notificacion('Se ha registrado la actividad exitosamente.', 'success');
                    window.location.replace( url('Actividades') );
                } else
                    fu_notificacion(respuesta.mensaje, 'danger');
            } else {
                fu_alerta(errores, 'danger');
                fu_notificacion('Existen campos pendientes por llenar.', 'danger');    
            }
        } catch(e) {
            fu_alerta('Ha ocurrido un error al guardar la actividad, intentelo más tarde.', 'danger');
        }
    } else {
        fu_alerta(
            'Primero seleccione el tipo de registro de la actividad. <a href="#tipo_registro"><b>Proyecto</b> ó <b>Preproyecto</b></a>', 
            'danger'
        );
        fu_notificacion('Seleccione la opción de Proyecto o Preproyecto para continuar.', 'danger');  
    }

    $('#guardar').prop({disabled: false});
    $('#guardar').html(`Guardar`);
}

function flinea_accion(){
    var seleccion = $(this).find(':selected');
    if ( seleccion ){
        $('#datos_linea_accion').html(`
            <label class="h6"><span class="text-secondary">Objetivo:</span> <small class="font-weight-bold">${seleccion.data('objetivo')}</small></label>
            <br>
            <label class="h6"><span class="text-secondary">Estrategia:</span> <small class="font-weight-bold">${seleccion.data('estrategia')}</small></label>
        `);
    }
}

function fget_ums(){
    var combinacion_area = $(this).val();
    if ( combinacion_area ){
        var respuesta = fu_json_query(url('Actividades/select_unidades_medida', true, false), {combinacion_area: combinacion_area});
        if ( respuesta ){
            if ( respuesta.exito ){
                $('#unidad_medida').html('<option selected disabled>Seleccione una opción</option>');
                respuesta.unidades_medida.forEach( function(unidad_medida, index) {
                    $('#unidad_medida').append(`
                        <option value="${unidad_medida.unidad_medida_id}">${unidad_medida.descripcion} (${unidad_medida.cve_medida})</option>
                    `);
                });
            }
            if ( respuesta.mensaje )
                fu_notificacion(respuesta.mensaje, (!respuesta.exito)? 'danger' : 'warning');
        } else 
            fu_notificacion('No se obtuvo respuesta del servidor.', 'danger');
    }
}

function fajustar_meses(){
    var total = $(this).val(),
        tipo  = $(this).data('tipo');       // Tipo de programado;
    $(`#${tipo}_rebase`).html('');          // Limpiar errores
    
    var meses = $(`#programado-${tipo} .meses`);  

    meses.each(function(index, mes) {       // Restablecer meses
        $(mes).removeClass('is-valid').removeClass('is-invalid');
        $(mes).attr({readonly: false});
        $(mes).val(0);
    });

    if ( total <= 0 ){              // Bloquea
        $(`#programado-${tipo} .meses`).val('').attr({readonly : true});
    } else if ( total < 10000000000 ){      // Autodistribuye
        let index = 1;
        while( total > 0 ){
            switch (index) {        // Agregar valor a mes
                case 1:
                    $(`#${tipo}_enero`).val( parseFloat($(`#${tipo}_enero`).val()) + 1 );
                    break;
                case 2:
                    $(`#${tipo}_febrero`).val( parseFloat($(`#${tipo}_febrero`).val()) + 1 );
                    break;
                case 3:
                    $(`#${tipo}_marzo`).val( parseFloat($(`#${tipo}_marzo`).val()) + 1 );
                    break;
                case 4:
                    $(`#${tipo}_abril`).val( parseFloat($(`#${tipo}_abril`).val()) + 1 );
                    break;
                case 5:
                    $(`#${tipo}_mayo`).val( parseFloat($(`#${tipo}_mayo`).val()) + 1 );
                    break;
                case 6:
                    $(`#${tipo}_junio`).val( parseFloat($(`#${tipo}_junio`).val()) + 1 );
                    break;
                case 7:
                    $(`#${tipo}_julio`).val( parseFloat($(`#${tipo}_julio`).val()) + 1 );
                    break;
                case 8:
                    $(`#${tipo}_agosto`).val( parseFloat($(`#${tipo}_agosto`).val()) + 1 );
                    break;
                case 9:
                    $(`#${tipo}_septiembre`).val( parseFloat($(`#${tipo}_septiembre`).val()) + 1 );
                    break;
                case 10:
                    $(`#${tipo}_octubre`).val( parseFloat($(`#${tipo}_octubre`).val()) + 1 );
                    break;
                case 11:
                    $(`#${tipo}_noviembre`).val( parseFloat($(`#${tipo}_noviembre`).val()) + 1 );
                    break;
                case 12:
                    $(`#${tipo}_diciembre`).val( parseFloat($(`#${tipo}_diciembre`).val()) + 1 );
                    break;
            }
            if ( index == 12 )  // Reiniciar Mes
                index = 1;
            else                // Cambiar de Mes 
                index++;
            total--;            // Restar total
        }
    }
}

function fcalcular_total(){
    var tipo    = $(this).data('tipo'); // Tipo de programado

    fejecuta_calculo_total(tipo);
}

function fejecuta_calculo_total(tipo){
    var meses   = $(`#programado-${tipo} .meses`),      // Lista de meses
        totalA  = $(`#${tipo}_objetivo_anual`).val(),   // Total Anual
        totalP  = 0         // Total Ponderado
        exito   = false;    // Respuesta de resultado

    $(`#${tipo}_rebase`).html('');  // Limpiar errores

    meses.each(function(index, mes) { // Obtener total ponderado
        $(mes).removeClass('is-valid');
        totalP += parseFloat($(mes).val());
    });
    if ( parseFloat(totalA) != parseFloat(totalP) ){
        $(this).addClass('is-invalid');
        if ( parseFloat(totalA) < parseFloat(totalP) )
            $(`#${tipo}_rebase`).html(`
                El ponderado mensual es <b>mayor</b> que el <b>Objetivo Anual</b>. 
                <span class="font-weight-bold text-primary">Excedente: ${ parseFloat(totalP) - parseFloat(totalA) }</span>
            `);
        else if ( parseFloat(totalA) > parseFloat(totalP) )
            $(`#${tipo}_rebase`).html(`
                El ponderado mensual es <b>menor</b> que el <b>Objetivo Anual</b>. 
                <span class="font-weight-bold text-primary">Restante: ${ parseFloat(totalA) - parseFloat(totalP) }</span>
            `);
        else
            $(`#${tipo}_rebase`).html(`Ajuste el <b>Objetivo Anual</b> o redistribuya el <b>Mensual Ponderado</b> según sea necesario.`);
    } else {
        meses.each(function(index, mes) { $(mes).removeClass('is-invalid').addClass('is-valid'); });
        exito = true;
    }
    return exito; 
}

function ftipo_registro(){
    var tipo = $(this).data(tipo);
    if ( tipo ){
        var respuesta = fu_json_query(url('Actividades/tipo_registro', true, false), tipo);
        if ( respuesta ){
            if ( respuesta.exito ){
                $('#tipo_registro').parent().html(respuesta.html);
                inputs = respuesta.inputs;
                $('#programados').show();
            }
            if ( respuesta.mensaje )
                fu_notificacion(respuesta.mensaje, (!respuesta.exito)? 'danger' : 'warning');
        } else 
            fu_notificacion('No se obtuvo respuesta del servidor.', 'danger');
    }
}

function fget_localidades(){
    var municipio = $(this).val();
    if ( municipio ){
        var respuesta = fu_json_query(url('Actividades/select_localidades', true, false), {municipio: municipio});
        if ( respuesta ){
            if ( respuesta.exito ){
                $('#localidad').html('<option selected disabled>Seleccione una opción</option>');
                respuesta.localidades.forEach( function(localidad, index) {
                    $('#localidad').append(`
                        <option value="${localidad.localidad_id}">${localidad.descripcion}</option>
                    `);
                });
            }
            if ( respuesta.mensaje )
                fu_notificacion(respuesta.mensaje, (!respuesta.exito)? 'danger' : 'warning');
        } else 
            fu_notificacion('No se obtuvo respuesta del servidor.', 'danger');
    }
}