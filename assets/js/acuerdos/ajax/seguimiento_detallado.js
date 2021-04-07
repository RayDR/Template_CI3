$(document).ready(function($) {
	$('#asignar').change(fasignar_usuario);
});

function fasignar_usuario(){
	var usuario 	= $(this).val();
	var acuerdo 	= $('#acuerdo').val();
	var seguimiento = $('#seguimiento').val();
	if ( usuario && acuerdo && seguimiento ){
		var datos = {};
			datos['usuario'] = usuario;
			datos['acuerdo'] = acuerdo;
			datos['seguimiento'] = seguimiento;
		var asignacion = fu_json_query( 
			url('Acuerdos/asignar_usuario'), 
			datos
		);
		if ( asignacion ){
			if ( asignacion.exito ){
				fu_notificacion('Usuario asignado exitosamente', 'success');
				factualizar_historial();
			}
			else
				fu_notificacion(asignacion.error, 'danger');
		}
	} else 
		fu_notificacion('Falló la operacion. Por favor recargue su ventana', 'danger');
}

function factualizar_historial(){
	var vista = fu_muestra_vista( url('Acuerdos/historial_acuerdo'), {'acuerdo': $('#acuerdo').val()} );
    if ( vista )
        $('#historial').html(vista);
}