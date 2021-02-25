<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body id="body-extendido">
	<div class="container-fluid">
		<!-- Vista dinámica -->
		<?php $this->load->view($view);?>
		<!-- Fin vista dinámica -->
	</div>

	<input type="hidden" id="base_url" value="<?=base_url()?>">

	<?php $this->load->view($template.'footer');?>
</body>
</html>
