$(document).ready(function() {
	$('#editar').click(fda_mostrar_editar);
	$('#reporte').click(fda_mostrar_reporte);
});

$(document).on('mouseover','[data-bs-toggle="tooltip"]', function() {
    $(this).tooltip("disable").tooltip("hide"); 
    $(this).tooltip("enable").tooltip("show"); 
});

function fda_mostrar_editar(){
	fu_notificacion('<i class="fas fa-spinner fa-pulse"></i>&nbsp;Cargando edición','info',1000);
	var actividad = ( $(this).data('actividad_id') )? $(this).data('actividad_id') : $('#actividad_id').val();
	setTimeout(function() {
   		var html = fu_muestra_vista(url('Actividades/editar'), {actividad: actividad} );
   		if ( html ){
   			fu_modal();
   			$('#ajax-html').html(html);
   		} else 
   			fu_notificacion('No se pudo cargar la edición', 'danger');
	}, 10);
}

function fda_mostrar_reporte(){
	fu_notificacion('<i class="fas fa-spinner fa-pulse"></i>&nbsp;Cargando reporte','info',1000);
	var actividad = ( $(this).data('actividad_id') )? $(this).data('actividad_id') : $('#actividad_id').val();
	setTimeout(function() {
   		var html = fu_muestra_vista(url('Actividades/reporte'), {actividad: actividad} );
   		if ( html ){
   			fu_modal();
   			$('#ajax-html').html(html);
   		} else 
   			fu_notificacion('No se pudo cargar el reporte', 'danger');
	}, 10);
}