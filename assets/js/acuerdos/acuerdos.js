// Variables globales
var dt, 
    dtNombre  = '#dtAcuerdos', 
    dtAjaxUrl = 'Acuerdos/datatable_acuerdos'
    vRegistro = 'Acuerdos/registrar';

$(document).ready(function() {
    $('#nuevo_acuerdo').click(fmuestra_registro);

    finicia_datatable();
    fmuestra_registro();

    $(`${dtNombre} tbody`).on('click', 'tr', function () {
        fu_notificacion('Mostaremos el detalle de los acuerdo');
        setTimeout(function() {
            var data = dt.row( this ).data();
        }, 250);
    });
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
            { data: 'acuerdo_id'  },
            { data: 'descripcion' },
            { 
                data: null,
                render: function(data){
                    return `<span class="badge badge-lg bg-primary">${data.direccion_origen} 
                            [${data.cve_direccion_origen},${data.cve_subdireccion_origen},
                            ${data.cve_departamento_origen},${data.cve_area_origen} ]</span>`;
                }  
            },
            { 
                data: null,
                render: function(data){
                    return `<span class="badge badge-lg bg-info">${data.direccion_destino} 
                            [${data.cve_direccion_destino},${data.cve_subdireccion_destino},
                            ${data.cve_departamento_destino},${data.cve_area_destino} ]</span>`;
                }  
            }          
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