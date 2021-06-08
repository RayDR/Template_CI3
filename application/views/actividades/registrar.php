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
            <h1 class="h4">Registrar Actividad</h1>
        </div>
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
                    <div class="row">
                        <?php if( $this->session->userdata('tuser') == 1 ): ?>
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="area_origen">Áreas</label>
                            <select class="form-select areas_select2" id="area_origen" aria-label="Áreas">
                                <option selected disabled>Seleccione una opción</option>
                            </select>
                        </div>
                        <?php else: ?>
                            <input type="hidden" id="area_origen" name="area_origen" value="<?= $this->session->userdata('combinacion_area') ?>">
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="programa_presupuestario">Programa Presupuestario</label>
                            <select class="form-select" id="programa_presupuestario" aria-label="Programas Presupuestarios" required>
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($programas as $key => $programa): ?>
                                <option value="<?= $programa->programa_presupuestario_id ?>" data-descripcion="<?= $programa->descripcion ?>" data-objetivo="<?= $programa->objetivo ?>">(<?= $programa->cve_programa ?>) <?= $programa->nombre ?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="linea_accion">Línea de Acción</label>
                            <select class="form-select" id="linea_accion" aria-label="Líneas de Acción" required>
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($l_accion as $key => $linea): ?>
                                <option value="<?= $linea->linea_accion_id ?>" data-objetivo="<?= $linea->objetivo_programa ?>" data-estrategia="<?= $linea->estrategia_programa ?>"><?= $linea->linea_accion ?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div id="datos_linea_accion" class="col-12"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div>
                                <label for="detalle_actividad">Detalle la Actividad</label>
                                <textarea class="form-control" placeholder="¿Que actividades se desempeñaran?" id="detalle_actividad" name="detalle_actividad" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="my-1 me-2" for="unidad_medida">Unidad de Medida</label>
                            <select class="form-select" id="unidad_medida" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($u_medida as $key => $um): ?>
                                <option value="<?= $um->unidad_medida_id ?>"><?= $um->descripcion ?> (<?= $um->cve_medida ?>)</option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="my-1 me-2" for="tipo_medicion">Tipo de Medición</label>
                            <select class="form-select" id="tipo_medicion" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="1">Absoluto</option>
                                <option value="2">Porcentaje</option>
                                <option value="3">Promedio</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="my-1 me-2" for="grupo_beneficiado">Grupo Beneficiado</label>
                            <select class="form-select" id="grupo_beneficiado" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Ambos</option>
                                <option value="4">No Aplica</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cantidad_beneficiarios">Cantidad de Beneficiarios</label>
                            <input type="number" class="form-control" id="cantidad_beneficiarios" value="0" required>
                        </div>
                    </div>

                    <div id="programados" class="card card-body my-3 mx-2" style="display: none;">
                        <?php $this->load->view('actividades/secciones/programado_fisico'); ?>
                        <?php $this->load->view('actividades/secciones/programado_financiero'); ?>
                    </div>
                    
                    <div class="mt-3">
                        <button id="guardar" type="button" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var inputs = JSON.parse('<?php print(json_encode($inputs, JSON_HEX_TAG)); ?>');
</script>
<script src="<?= base_url('assets/js/actividades/registrar.js') ?>" type="text/javascript" charset="utf-8" async defer></script>