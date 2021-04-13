<ul class="list-group list-group-flush bg-transparent">
<?php foreach ($historial as $key => $historia): ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-9">
                <h3 class="h5 mb-1 text-primary"><?= $historia->folio ?> - <?= $historia->seguimiento ?></h3>
                <p class="text-primary h6">Destino:
                    <small class="text-primary"><?= $historia->area_seguimiento ?></small>
                    <br>
                    <?php if ( $historia->estatus_acuerdo_id != 3 ): ?>
                        <small class="text-primary">Envió: <?= $historia->usuario_envia ?></small>
                        <br>
                        <?php if ( $historia->usuario_recibe ):  ?>
                        <small class="text-tertiary">Recibió: <?= $historia->usuario_recibe ?></small>
                        <?php endif ?>
                    <?php else: ?>
                    <small class="text-tertiary">Finalizó: <?= $historia->usuario_envia ?></small>
                    <?php endif ?>
                </p>
            </div>
            <div class="col-3">                 
                <p class="small pe-1 text-primary"><?= $historia->fecha_actualizacion_seguimiento ?></p>
            </div>
        </div>
    </li>
<?php endforeach ?>
</ul>