<?php
    // Variables
    $rFisico        = $encabezado->realizado_fisico;
    $rFinanciero    = $encabezado->realizado_financiero;
    $pFisico        = $encabezado->programado_fisico;
    $pFinanciero    = $encabezado->programado_financiero;
    // Cálculos
    $progresoFisico         = round($rFisico/$pFisico * 100, 2);
    $progresoFinanciero     = round($rFinanciero/$pFinanciero * 100, 2);
    $diferenciaFisico       = $pFisico - $rFisico;
    $diferenciaFinanciero   = $pFinanciero - $rFinanciero;
?>
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('index.php/Actividades') ?>">Actividades</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Reporte Mensual</h1>
        </div>
    </div>
    <div class="shadow rounded border-light p-3 w-100">
        <?php $this->load->view('actividades/ajax/historia_actividad', array('encabezado' => $encabezado, 'detalles' => $detalles), FALSE); ?>
    </div>
</div>
<input type="hidden" id="actividad_id" name="actividad_id" value="<?= $encabezado->actividad_id ?>">
<input type="hidden" id="programado_fisico" name="programado_fisico" value="<?= $encabezado->programado_fisico ?>">
<input type="hidden" id="programado_financiero" name="programado_financiero" value="<?= $encabezado->programado_financiero ?>">
<input type="hidden" id="actividad_detallada_id" name="actividad_detallada_id" value="">
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="mb-3">
                    <?php $this->load->view(RUTA_TEMA_UTIL . '/alertas'); ?>
                </div>
                <form>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="mes">Mes a reportar</label>
                        <select class="form-select" id="mes" aria-label="Meses">
                            <option selected disabled>Seleccione una opción</option>
                            <?php foreach ($detalles as $key => $detalle): ?>
                                <?php if(!$detalle->realizado_fisico || !$detalle->realizado_financiero): ?>
                                <option value="<?= $detalle->mes ?>" data-actividad_detallada="<?= $detalle->actividad_detallada_id ?>" data-programado_fisico="<?= $detalle->programado_fisico ?>" data-programado_financiero="<?= $detalle->programado_financiero ?>"><?= strftime( "%B", DateTime::createFromFormat('!m', $detalle->mes)->getTimestamp() ); ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <legend>Avance Físico</legend>
                        <table style="width: 100%;">
                            <tr>
                                <th width="30%">Programado:</th>
                                <td><?= $pFisico ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Realizado:</th>
                                <td><?= $rFisico ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Restante:</th>
                                <td><?= $diferenciaFisico ?></td>
                            </tr>
                        </table>
                        <div class="progress-wrapper my-2">
                            <div class="progress-info">
                                <div class="progress-label">
                                    <span class="text-dark">Progreso Físico</span>
                                </div>
                                <div class="progress-percentage">
                                    <span><?= $progresoFisico ?></span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: <?= $progresoFisico ?>%;" aria-valuenow="<?= $progresoFinanciero ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="fisico-reporte">Valor físico a reportar</label>
                        <input id="fisico-reporte" name="fisico_reporte" type="number" class="form-control" value="0" data-tipo="fisico" min="0" required>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <legend>Avance Financiero</legend>
                        <table style="width: 100%;">
                            <tr>
                                <th width="30%">Programado:</th>
                                <td><?= $pFinanciero ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Realizado:</th>
                                <td><?= $rFinanciero ?></td>
                            </tr>
                            <tr>
                                <th width="30%">Restante:</th>
                                <td><?= $diferenciaFinanciero ?></td>
                            </tr>
                        </table>
                        <div class="progress-wrapper my-2">
                            <div class="progress-info">
                                <div class="progress-label">
                                    <span class="text-dark">Progreso Financiero</span>
                                </div>
                                <div class="progress-percentage">
                                    <span><?= $progresoFinanciero ?></span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: <?= $progresoFinanciero ?>%;" aria-valuenow="<?= $progresoFinanciero ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="my-1 me-2" for="financiero-reporte">Valor financiero a reportar</label>
                        <input id="financiero-reporte" name="financiero_reporte" type="number" class="form-control" value="0" data-tipo="financiero" min="0" required>
                    </div>
                    <div class="col-12 mb-3">
                        <?php $this->load->view('actividades/ajax/cargar_documento'); ?>
                    </div>
                    <div class="mt-3">
                        <button id="guardar" type="button" class="btn btn-dark">Reportar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/actividades/reporte.js') ?>" type="text/javascript" charset="utf-8" async defer></script>