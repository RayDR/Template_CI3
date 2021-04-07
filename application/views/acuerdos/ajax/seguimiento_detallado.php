<div class="container">
    <div class="card card-body shadow-sm mb-4 mb-lg-0 bg-transparent">
        <h2 class="h5 mb-4">Datos del Acuerdo <?= $acuerdo[0]->acuerdo_id ?></h2>
        <input type="hidden" value="<?= $seguimiento[0]->acuerdo_id ?>" id="acuerdo" name="acuerdo">
        <input type="hidden" value="<?= $seguimiento[0]->seguimiento_acuerdo_id ?>" id="seguimiento" name="seguimiento">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center justify-content-between px-0  bg-transparent">
                <div>
                     <p class="h6 pe-1">
                        <strong>Asunto:</strong>
                        <?= $acuerdo[0]->asunto ?>
                    </p>
                    <p class="h6 pe-4">
                        <strong>Origen:</strong>
                        <?= $acuerdo[0]->direccion_acuerdo ?> <?= $acuerdo[0]->subdireccion_acuerdo ?>
                        <?= $acuerdo[0]->departamento_acuerdo ?> <?= $acuerdo[0]->area_acuerdo ?>
                    </p>
                </div>              
                <div>
                    <span class="badge badge-lg bg-secondary text-dark"><?= $seguimiento[0]->estatus_seguimiento ?></span>
                    <br>
                    <?php 
                    if ( 
                        ( $this->session->userdata('tuser') == 1 ) // Solo administradores
                        ||
                        ( $combinacion->subdireccion_id   == 1 && 
                          $combinacion->departamento_id   == 1 && 
                          $combinacion->area_id           == 1  ) // Solo directores
                    ): 
                    ?>
                        <?php if ( $seguimiento[0]->estatus_acuerdo_id != 3 ): ?>
                        <label class="my-1 me-2 form-label-sm" for="asignar">Asignar a:</label>
                        <select id="asignar" class="select2 form-control-sm" name="asignar">
                            <option selected disabled>Seleccione el usuario</option>
                            <?php foreach ($area_usuarios as $key => $usuario): ?>
                            <option value="<?= $usuario->usuario_id ?>"><?= $usuario->cve_cuenta ?> - <?= $usuario->nombres ?> <?= $usuario->primer_apellido ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </li>
        </ul>
    </div>

    <div class="card card-body shadow-sm mb-4 mb-lg-0 bg-white">
        <div class="container" style="max-height: 500px; overflow-y: scroll;">
        <h2 class="h5 mb-4 text-primary">Historial del Acuerdo</h2>
        <ul class="list-group list-group-flush bg-transparent">
        <?php foreach ($seguimiento as $key => $historia): ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-9">
                        <h3 class="h5 mb-1 text-primary"><?= $historia->folio ?> - <?= $historia->seguimiento ?></h3>
                        <p class="text-primary h6">Destino:
                            <small class="text-primary"><?= $historia->area_seguimiento ?></small>
                            <br>
                            <?php if ( $historia->estatus_acuerdo_id != 3 ): ?>
                                <small class="text-primary">Solicitó: <?= $historia->usuario_envia ?></small>
                                <br>
                                <?php if ( $historia->usuario_recibe ):  ?>
                                <small class="text-tertiary">Atendió: <?= $historia->usuario_recibe ?></small>
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
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/acuerdos/ajax/seguimiento_detallado.js') ?>" type="text/javascript" charset="utf-8" async defer></script>