<div class="row">
    <legend>Preproyecto</legend>
    <div class="col-12 mb-3">
        <label class="my-1 me-2" for="municipio">Municipio</label>
        <select class="form-select" id="municipio" aria-label="Municipios" required>
            <option selected disabled>Seleccione una opción</option>
            <?php foreach ($municipios as $key => $municipio): ?>
            <option value="<?= $municipio->municipio_id ?>"><?= $municipio->descripcion ?></option>
            <?php endforeach; ?>  
        </select>
    </div>
    <div class="col-12 mb-3">
        <label class="my-1 me-2" for="localidad">Localidad</label>
        <select class="form-select" id="localidad" aria-label="Localidades" required>
            <option selected disabled>Seleccione un municipio primero</option>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#linea_accion').change(flinea_accion);
        $('#municipio').change(fget_localidades);
        $('#localidad').select2();
    });
</script>