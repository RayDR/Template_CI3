<div class="row">
    <legend>Proyecto</legend>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#linea_accion').change(flinea_accion);
    });
</script>