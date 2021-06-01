$(document).ready(function($) {
    carga_doctos    = new Dropzone("div#cargar_documento", 
    { 
        url:        url(`Actividades/anexar_documento`, true, false),
        paramName:  'file',
        maxFilesize:        10, // MB
        maxFiles:           1,
        parallelUploads:    1,
        addRemoveLinks:     true,
        autoProcessQueue:   true,
        uploadMultiple:     true,
        timeout: 180000, // 3minutos
        // TRADUCCIONES
        dictDefaultMessage: `<span class="h4">Arrastre y suelte sus archivos aquí.</span><br>
                                <i class="fa fa-cloud-upload text-primary fa-3x"></i>`,
        dictCancelUpload:   'Cancelar',
        dictRemoveFile:     `<i class="fa fa-trash text-danger"></i>`,
        dictRemoveFileConfirmation: `¿Eliminar este archivo de la cola?`,
        dictFileTooBig:     'El archivo excede el tamaño máximo permitido de {{maxFilesize}} MB.',
        dictUploadCanceled: 'Carga de archivo cancelada.',
        dictMaxFilesExceeded:   'No es posible cargar mas de {{maxFiles}} archivos.',
    });

    // EVENTOS
    carga_doctos.on("addedfile", function(file) {
        //console.log(file);
    });

    carga_doctos.on("removedfile", function(file) {
        //console.log(file);
    });

    carga_doctos.on("sendingmultiple", function(file, xhr, formData) {
        formData.append("actividad_id", $('#actividad_detallada_id').val());
    });

    carga_doctos.on("errormultiple", function(file, response) {
        fu_notificacion(response, 'danger');
    });

    carga_doctos.on("successmultiple", function(file, response) {
        try {
            response = JSON.parse(response);
            if ( response.exito ){
                if ( response.error )
                    fu_notificacion(response.error, 'info');
                else
                    fu_notificacion('Documento guardado', 'success');
            }
            if ( response.error )
                fu_notificacion(response.error, (response.exito)? 'info': 'danger');
        } catch(e) {
            fu_toast(e);
        }
    });

});