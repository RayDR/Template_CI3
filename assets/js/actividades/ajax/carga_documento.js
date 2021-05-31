$(document).ready(function($) {
    carga_doctos    = new Dropzone("div#cargar_documento", 
    { 
        url:        url(`Acuerdos/anexar_documento`, true, false),
        paramName:  'file',
        maxFilesize:        10, // MB
        maxFiles:           5,
        parallelUploads:    15,
        addRemoveLinks:     true,
        autoProcessQueue:   false,
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
        formData.append("acuerdo", $('#acuerdo_id').val());
        formData.append("seguimiento", $('#seguimiento_id').val());
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
                    fu_notificacion('Documentos guardados', 'success');
            }
            if ( response.error )
                fu_notificacion(response.error, (response.exito)? 'info': 'danger');
        } catch(e) {
            fu_toast(e);
        }
    });

});