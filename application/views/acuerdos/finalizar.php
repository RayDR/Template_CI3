<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('index.php/Acuerdos') ?>">Acuerdos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Finalizar el Acuerdo</h1>
        </div>
    </div>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <p class="ml-2 mb-0"><b>Acuerdo:</b> <?= $historial[0]->acuerdo_id ?></p>
        </div>
        <div class="mb-3 mb-lg-0">
            <p class="ml-2 mb-0"><b>Asunto:</b> <?= $historial[0]->asunto ?></p>
        </div>
        <div class="mb-3 mb-lg-0">
            <p class="ml-2 mb-0"><b>Origen:</b> <?= $historial[0]->area_acuerdo ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form>
                    <input type="hidden" id="acuerdo_id" name="acuerdo_id" value="<?= $acuerdo_id ?>">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                        </div>
                    </div>
                    <input type="hidden" id="acuerdo_id" name="acuerdo_id" value="<?= $acuerdo_id ?>">
                    <input type="hidden" id="destino" name="destino" value="<?= $historial[0]->combinacion_area_seguimiento_id ?>">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div>
                                <label for="acuerdos">Resumen</label>
                                <textarea class="form-control" placeholder="Detalle del acuerdo" id="acuerdos" name="acuerdos" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="anexo" class="form-label">Evidencias</label>
                            <input class="form-control" type="file" id="anexo">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button id="guardar" type="submit" class="btn btn-danger">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/acuerdos/finalizar.js') ?>" type="text/javascript" charset="utf-8" async defer></script>