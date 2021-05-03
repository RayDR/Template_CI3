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
            'nombre': 'area_origen',
            'texto' : 'Área de Origen'
        },
        {
            'nombre': 'area_destino',
            'texto' : 'Área de Destino'
        },
        {
            'nombre': 'tema',
            'texto' : 'Tema del Acuerdo'
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

            if (  valor == '' || valor == null  || valor == undefined )
                errores += `El campo <a href="#${input.nombre}">${input.texto}</a> es requerido.<br>`;
        });

        if ( ! errores ){
            respuesta   = fu_json_query(
                url('Acuerdos/registrar_acuerdo', true, false),
                datos 
            );
            if ( respuesta.exito ){
                if ( respuesta.acuerdo_id ) $('#acuerdo_id').val(respuesta.acuerdo_id);
                if ( respuesta.seguimiento_id ) $('#seguimiento_id').val(respuesta.seguimiento_id);

                if ( carga_doctos ){
                    $('#guardar').prop({disabled: true});
                    $('#guardar').parent().html('');
                    var documentos = Dropzone.forElement("div#cargar_documento");
                    if ( documentos ){
                        documentos.processQueue();
                        documentos.on("successmultiple", function(files, response) {
                            // Evento al finalizar la carga
                        });
                        var historial = fu_muestra_vista(
                            url('Acuerdos/get_historial', true, false), 
                            {
                                'acuerdo_id'     : $('#acuerdo_id').val(),
                                'seguimiento_id' : $('#seguimiento_id').val()
                            }
                        );
                        if ( historial )
                            $('#ver-historial').html( historial ); 
                        // Mostrar modal de guardado exitoso
                        fu_modal(
                            '', fu_muestra_vista(url('Acuerdos/get_modal_exitoso', true, false)),
                            '<button onclick="frecargar()" type="button" class="btn btn-lg btn-white text-tertiary">Salir</button>',
                            'lg','exito', false
                        );
                        $(".progress-bar").animate({
                            width: "100%"
                        }, 1000);
                    } else 
                        frecargar();
                } else{
                    $('#guardar').prop({disabled: false});
                    frecargar();
                }
                
                if ( carga_doctos ){
                    $('#guardar').prop({disabled: true});
                    var documentos = Dropzone.forElement("div#cargar_documento");
                    if ( documentos.processQueue() ) {
                        alert('simon');
                        setTimeout(function() {
                            window.location.replace( url('Acuerdos') ); 
                        }, 3000);
                    }
                } else{
                    $('#guardar').prop({disabled: false});
                    window.location.replace( url('Acuerdos') ); 
                }
            } else
                fu_notificacion(respuesta.mensaje, 'danger');
        } else {
            $('#guardar').prop({disabled: false});
            $('#guardar').html(`Guardar`);
            fu_alerta(errores, 'danger');
            fu_notificacion('Existen campos pendientes por llenar.', 'danger');    
        }
    } catch(e) {
        $('#guardar').prop({disabled: false});
        $('#guardar').html(`Guardar`);
        fu_alerta('Ha ocurrido un error al guardar el acuerdo, intentelo más tarde.', 'danger');
    }
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