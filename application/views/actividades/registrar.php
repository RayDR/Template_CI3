<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('index.php/Actividades') ?>">Actividades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrar</li>
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
                <!-- <h2 class="h5 mb-4">Programa seleccionado: <strong>Programa Presupuestario</strong> - Ejercicio 2021</h2> -->
                <form>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="my-1 me-2" for="areas">Áreas</label>
                            <select class="form-select" id="areas" aria-label="Áreas">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($areas as $key => $area): ?>
                                <option value="<?= $area->cve_area ?>"><?= $area->descripcion ?> (<?= $area->cve_area ?>)</option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="my-1 me-2" for="um">Programa</label>
                            <select class="form-select" id="um" aria-label="Programas">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($programas as $key => $programa): ?>
                                <option value="<?= $programa->programa_presupuestario_id ?>">(<?= $programa->cve_programa ?>) <?= $programa->nombre ?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="my-1 me-2" for="um">Línea de Acción</label>
                            <select class="form-select" id="um" aria-label="Líneas de Acción">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($l_accion as $key => $linea): ?>
                                <option value="<?= $linea->linea_accion_id ?>"><?= $linea->descripcion ?></option>
                                <?php endforeach; ?>  
                            </select>
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
                        <div class="col-6 mb-3">
                            <label class="my-1 me-2" for="um">Unidad de Medida</label>
                            <select class="form-select" id="um" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <?php foreach ($u_medida as $key => $um): ?>
                                <option value="<?= $um->unidad_medida_id ?>"><?= $um->descripcion ?> (<?= $um->cve_medida ?>)</option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="my-1 me-2" for="um">Tipo de Medición</label>
                            <select class="form-select" id="um" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="1">Absoluto</option>
                                <option value="2">Porcentaje</option>
                                <option value="3">Promedio</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="my-1 me-2" for="um">Grupo Beneficiado</label>
                            <select class="form-select" id="um" aria-label="Default select example">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="1">Grupo Beneficiado 1</option>
                                <option value="2">Grupo Beneficiado 2</option>
                                <option value="3">Grupo Beneficiado 3</option>
                            </select>
                        </div>
                    </div>
                    <h2 class="h5 mb-4">Objetivo anual</h2>
                    <div class="row">
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Enero</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Febrero</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Marzo</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Abril</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Mayo</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Junio</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Julio</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Agosto</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Septiembre</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Octubre</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Noviembre</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-4 col-md-2 mb-3">
                            <div>
                                <label for="mes">Diciembre</label>
                                <input type="number" class="form-control" value="0" min="0" required oninput="validity.valid||(value='');">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>