<div class="container">
    <div class="card card-body shadow-sm mb-4 mb-lg-0 bg-transparent">
        <h2 class="h5 mb-4">Datos del Acuerdo #<?= $acuerdo[0]->acuerdo_id ?></h2>
        <input type="hidden" value="<?= $seguimiento[0]->acuerdo_id ?>" id="acuerdo" name="acuerdo">
        <input type="hidden" value="<?= $seguimiento[0]->seguimiento_acuerdo_id ?>" id="seguimiento" name="seguimiento">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center justify-content-between px-0  bg-transparent">
                <div>
                    <p class="p-0 m-0"><b>Asunto:</b> <?= $acuerdo[0]->asunto ?></p>
                    <p class="p-0 m-0"><b>Tema:</b> <?= $acuerdo[0]->tema ?></p>
                    <p class="p-0 m-0"><b>Solicitante:</b> <?= $seguimiento[0]->usuario_registra ?></p>
                </div>              
                <div class="text-right">
                    <a href="#anexos" class="descargar_anexos px-4" title="Descargar archivos adjuntos" data-title="Descargar archivos adjuntos" data-toggle="tooltip">
                        <i class="fas fa-cloud-download-alt text-white"></i>
                    </a>
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
                        <select id="asignar" class="select2 form-control-sm text-right" name="asignar">
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
        <h2 class="h5 mb-4 text-primary">
            Historial del Acuerdo 
            <a href="#anexos" class="descargar_anexos" title="Descargar archivos adjuntos" data-title="Descargar archivos adjuntos" data-toggle="tooltip">
                <i class="fas fa-cloud-download-alt text-primary"></i>
            </a>
        </h2>
        <div id="historial" class="container" style="max-height: 500px; overflow-y: scroll;">
            <?php $this->load->view('acuerdos/ajax/historial', ['historial' => $seguimiento]); ?>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/acuerdos/ajax/seguimiento_detallado.js') ?>" type="text/javascript" charset="utf-8"></script>