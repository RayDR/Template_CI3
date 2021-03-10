<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Actividades</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Actividades registradas</h1>
        </div>
    </div>
    <div class="btn-toolbar dropdown">
      <a id="nueva_actividad" href="#registrar" class="btn btn-dark btn-sm me-2 dropdown-toggle">
        <span class="fas fa-plus me-2"></span>Nueva Actividad
      </a>
    </div>
</div>
<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtActividades" class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="">#</th>
                        <th class="">Actividad General</th>
                        <th class="">Actividad Detallada</th>
                        <th class="">Programado</th>
                        <th class="">Realizado</th>
                        <th class="">Medición</th>
                        <th class="">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actividades as $key => $actividad): ?>
                    <tr>
                        <td class="">
                            <a href="#" class="text-primary fw-bold"><?= $actividad->proyecto_actividad_id ?></a>
                        </td>
                        <td class="fw-bold"><?= $actividad->actividad_general ?></td>
                        <td class="fw-bold"><?= $actividad->act_detallada ?></td>
                        <td class=""><?= $actividad->programado_fisico ?></td>
                        <td class=""><?= $actividad->realizado_fisico ?></td>
                        <td class=""><?= $actividad->unidad_medicion ?></td>
                        <td class=""><?= $actividad->estatus ?></td>
                    </tr>    
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/actividades/actividades.js') ?>?V1.0" type="text/javascript" charset="utf-8" async defer></script>