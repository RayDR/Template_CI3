<!-- Encabezados/Menú -->
<?php $this->load->view( RUTA_TEMA .'header' ); ?>

<body id="body-comprimido">
	<div class="container">
		<!-- Vista dinámica -->
		<?php $this->load->view( $view ); ?>
		<!-- Fin vista dinámica -->
	</div>

	<input type="hidden" id="base_url" value="<?= base_url() ?>">

	<?php $this->load->view( BASE_TEMA .'footer' );?>
</body>
</html>
