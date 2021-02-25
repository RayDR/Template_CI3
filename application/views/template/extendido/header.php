<?php
	$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
	$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
	$this->output->set_header('Pragma: no-cache');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<!-------------------- Declaración de METAS -------------------->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content=""/>
		<meta name="rights" content=""/>
		<meta name="description" content=""/>

		<link rel="icon" type="image/png" href="" sizes="64x64">
		<!---------------------- Título Dinámico ----------------------->
		<title><?=$titulo?></title>
		<!----------------------- Hojas de Estilo ----------------------->
		<!-- Bootstrap Core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<!------------------------- Scripts JS ------------------------->
		<!-- jQuery Js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap Core JS -->		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>
		<!--------------- Estilos Globales Personalizados --------------->
		<!--------------- Scripts Globales Personalizados --------------->
	</head>