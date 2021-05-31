<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('index.php/Actividades') ?>">Actividades</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Reporte Mensual</h1>
        </div>
    </div>
    <div class="shadow rounded border-light p-3 w-100">
        <?php $this->load->view('actividades/ajax/historia_actividad', array('encabezado' => $encabezado, 'detalles' => $detalles), FALSE); ?>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="mb-3">
                    <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                </div>
                <form>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="mes">Mes a reportar</label>
                        <select class="form-select" id="mes" aria-label="Meses">
                            <option selected disabled>Seleccione una opción</option>
                            <?php foreach ($detalles as $key => $detalle): ?>
                                <?php if(!$detalle->realizado_fisico || !$detalle->realizado_financiero): ?>
                                <option value="<?= $detalle->actividad_detallada_id ?>" data-programado_fisico="<?= $detalle->programado_fisico ?>" data-programado_financiero="<?= $detalle->programado_financiero ?>"><?= strftime( "%B", DateTime::createFromFormat('!m', $detalle->mes)->getTimestamp() ); ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <legend>Avance Físico</legend>
                        <p id="programado_fisico" class="lead"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="fisico-reportado">Valor físico a reportar</label>
                        <input id="fisico-reportado" name="fisico_reportado" type="number" class="form-control" value="0" data-tipo="fisico" min="0" required>
                    </div>
                    <div class="col-12">
                        <legend>Avance Financiero</legend>
                        <p id="programado_financiero" class="lead"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="fisico-financiero">Valor financiero a reportar</label>
                        <input id="fisico-financiero" name="fisico_financiero" type="number" class="form-control" value="0" data-tipo="financiero" min="0" required>
                    </div>
                    <div class="mt-3">
                        <button id="guardar" type="button" class="btn btn-dark">Reportar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/actividades/reporte.js') ?>" type="text/javascript" charset="utf-8" async defer></script>