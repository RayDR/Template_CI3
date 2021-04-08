<div class="row">
<?php foreach ($archivos as $key => $archivo): ?>
    <div class="col-md-4 justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $archivo ?></h5>
            <a href="<?= base_url("uploads/$acuerdo_id/$archivo") ?>" target="_blank" class="btn btn-primary">Ver archivo</a>
          </div>
        </div>
    </div>
<?php endforeach ?>
</div>