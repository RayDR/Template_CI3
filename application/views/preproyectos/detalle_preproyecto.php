<style type="text/css" media="screen">
    .nav-link:hover, .nav-link:focus {
        background-color: #D1D5DB;
    } 
    .nav-pills .nav-link:hover{
        background-color: #D1D5DB;
    }
    .accordion-button{
        color: white;
    }
    .accordion-button:hover{
        color: #262B40;
    }
</style>

<input type="hidden" id="preproyecto_id" name="preproyecto_id" value="<?= $preproyecto->preproyecto_id ?>">

<div class="container">
    <div class="text-white">
    <div class="card card-body shadow-sm mb-4 mb-lg-0 bg-transparent">
        <div class="row d-flex justify-content-between">
            <div class="col my-auto">
                <h2 class="h5 mb-4 text-center">DETALLE DE PREPROYECTO</h2>
            </div>
            <div class="col">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-end px-0 bg-transparent">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-pill-circle flex-column flex-md-row">
                                <li class="nav-item">
                                    <a id="editar" class="nav-link" aria-label="Tab Editar" href="#editar-preproyecto" data-bs-toggle="tooltip" title="Editar Preproyecto">
                                        <span class="nav-link-icon d-block"><i class="fas fa-file-signature fa-5x"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="actividad" class="nav-link" aria-label="Tab Reporte" href="#actividad-preproyecto" data-bs-toggle="tooltip" title="Nueva Actividad">
                                        <span class="nav-link-icon d-block"><i class="fas fa-file-contract fa-5x"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center justify-content-center px-0 bg-transparent">
                <div class="accordion my-3 w-100" id="preproyecto">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="titulo_preproyecto">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#encabezado-preproyecto" aria-expanded="false" aria-controls="encabezado-preproyecto">
                                <strong>PREPROYECTO:</strong>&nbsp;<?= $preproyecto->actividad ?>
                            </button>
                        </h2>
                        <div id="encabezado-preproyecto" class="accordion-collapse collapse" aria-labelledby="titulo_preproyecto" data-bs-parent="#preproyecto">
                            <div class="accordion-body">
                                <ul class="list-group bg-transparent">
                                    <li class="list-group-item border-bottom bg-transparent">
                                        <p><strong>ESTRATEGIA:</strong><br><?= $preproyecto->estrategia ?></p>
                                    </li>
                                    <li class="list-group-item border-bottom bg-transparent">
                                        <p><strong>OBJETIVO:</strong><br><?= $preproyecto->objetivo ?></p>
                                    </li>
                                    <li class="list-group-item bg-transparent">
                                        <p><strong>LÍNEA DE ACCIÓN:</strong><br><?= $preproyecto->linea_accion ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="titulo_preproyecto">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#datos_preproyecto" aria-expanded="true" aria-controls="datos_preproyecto">
                                DETALLES
                            </button>
                        </h2>
                        <div id="datos_preproyecto" class="accordion-collapse collapse show" aria-labelledby="titulo_preproyecto" data-bs-parent="#preproyecto">
                            <div class="accordion-body">
                                <table class="table w-100 bg-white">
                                    <tbody>
                                        <tr>
                                            <th width="20%">Alcance</th>
                                            <td><?= ($preproyecto->ambito_localidad == 'E')? '' : $preproyecto->localidad .' - ' ?><b><?= $preproyecto->municipio ?></b></td>
                                        </tr>
                                        <tr>
                                            <th>Inversión</th>
                                            <td id="inversion"><?= $preproyecto->inversion ?></td>
                                        </tr>
                                        <tr>
                                            <th>Beneficiarios</th>
                                            <td id="beneficiarios"><?= $preproyecto->cantidad_beneficiarios ?></td>
                                        </tr>
                                        <tr>
                                            <th>URL</th>
                                            <td><?= $preproyecto->url ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="card card-body shadow-sm mb-4 mb-lg-0 bg-white">
        <div class="container">
            <h3 class="card-title text-dark h5">ACTIVIDADES</h3>
            <?php if ( $actividades ): ?>
            <div class="row">
                <?php foreach ($actividades as $key => $actividad): ?>
                <div class="col-12 col-lg-6">
                    <div class="card border-rounded shadow p-3">
                        <div class="card-body">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 mb-0 text-dark"><strong class="h3 text-dark"><?= $key+1 ?>.</strong>&nbsp;<?= $actividad->actividad ?></h2>
                                <h3 class="fw-extrabold mb-2 text-dark">Inversión: <?= $actividad->inversion ?></h3>
                            </div>
                            <small class="text-dark">
                                <?= mdate('%d-%m-%Y', strtotime($actividad->fecha_inicio)) ?> -  <?= mdate('%d-%m-%Y', strtotime($actividad->fecha_termino)) ?>
                            </small> 
                            <div class="small d-flex mt-1 text-dark">
                                <div>Alcance: <?= ($actividad->ambito_localidad == 'E')? '' : $actividad->localidad .' - ' ?><b><?= $actividad->municipio ?></b></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <?php else: ?>
                <p class="lead my-3 text-dark">No se han registrado actividades.</p>
            <?php endif ?>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
(function(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    const inversion     = document.getElementById('inversion');
    const beneficiarios = document.getElementById('beneficiarios');
    if ( inversion )          
        inversion.innerHTML = fu_formatMxn(<?= ($preproyecto->inversion)? $preproyecto->inversion: 0 ?>);
    if ( beneficiarios )
        beneficiarios.innerHTML = fu_formatNum(<?= ($preproyecto->cantidad_beneficiarios)? $preproyecto->cantidad_beneficiarios : 0 ?>);

})();
</script>
<script src="<?= base_url('assets/js/preproyectos/detalle_preproyecto.js') ?>" type="text/javascript" charset="utf-8"></script>