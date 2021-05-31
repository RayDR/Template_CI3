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
            <h1 class="h4">Editar Actividad</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                <form>
                    <div class="row">
                        <?php if( $this->session->userdata('tuser') == 1 ): ?>
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="areas">Áreas</label>
                            <select class="form-select areas_select2" id="area" aria-label="Áreas">
                                <option selected disabled>Seleccione una opción</option>
                            </select>
                        </div>
                        <?php else: ?>
                            <input type="hidden" id="area_origen" name="area_origen" value="<?= $this->session->userdata('combinacion_area') ?>">
                        <?php endif ?>
                        <div class="card card-body my-3 mx-2">
                            <legend class="card-title lead">Seleccione:</legend>
                            <?php $this->load->view('actividades/tipos_registro/seleccionar_tipo'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div>
                                <label for="detalle_actividad">Detalle la Actividad</label>
                                <textarea class="form-control" placeholder="¿Que actividades se desempeñaran?" id="detalle_actividad" rows="4"></textarea>
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
                    </div>

                    <div id="programados" class="card card-body my-3 mx-2" style="display: none;">
                        <?php $this->load->view('actividades/tipos_registro/programado_fisico'); ?>
                        <?php $this->load->view('actividades/tipos_registro/programado_financiero'); ?>
                    </div>
                    
                    <div class="mt-3">
                        <button id="guardar" type="button" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/actividades/editar.js') ?>" type="text/javascript" charset="utf-8" async defer></script>