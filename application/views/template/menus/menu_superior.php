<div class="row align-items-center fondo-rojo border-0 rounded-bottom">
	<nav class="col navbar navbar-expand-sm navbar-dark bg-dark border-0 rounded-bottom">
		<a class="navbar-brand" href="https://tabasco.gob.mx/educacion">
			<b class="h4"><strong>tabasco</strong><strong class="fa fa-circle" style="font-size: 8px;"></strong></b>gob.mx
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-superior" aria-controls="menu-superior" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu-superior">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link text-right" href="<?= base_url() ?>">
						<span class="fa fa-home"  data-toggle="tooltip" data-title="Volver a Inicio" data-placement="bottom">&nbsp;</span> Inicio
					</a>
				</li>
				<?PHP if( $this->session->userdata('ulogin') ): ?>
				<li class="nav-item">
					<a class="nav-link text-right" href="<?= base_url('index.php/Administracion/acceso') ?>">
						<span class="fas fa-user-tie" data-toggle="tooltip" data-title="Volver al Sistema" data-placement="bottom">&nbsp;</span>Administración
					</a>
				</li>
				<?PHP endif; ?>
			</ul>
		</div>
	</nav>
</div>