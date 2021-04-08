<script type="text/javascript" charset="utf-8" async defer> var carga_doctos; </script>
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
            <h1 class="h4">Registro de Seguimiento</h1>
        </div>
    </div>
    <div class="shadow rounded border-light p-3 w-100">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="mb-3 mb-lg-0">
                <p class="ml-2 mb-0"><b>Acuerdo:</b> <?= $historial[0]->acuerdo_id ?></p>
            </div>
            <div class="mb-3 mb-lg-0">
                <p class="ml-2 mb-0"><b>Tema:</b> <?= $historial[0]->tema ?></p>
            </div>
            <div class="mb-3 mb-lg-0">
                <p class="ml-2 mb-0"><b>Asunto:</b> <?= $historial[0]->asunto ?></p>
            </div>
            <div class="mb-3 mb-lg-0">
                <p class="ml-2 mb-0"><b>Origen:</b> <?= $historial[0]->area_acuerdo ?></p>
            </div>
        </div>

        <div class="accordion my-3" id="ver-historial">
            <div class="accordion-item">
                <h2 class="accordion-header" id="titulo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#historial" aria-expanded="true" aria-controls="historial">
                    Mostrar historial completo
                    </button>
                </h2>
                <div id="historial" class="accordion-collapse collapse" aria-labelledby="titulo" data-bs-parent="#ver-historial">
                    <div class="accordion-body">
                    <?php $this->load->view('acuerdos/ajax/historial', ['historial' => $historial]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form>
                    <input type="hidden" id="acuerdo_id" name="acuerdo_id" value="<?= $acuerdo_id ?>">
                    <input type="hidden" id="remitente" name="remitente" value="<?= $historial[0]->combinacion_area_acuerdo_id ?>">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="area_destino">Área Destino</label>
                            <select class="form-select areas_select2" id="area_destino" name="area_destino" aria-label="Área Destino">
                                <option selected disabled>Seleccione una opción</option> 
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

                    <script type="text/javascript" charset="utf-8" async defer>
                        if ( carga_doctos )
                            carga_doctos.options.autoProcessQueue = false;
                    </script>

                    <div class="row">
                        <div class="col-12 mb-3" class="dropzone">
                            <?php $this->load->view('acuerdos/ajax/carga_documento'); ?>
                        </div>
                    </div>
                    <div class="accordion mb-3" id="ver-archivos">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="titulo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#archivos" aria-expanded="true" aria-controls="archivos">
                                Mostrar archivos cargados
                                </button>
                            </h2>
                            <div id="archivos" class="accordion-collapse collapse" aria-labelledby="titulo" data-bs-parent="#ver-archivos">
                                <div class="accordion-body">
                                <?php $this->load->view('acuerdos/ajax/archivos_cargados', ['acuerdo_id' => $historial[0]->acuerdo_id, 'archivos' => $archivos]); ?>
                                </div>
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
<script src="<?= base_url('assets/js/acuerdos/seguimiento.js') ?>" type="text/javascript" charset="utf-8" async defer></script>