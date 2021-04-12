<?php 
    $seguimiento_id = 0; 
    $folio          = 1;
    $ejercicio      = date('Y');
    $uploadFolder   = "uploads/Acuerdos/{$ejercicio}/{$acuerdo_id}";
?>
<?php foreach ($archivos as $key => $archivo): ?>
    <?php if ( $archivo['seguimiento_acuerdo_id'] != $seguimiento_id ): ?>
        <?php if ( $key > 0 ): ?>
        </div>
        <?php $folio++; ?>
        <?php endif ?>
        <div class="row mt-3">
            <h4 class="col-12 mb-1">Seguimiento <?= $acuerdo_id ?>-<?= $folio ?> </h4>
        <?php $seguimiento_id = $archivo['seguimiento_acuerdo_id']; ?>
        <?php endif ?>
            <?php $nombre_archivo = $archivo["archivo"]; $extension = strstr($nombre_archivo, '.');?>
            <div class="col-md-4 justify-content-center align-items-center">
                <div class="card">
                  <div class="card-body text-center" style="<?= ( $extension == '.jpg' || $extension == '.jpeg' || $extension == '.png' || $extension == '.PNG'  )? "background-image: url('". base_url("{$uploadFolder}/{$nombre_archivo}") ."'); background-position: center; background-size: cover; ": ''; ?>">
                    <h5 class="card-title"><?= $nombre_archivo ?></h5>
                    <a href="<?= base_url("{$uploadFolder}/{$nombre_archivo}") ?>" target="_blank" class="btn btn-primary">
                    	Ver archivo
                    </a>
                  </div>
                </div>
            </div>
<?php endforeach ?>
        </div>