<th>
<div class="btn-group me-2 mb-4">
    <button type="button" class="btn btn-primary seguimiento-detallado" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Ver Seguimiento Detallado</button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-angle-down dropdown-arrow"></i>
        <span class="sr-only">Mostrar más</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item seguimiento-contestacion" href="#contestacion" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Contestación</a>
        <a class="dropdown-item seguimiento-detallado" href="#seguimiento-detallado" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Ver Detalle</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item seguimiento-finalizar" href="#finalizar" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Finalizar acuerdo</a>
    </div>
</div>
<div class="table-responsive" style="max-height: 500px; overflow-y: scroll;">
	<table class="table table-hover table-centered table-nowrap table-inverse">
		<thead class="thead-dark text-white">
			<tr>
				<th>Folio</th>
				<th>Acuerdo</th>
				<th>Origen</th>
				<th>Destino</th>
				<th>Ejercicio</th>
				<th>Fecha</th>
				<th>Estatus</th>
			</tr>
		</thead>
		<tbody>		
		<?php foreach ($acuerdos as $key => $acuerdo): ?>
			<tr>
				<td><?= $acuerdo->folio ?></td>
				<td><?= $acuerdo->seguimiento_act ?></td>
				<td>
					<?= $acuerdo->cve_direccion_actividad ?>,<?= $acuerdo->cve_subdireccion_actividad ?>,<?= $acuerdo->cve_departamento_actividad ?>,<?= $acuerdo->cve_area_actividad ?> - 
					<?= ($acuerdo->direccion_actividad == 'NINGUNA')? '00': $acuerdo->direccion_actividad ?>, <?= ($acuerdo->subdireccion_actividad == 'NINGUNA')? '00': $acuerdo->subdireccion_actividad ?>, <?= ($acuerdo->departamento_actividad == 'NINGUNA')? '00': $acuerdo->departamento_actividad ?>, <?= ($acuerdo->area_actividad == 'NINGUNA')? '00': $acuerdo->area_actividad ?>
				</td>
				<td>
					<?= $acuerdo->cve_direccion_ad ?>,<?= $acuerdo->cve_subdireccion_ad ?>,<?= $acuerdo->cve_departamento_ad ?>,<?= $acuerdo->cve_area_ad ?> - 
					<?= ($acuerdo->direccion_ad == 'NINGUNA')? '00': $acuerdo->direccion_ad ?>, <?= ($acuerdo->subdireccion_ad == 'NINGUNA')? '00': $acuerdo->subdireccion_ad ?>, <?= ($acuerdo->departamento_ad == 'NINGUNA')? '00': $acuerdo->departamento_ad ?>, <?= ($acuerdo->area_ad == 'NINGUNA')? '00': $acuerdo->area_ad ?>
				</td>
				<td><?= $acuerdo->ejercicio_actividad_act ?></td>
				<td><?= $acuerdo->fecha_modificacion ?></td>
				<td><?= $acuerdo->estatus_acuerdo_ad ?></td>
			</tr>
		<?php endforeach ?>		
		<caption>Seguimiento al acuerdo: <?= $acuerdos[0]->acuerdo_id ?> - <?= $acuerdos[0]->asunto ?></caption>
		</tbody>
	</table>
</div>
</th>