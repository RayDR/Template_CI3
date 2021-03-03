<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
	$CI =& get_instance();
	if( ! isset($CI))
	{
	$CI = new CI_Controller();
	}
	$CI->load->helper('url');
?>
<!--
=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================
* Product Page: https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard
* Copyright 2020 Themesberg (https://www.themesberg.com)
* Designed and coded by https://themesberg.com
=========================================================
-->
<!DOCTYPE html>
<html lang="es_MX">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Primary Meta Tags -->
		<title>404 <?= APLICACION ?> | <?= EMPRESA ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="title" content="<?= APLICACION ?> <?= EMPRESA ?>">
		<meta name="author" content="Domodigital">
		<meta name="description" content="SIPAT">
		<meta name="keywords" content="sipat,isset" />
		<link rel="canonical" href="https://domodigital.com.mx">
		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
		<meta property="og:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
		<meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
		<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
		<meta property="twitter:title" content="Volt - Free Bootstrap 5 Admin Dashboard">
		<meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
		<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/img/favicon/apple-touch-icon.png') ?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png') ?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon/favicon-16x16.png') ?>">
		<link rel="manifest" href="<?= base_url('assets/img/favicon/site.webmanifest') ?>">
		<link rel="mask-icon" href="<?= base_url('assets/img/favicon/safari-pinned-tab.svg') ?>" color="#ffffff">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>
		<!-- Sweet Alert -->
		<link type="text/css" href="<?= base_url('vendor/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet">
		<!-- Notyf -->
		<link type="text/css" href="<?= base_url('vendor/notyf/notyf.min.css') ?>" rel="stylesheet">
		<!-- Volt CSS -->
		<link type="text/css" href="<?= base_url('css/volt.css') ?>" rel="stylesheet">
	</head>
	<body id="body-dashboard">
		<main style="min-height: 100vh;">
			<section class="vh-100 d-flex align-items-center justify-content-center">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center d-flex align-items-center justify-content-center">
							<div>
								<img class="img-fluid w-75" src="<?= base_url('assets/img/illustrations/404.svg') ?>" alt="404 not found">
								<h1 class="mt-5">Pagina no <span class="fw-bolder text-primary">encontrada</span></h1>
								<p class="lead my-4">Lo sentimos, pero esta página no existe o se ha movido.</p>
								<a class="btn btn-dark animate-hover" href="<?= base_url() ?>"><i class="fas fa-chevron-left me-3 ps-2 animate-left-3"></i>Volver</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<input type="hidden" id="base_url" value="<?=base_url()?>">
		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>
		<!-- Core -->
		<script src="<?= base_url('vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
		<script src="<?= base_url('vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
		<!-- Vendor JS -->
		<script src="<?= base_url('vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>
		<!-- Slider -->
		<script src="<?= base_url('vendor/nouislider/distribute/nouislider.min.js') ?>"></script>
		<!-- Smooth scroll -->
		<script src="<?= base_url('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') ?>"></script>
		<!-- Charts -->
		<script src="<?= base_url('vendor/chartist/dist/chartist.min.js') ?>"></script>
		<script src="<?= base_url('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
		<!-- Datepicker -->
		<script src="<?= base_url('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
		<!-- Sweet Alerts 2 -->
		<script src="<?= base_url('vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
		<!-- Moment JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
		<!-- Vanilla JS Datepicker -->
		<script src="<?= base_url('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
		<!-- Notyf -->
		<script src="<?= base_url('vendor/notyf/notyf.min.js') ?>"></script>
		<!-- Simplebar -->
		<script src="<?= base_url('vendor/simplebar/dist/simplebar.min.js') ?>"></script>
		<!-- Github buttons -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
		<!-- Volt JS -->
		<script src="<?= base_url('assets/js/volt.js') ?>"></script>
	</body>
</html>