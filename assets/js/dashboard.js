$(document).ready(function($) {
	$('#nueva_actividad').click( fnueva_actividad );
});

function fnueva_actividad(){
	var vista = fu_muestra_vista('Actividades/registrar');
	$('#ajax-html').html(vista);
}