<!-- AlloyUI JS -->
<script src="<?= base_url('vendor/alloyui_3.0.1/build/aui/aui-min.js') ?>" type="text/javascript" charset="utf-8" async defer></script> 
<!-- AlloyUI -->
<link type="text/css" href="<?= base_url('assets/css/alloyui.css') ?>" rel="stylesheet">
<!-- Global CSS -->
<link href="<?= base_url('assets/css/global.css') ?>" rel="stylesheet" />

<script type="text/javascript" charset="utf-8">
	var acuerdos = <?= json_encode($acuerdos, JSON_HEX_TAG); ?>;
</script>
<div class="pb-4">
	<nav aria-label="breadcrumb" style="margin: 0; !important">
	    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
	        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
	        <li class="breadcrumb-item active" aria-current="page">Acuerdos</li>
	    </ol>
	</nav>
	<div class="d-flex justify-content-between w-100 flex-wrap">
	    <div class="mb-5 mb-lg-0">
	        <h1 class="h4">Seguimiento de Acuerdos - Modo Agenda</h1>
	    </div>
	</div>
	<div class="btn-group" role="group" aria-label="Botones de Acción">
	    <button id="nuevo_acuerdo" class="btn btn-dark btn-sm">
	        <span class="fas fa-plus me-2"></span><span class="d-none d-md-inline">Nuevo Acuerdo</span>
	    </button>
	    <a href="<?= base_url('index.php/Acuerdos') ?>" class="btn btn-sm btn-primary" type="button">
	        <span class="far fa-calendar me-2"></span><span class="d-none d-md-inline">Vista en Tabla</span>
	    </a>
	    <button id="vista_calendario" class="btn btn-sm btn-outline-primary disabled" type="button" disabled>
	        <span class="fas fa-search me-2"></span><span class="d-none d-md-inline">Buscar Acuerdo</span>
	    </button>
	</div>
</div>
<div id="wrapper">
	<div id="planificador_acuerdos"></div>
</div>

<script src="<?= base_url('assets/js/acuerdos/ajax/scheduler.js') ?>" type="text/javascript" charset="utf-8" async defer></script>