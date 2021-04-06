<div class="container">
	<div class="card card-body shadow-sm mb-4 mb-lg-0 bg-transparent">
		<h2 class="h5 mb-4">Datos del Acuerdo <?= $acuerdo[0]->acuerdo_id ?></h2>
		<ul class="list-group list-group-flush">
			<li class="list-group-item d-flex align-items-center justify-content-between px-0  bg-transparent">
				<div>
					<h3 class="h6 mb-1">Asunto</h3>
					<p class="pe-1"><?= $acuerdo[0]->asunto ?></p>
					<p class="h6 pe-4"><?= $acuerdo[0]->area_acuerdo ?></p>
				</div>				
				<div>
					<span class="badge badge-lg bg-secondary text-dark"><?= $seguimiento[0]->estatus_seguimiento ?></span>
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
                            <small class="text-tertiary">Atendió: <?= $historia->usuario_recibe ?></small>
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