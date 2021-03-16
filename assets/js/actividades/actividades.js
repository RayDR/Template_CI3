var dt;
$(document).ready(function() {
	$('#nueva_actividad').click( fnueva_actividad );
	fCargar_DataTable();
});

function fCargar_DataTable(){
	if ( $.fn.dataTable.isDataTable( '#dtActividades' ) ) 
		dt = $('#dtActividades').DataTable();
	else {
		dt = $("#dtActividades").DataTable({
			bStateSave:         false,
			sPaginationType:    "full_numbers",
			dom:                '<"row text-center mb-3"<"col-12"B>><"row d-flex justify-content-between"<"col-6"l><"col-6"f>>t<"mb-3"i>p',
			buttons: [
				{ 
					extend : 'excel',
					text   : 'Exportar' 
				},
				{
					extend: 'colvis',
					text: 'Columnas',
					columns: ':gt(0)'
				}
			],
			drawCallback: function( settings ) {
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