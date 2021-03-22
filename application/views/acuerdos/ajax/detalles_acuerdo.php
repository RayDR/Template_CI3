<th>
<div class="btn-group me-2 mb-4">
    <button type="button" class="btn btn-primary seguimiento-detallado" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Ver Seguimiento Detallado</button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-angle-down dropdown-arrow"></i>
        <span class="sr-only">Mostrar más</span>
    </button>
    <div class="dropdown-menu">    	
        <?php if ( $acuerdos[0]->estatus_seguimiento == 'Nuevo' ): ?>
        <a class="dropdown-item editar-acuerdo" href="#editar-acuerdo" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Editar</a>
        <div class="dropdown-divider"></div>
    	<?php endif ?>
    	<?php if( $acuerdos[0]->estatus_seguimiento != 'Terminado' ): ?>
        <a class="dropdown-item nuevo-seguimiento" href="#contestacion" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Nuevo Seguimiento</a>        
    	<?php endif ?>
        <a class="dropdown-item seguimiento-detallado" href="#seguimiento-detallado" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Ver Detalle</a>
        <?php if( $acuerdos[0]->estatus_seguimiento != 'Terminado' ): ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item seguimiento-finalizar" href="#finalizar" data-acuerdo="<?= $acuerdos[0]->acuerdo_id ?>">Finalizar acuerdo</a>
    	<?php endif ?>
    </div>
</div>
<div class="table-responsive" style="max-height: 500px; overflow-y: scroll;">
	<table class="table table-hover table-centered table-nowrap table-inverse">
		<thead class="thead-dark text-white">
			<tr>
				<th>Folio</th>
				<th>Acuerdo</th>
				<th>Destino</th>
				<th>Fecha</th>
				<th>Estatus</th>
			</tr>
		</thead>
		<tbody>		
		<?php foreach ($acuerdos as $key => $acuerdo): ?>
			<tr>
				<td><?= $acuerdo->folio ?></td>
				<td><?= $acuerdo->seguimiento ?></td>
				<td><?= $acuerdo->area_seguimiento ?></td>
				<td><?= $acuerdo->fecha_actualizacion_seguimiento ?></td>
				<td><?= $acuerdo->estatus_seguimiento ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>
</th>