// Variables globales
var dt, 
    dtNombre  = '#dtAcuerdos', 
    dtAjaxUrl = 'Acuerdos/datatable_acuerdos'
    vRegistro = 'Acuerdos/registrar';

$(document).ready(function() {
    $('#nuevo_acuerdo').click(fmuestra_registro);

    finicia_datatable();
    fmuestra_registro();
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
            { data: 'acuerdo_id'      },
            { data: 'seguimiento'     },
            { data: 'area_origen_id'  },
            { data: 'area_destino_id' },
            { data: 'comentarios'     },
            { data: 'estatus_acuerdo' }            
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

function fmuestra_registro(e){
    if ( e == null || e == undefined )
        return;
    var vista = fu_muestra_vista( url(vRegistro, true, false) );
    if ( vista )
        $('#ajax-html').html(vista);
}