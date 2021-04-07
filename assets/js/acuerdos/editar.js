$(document).ready(function() {
    $('#guardar').click(fguardar);
    $('#tema').change(fdias_respuesta);

    var datos_select2 = fu_json_query(url('Configurador/get_areas_select2'));
    if ( datos_select2 ){
        if ( datos_select2.exito ){
            $('.areas_select2').select2({
                data: datos_select2.result,
                pagination: {
                    'more': true
                }
            });

            $('#area_destino').val($('#destino').val()).trigger('change');
        }
    }
});

function fguardar(e){
    e.preventDefault();
    $('#guardar').prop({disabled: true});
    $('#guardar').html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="ms-1">Finalizando...</span>`);

    var respuesta,
        errores = '',
        datos   = {},
        inputs  = [
        {
            'nombre': 'acuerdo_id'
        },
        {
            'nombre': 'seguimiento_id'
        },        
        {
            'nombre': 'tema',
            'texto' : 'Tema'
        },
        {
            'nombre': 'area_destino',
            'texto' : 'Área de Destino'
        },
        {
            'nombre': 'acuerdos',
            'texto' : 'Acuerdos'
        }
    ];

    try {
        // Validar valores
        inputs.forEach( function(input, index) {
            let valor           = $(`#${input.nombre}`).val();
            datos[input.nombre] = valor;

            if (  valor == '' )
                errores += `El campo <a href="#${input.nombre}">${input.texto}</a> es requerido.`;
        });

        if ( ! errores ){
            respuesta   = fu_json_query(
                url('Acuerdos/edicion_acuerdo', true, false),
                datos 
            );
            if ( respuesta.exito ){
                fu_notificacion('Se ha actualizado el acuerdo exitosamente.', 'success');
                window.location.replace( url('Acuerdos') );
            } else
                fu_notificacion(respuesta.mensaje, 'danger');
        } else {
            fu_alerta(errores, 'danger');
            fu_notificacion('Existen campos pendientes por llenar.', 'success');    
        }
    } catch(e) {
        fu_alerta('Ha ocurrido un error al guardar el acuerdo, intentelo más tarde.', 'danger');
    }
    
    $('#guardar').prop({disabled: false});
    $('#guardar').html(`Guardar`);
}

function fdias_respuesta(){
    var dias = $(this).find(':selected').data('respuesta');
    if ( dias ){
        $('#detalle_tema').html(`
            <span class="text-success">Fecha probable de respuesta: 
            ${ moment().add(dias, 'days').format('DD/MM/YYYY')}
            </span>
        `);
    }
}