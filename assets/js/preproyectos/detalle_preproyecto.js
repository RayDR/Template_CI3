$(document).ready(function() {
    $('#editar').click(fda_mostrar_editar);
    $('#actividad').click(fda_mostrar_actividades);

    $('.opcion-detalles').hover(fda_mostrar_detalles);
    $('.opcion-detalles').mouseleave(fda_ocultar_detalles);
});

$(document).on('mouseover','[data-bs-toggle="tooltip"]', function() {
    $(this).tooltip("disable").tooltip("hide"); 
    $(this).tooltip("enable").tooltip("show"); 
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

function fda_mostrar_actividades(){
    fu_notificacion('<i class="fas fa-spinner fa-pulse"></i>&nbsp;Cargando formulario de actividad','info',1000);
    var preproyecto = ( $(this).data('preproyecto_id') )? $(this).data('preproyecto_id') : $('#preproyecto_id').val();
    setTimeout(function() {
        var html = fu_muestra_vista(url('Preproyectos/actividades'), {preproyecto: preproyecto} );
        if ( html ){
            fu_modal();
            $('#ajax-html').html(html);
        } else 
            fu_notificacion('No se pudo cargar el actividades', 'danger');
    }, 10);
}

function fda_mostrar_detalles(){
    var target = $(this).data('target');
    $(target).show('slow');
}

function fda_ocultar_detalles(){
    var target = $(this).data('target');
    $(target).hide('fast');
}
