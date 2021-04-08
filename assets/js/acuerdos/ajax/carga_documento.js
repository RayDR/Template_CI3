$(document).ready(function($) {
    var acuerdo     = $('#acuerdo_id').val(),
        seguimiento = $('#seguimiento_id').val();
        carga_doctos    = $("div#cargar_documento").dropzone(
        { 
            url:        url(`Acuerdos/anexar_documento/${acuerdo}${(!seguimiento)? '': '/' + seguimiento}`, true, false),
            paramName:  'file',
            maxFilesize:    10, // MB
            maxFiles:       5,
            addRemoveLinks:     true,
            // TRADUCCIONES
            dictDefaultMessage: `<span class="h4">Arrastre y suelte sus archivos aquí.</span><br>
                                    <i class="fa fa-cloud-upload text-primary fa-3x"></i>`,
            dictRemoveFile:     `<i class="fa fa-trash text-danger"></i>`,
            dictFileTooBig:     'El archivo excede el tamaño máximo permitido de {{maxFilesize}} MB.',
            dictUploadCanceled: 'Carga de archivo cancelada.',
            dictMaxFilesExceeded:   'No es posible cargar mas de {{maxFiles}} archivos.',
            // EVENTOS
            success: function(file, response){
                try {
                    response = JSON.parse(response);
                    if ( response.exito )
                        fu_notificacion('Documento guardado', 'success');
                    if ( response.error )
                        fu_notificacion(response.error, (response.exito)? 'info': 'danger');
                } catch(e) {
                    console.log(e);
                }
            }
        });
});