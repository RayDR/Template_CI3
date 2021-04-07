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
			url('Acuerdos/asignar_usuario', 
			datos
		));
		if ( asignacion ){
			if ( asignacion.exito )
				fu_notificacion('Usuario asignado exitosamente', 'success');
			else
				fu_notificacion('No se pudo asignar al usuario, intente más tarde', 'danger');
		}
	} else 
		fu_notificacion('Falló la operacion. Por favor recargue su ventana', 'danger');
}