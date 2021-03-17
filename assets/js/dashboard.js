function fnueva_actividad(){
	var vista = fu_muestra_vista(url('Actividades/registrar'));
	$('#ajax-html').html(vista);
}

function fnuevo_acuerdo(){
	var vista = fu_muestra_vista(url('Acuerdos/registrar'));
	$('#ajax-html').html(vista);
}