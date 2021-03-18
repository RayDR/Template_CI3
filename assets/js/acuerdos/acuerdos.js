// Variables globales
var dt, 
    dtNombre  = '#dtAcuerdos', 
    dtAjaxUrl = 'Acuerdos/datatable_acuerdos'
    vRegistro = 'Acuerdos/registrar';

$(document).off('click','.seguimiento-detallado').on('click','.seguimiento-detallado', fseguimiento_detallado);
$(document).ready(function() {
    $('#nuevo_acuerdo').click(fmuestra_registro);

    finicia_datatable();
    fmuestra_registro();

    $(`${dtNombre} tbody`).on('click', 'tr td', fdetalle_acuerdo);
});

function finicia_datatable(){
    dt = $(dtNombre).DataTable({
        bStateSave: true,
        sPaginationType: "full_numbers",
        scrollX: true,
        scrollCollapse: true,
        dom: '<"row text-center mb-3"<"col-12"B>><"row d-flex justify-content-between"<"col-6"l><"col-6"f>>t<"mb-3"i>p',
        buttons: [
            {
                text: 'Actualizar',
                action: function (e, dt, node, config) {                    
                    $(this).prop({ disabled: true });
                    factualiza_datatable();
                    $(this).prop({ disabled: false });
                }
            },
            { 
                extend : 'excel',
                text   : 'Exportar' 
            },
            {
                extend: 'colvis',
                text: 'Columnas',
                columns: ':gt(0)',
            }
        ],
        ajax: {
            url: url(dtAjaxUrl, true, false),
            type: "POST",
            dataSrc: ''
        },
        columns: [
            { 
                data: null,
                render: function(data){
                    return `<a href="#seguimiento-${data.acuerdo_id}" 
                                class="detalles">
                            ${data.folio}</a>`;
                }
            },
            {
                data: null,
                render: function(data){
                    return `<a href="#seguimiento-${data.acuerdo_id}" 
                                class="detalles">
                            ${data.folio}</a>`;
                }
            },
            { data: 'asunto'      },
            { 
                data: null,
                render: function(data){
                    return `<span class="badge badge-lg bg-primary">${data.cve_direccion_actividad},${data.cve_subdireccion_actividad},${data.cve_departamento_actividad},${data.cve_area_actividad}</span> 
                            ${data.direccion_actividad},${data.subdireccion_actividad},${data.departamento_actividad},${data.area_actividad}`;
                }  
            },
            { 
                data: null,
                render: function(data){
                    return `<span class="badge badge-lg bg-primary">${data.cve_direccion_ad},${data.cve_subdireccion_ad},${data.cve_departamento_ad},${data.cve_area_ad}</span> 
                            ${data.direccion_ad},${data.subdireccion_ad},${data.departamento_ad},${data.area_ad}`;
                }  
            },
            { data: 'seguimiento_act'    },
            { data: 'ejercicio_actividad_act' },
            { data: 'fecha_creacion'     },
            { data: 'fecha_modificacion' },
            { data: 'estatus_acuerdo_ad' }
        ],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
        },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
        }
    });
}

function factualiza_datatable(mensaje = '', tipo = ''){
    if ( $.fn.dataTable.isDataTable(dtNombre) ) {        
        dt.ajax.reload(null, false);
        mensaje = ( mensaje == '' )? 'Tabla actualizada.': mensaje;
        tipo    = ( tipo == '' )? 'success' : tipo;
        fu_toast(mensaje, '', tipo);
    }
}

function fdetalle_acuerdo(){
    var tr   = $(this).closest('tr');
        row  = dt.row( tr );

    var data = dt.row( tr ).data();

    if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown dt-detalles');
    } else {
        if ( data ){
            row.child( fseguimiento_acuerdo(data) ).show();
            tr.addClass('shown dt-detalles');
        }
    }
}

function fseguimiento_acuerdo(data){ 
   var contenido = $('<div/>')
        .addClass( 'cargando' )
        .text( 'Cargando...' );

   var html = fu_muestra_vista(url('Acuerdos/detalles_acuerdo'), {acuerdo: data.acuerdo_id} );
   return html;
}

function fmuestra_registro(e){
    if ( e == null || e == undefined )
        return;
    var vista = fu_muestra_vista( url(vRegistro, true, false) );
    if ( vista )
        $('#ajax-html').html(vista);
}

function fseguimiento_detallado(){
    var acuerdo = $(this).data('acuerdo');
    var html    = fu_muestra_vista(url('Acuerdos/seguimiento_detallado'), {acuerdo: acuerdo});
    if ( html ){
        fu_modal('Seguimiento de Acuerdos', html);
    } else 
        fu_modal('404');
}