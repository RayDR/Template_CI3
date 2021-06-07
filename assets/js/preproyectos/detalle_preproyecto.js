$(document).ready(function() {
	$('#editar').click(fda_mostrar_editar);
	$('#reporte').click(fda_mostrar_reporte);
});

function fda_mostrar_editar(){
	fu_notificacion('<i class="fas fa-spinner fa-pulse"></i>&nbsp;Cargando edición','info',1000);
	var preproyecto = ( $(this).data('preproyecto_id') )? $(this).data('preproyecto_id') : $('#preproyecto_id').val();
	setTimeout(function() {
   		var html = fu_muestra_vista(url('Preproyectos/editar'), {preproyecto: preproyecto} );
   		if ( html ){
   			fu_modal();
   			$('#ajax-html').html(html);
   		} else 
   			fu_notificacion('No se pudo cargar la edición', 'danger');
	}, 10);
}

function fda_mostrar_reporte(){
	fu_notificacion('<i class="fas fa-spinner fa-pulse"></i>&nbsp;Cargando reporte','info',1000);
	var preproyecto = ( $(this).data('preproyecto_id') )? $(this).data('preproyecto_id') : $('#preproyecto_id').val();
	setTimeout(function() {
   		var html = fu_muestra_vista(url('Preproyectos/reporte'), {preproyecto: preproyecto} );
   		if ( html ){
   			fu_modal();
   			$('#ajax-html').html(html);
   		} else 
   			fu_notificacion('No se pudo cargar el reporte', 'danger');
	}, 10);
}