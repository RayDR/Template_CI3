$(document).ready(function() {
    $('#guardar').click(fguardar);
});

function fguardar(e){
    e.preventDefault();

    var errores = '',
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
        if ( $(`#${input.nombre}`).val() == '' )
            errores += `El campo <a href="#${input.nombre}">${input.texto}</a> es requerido.`;
    });

    if ( ! errores ){
        var respuesta   = fu_json_query(
            url('Acuerdos/registrar_acuerdo', true, false),
            datos 
        );
    } else {
        fu_alerta(errores, 'success');
        fu_notificacion('Existen campos pendientes por llenar.');    
    }
}