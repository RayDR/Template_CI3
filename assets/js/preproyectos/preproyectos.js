// Variables globales
var dt, 
    dtNombre     = '#dtPreproyectos', 
    dtAjaxUrl    = 'Preproyectos/datatable_preproyectos'
    vRegistro    = 'Preproyectos/registrar',
    vSeguimiento = 'Preproyectos/seguimiento';

$(document).off('click.detalle', 'tbody tr')
           .on('click.detalle' , 'tbody tr', fmostrar_detalle);
$(document).ready(function() {
    $('#nuevo_preproyecto').click( fnuevo_preproyecto );
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
                { data: 'preproyecto_id' },
                { data: 'actividad' },
                { data: 'cantidad_beneficiarios' },
                { data: 'inversion' },
                { data: 'fecha_inicio' },
                { data: 'fecha_termino' },
                { data: 'url' }
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

function fnuevo_preproyecto(e){
    if ( e == null || e == undefined )
        return;
    var vista = fu_muestra_vista('Preproyectos/registrar');
    if ( vista )
        $('#ajax-html').html(vista);
}

function fmostrar_detalle(){
    var preproyecto = dt.row($(this).closest('tr')).data();
    var html = fu_muestra_vista(url('Preproyectos/detalles_preproyecto'), { preproyecto_id: preproyecto.preproyecto_id });
    if ( html ){
        fu_modal('Detalle de Preproyecto', html );
    } else 
        fu_modal('404');
}

function frecargar(){
    setTimeout(function() {
        window.location.replace( url('Preproyectos') ); 
    }, 1000);
}