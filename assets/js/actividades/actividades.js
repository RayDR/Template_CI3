// Variables globales
var dt, 
    dtNombre     = '#dtActividades', 
    dtAjaxUrl    = 'Actividades/datatable_acuerdos'
    vRegistro    = 'Actividades/registrar',
    vSeguimiento = 'Actividades/seguimiento';

$(document).ready(function() {
    $('#nueva_actividad').click( fnueva_actividad );
    fCargar_DataTable();
});

function fCargar_DataTable(){
    if ( $.fn.dataTable.isDataTable( dtNombre ) ) 
        dt = $(dtNombre).DataTable();
    else {
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
                { data: 'acuerdo_id' },
                { data: 'asunto' },
                { data: 'area_acuerdo' },
                { data: 'area_seguimiento' },            
                { data: 'folio' },
                { data: 'seguimiento' },
                { data: 'fecha_creacion_acuerdo' },
                { data: 'fecha_creacion_seguimiento' },
                { data: 'estatus_seguimiento' }
            ],
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
            }
        });
    }
}

function fnueva_actividad(e){
    if ( e == null || e == undefined )
        return;
    var vista = fu_muestra_vista('Actividades/registrar');
    if ( vista )
        $('#ajax-html').html(vista);
}