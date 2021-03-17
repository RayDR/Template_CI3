$(document).ready(function() {
    $('#guardar').click(fguardar);
});

function fguardar(e){
    e.preventDefault();
    $('#guardar').prop({disabled: true});
    $('#guardar').html(`
        <div class="spinner-border spinner-border-sm" role="status">
        <span class="sr-only">Registrando...</span>
        </div>`);

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
            'nombre': 'acuerdos',
            'texto' : 'Acuerdos'
        }
    ];

    // Validar valores
    inputs.forEach( function(input, index) {
        let valor           = $(`#${input.nombre}`).val();
        datos[input.nombre] = valor;

        if (  valor == '' )
            errores += `El campo <a href="#${input.nombre}">${input.texto}</a> es requerido.`;
    });

    if ( ! errores ){
        inputs.forEach( function(input, index) {
            
        });
        respuesta   = fu_json_query(
            url('Acuerdos/registrar_acuerdo', true, false),
            datos 
        );
        if ( respuesta.exito ){
            fu_notificacion('Se ha registrado el acuerdo exitosamente.', 'success'); 
        } else
            fu_notificacion(respuesta.mensaje, 'danger');
    } else {
        fu_alerta(errores, 'danger');
        fu_notificacion('Existen campos pendientes por llenar.', 'success');    
    }

    $('#guardar').prop({disabled: false});
    $('#guardar').html(`Guardar`);

    inputs.forEach( function(input, index) {
        $(`#${input.nombre}`).val('');
    });
}