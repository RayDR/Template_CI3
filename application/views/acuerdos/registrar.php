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
            <h1 class="h4">Registrar Acuerdo</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="area_origen">Área Origen</label>
                            <select class="form-select" id="area_origen" name="area_origen" aria-label="Áreas">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($areas as $key => $area): ?>
                                <option value="<?= $area->direccion_id ?>,<?= $area->subdireccion_id ?>,<?= $area->departamento_id ?>,<?= $area->area_id ?>">[<?= $area->cve_direccion  ?> | <?= $area->cve_subdireccion ?> | <?= $area->cve_departamento ?> | <?= $area->cve_area ?>]  <?= ($area->direccion == 'NINGUNA')? '': $area->direccion . ' - '  ?><?= ($area->subdireccion == 'NINGUNA')? '': $area->subdireccion . ' - '  ?><?= ($area->departamento == 'NINGUNA')? '': $area->departamento . ' - ' ?><?= ($area->area == 'NINGUNA')? '': $area->area ?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="area_destino">Área a Turnar</label>
                            <select class="form-select" id="area_destino" name="area_destino" aria-label="Áreas">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($areas as $key => $area): ?>
                                <option value="<?= $area->direccion_id ?>,<?= $area->subdireccion_id ?>,<?= $area->departamento_id ?>,<?= $area->area_id ?>">[<?= $area->cve_direccion  ?> | <?= $area->cve_subdireccion ?> | (<?= $area->cve_area ?>)]  <?= ($area->direccion == 'NINGUNA')? '': $area->direccion . ' - '  ?><?= ($area->subdireccion == 'NINGUNA')? '': $area->subdireccion . ' - '  ?><?= ($area->departamento == 'NINGUNA')? '': $area->departamento . ' - ' ?><?= ($area->area == 'NINGUNA')? '': $area->area ?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div>
                                <label for="acuerdos">Acuerdos</label>
                                <textarea class="form-control" placeholder="Detalle del acuerdo" id="acuerdos" name="acuerdos" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button id="guardar" type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/acuerdos/registrar.js') ?>" type="text/javascript" charset="utf-8" async defer></script>