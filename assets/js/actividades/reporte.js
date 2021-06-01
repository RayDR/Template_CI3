$(document).ready(function() {
   $('#mes').change(frep_reporte);

   $('#guardar').click(frep_guardar);
});

function frep_guardar(e){
   e.preventDefault();
   $('#guardar').html(`
      <button class="btn btn-primary" type="button" disabled>
         <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
         <span class="ms-1">Registrando...</span>
      </button>`);

   var respuesta,
       errores = '',
       datos   = {
         'actividad_detallada':  $('#actividad_detallada_id').val(),
         'mes':                  $('#mes').val(),
         'fisico':               $('#fisico-reporte').val(),
         'financiero':           $('#financiero-reporte').val()
       };

   if ( $('#mes').val() == '' || $('#mes').val() == undefined || $('#mes').val() == null )
      errores += 'Por favor, seleccione un <a href="#mes">mes</a> a reportar';
   if ( $('#fisico-reporte').val() < 0 ) 
      errores += 'La cantidad reportada física no puede ser menor de 0';
   // else if ( $('#fisico-reporte').val() > $('#programado_fisico').val() )
   //    errores += 'La cantidad reportada física no puede ser mayor a lo programado';
   if ( $('#financiero-reporte').val() < 0 ) 
      errores += 'La cantidad reportada financiera no puede ser menor de 0';
   // else if ( $('#financiero-reporte').val() > $('#programado_fisico').val() )
   //    errores += 'La cantidad reportada financiera no puede ser mayor a lo programado';
   if ( $('#actividad_detallada_id').val() == null || $("#actividad_detallada_id").val() == undefined )
      $('#actividad_detallada_id').val($(this).find('option:selected').data('actividad_detallada'));

   if ( !errores ){
      respuesta   = fu_json_query(
         url('Actividades/registrar_reporte', true, false),
         datos 
      );
      if ( respuesta.exito ){
         // Mostrar modal de guardado exitoso
         fu_modal(
            '', fu_muestra_vista(url('Acuerdos/get_modal_exitoso', true, false)),
            '<button onclick="frecargar()" type="button" class="btn btn-lg btn-white text-tertiary">Salir</button>',
            'lg','exito', false
         );
         $(".progress-bar").animate({
            width: "100%"
         });
        
      } else
         fu_notificacion(respuesta.mensaje, 'danger', 5000);

      $('#guardar').prop({disabled: false});
      $('#guardar').html(`Guardar`);
   }
}

function frep_reporte(e){
   var rp_Fisico           = $(this).find('option:selected').data('programado_fisico'),
       rp_Financiero       = $(this).find('option:selected').data('programado_financiero'),
       actividad_detallada = $(this).find('option:selected').data('actividad_detallada');

   if ( rp_Fisico )
      $('#fisico-reporte').val(rp_Fisico);
   if ( rp_Financiero )
      $('#financiero-reporte').val(rp_Financiero);

   $('#actividad_detallada_id').val(actividad_detallada);
}