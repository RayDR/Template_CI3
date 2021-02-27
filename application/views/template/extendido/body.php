<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body id="body-extendido">
	<main class="container-fluid">
		<!-- Vista dinámica -->
		<?php $this->load->view($view);?>
		<!-- Fin vista dinámica -->
	</main>

	<input type="hidden" id="base_url" value="<?=base_url()?>">

	<?php $this->load->view($template.'footer');?>
</body>
</html>
