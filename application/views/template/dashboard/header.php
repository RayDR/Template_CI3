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
    <title><?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="<?= APLICACION ?> <?= EMPRESA ?>">
    <meta name="author" content="Domodigital">
    <meta name="description" content="SIPAT">
    <meta name="keywords" content="sipat,isset" />
    <link rel="canonical" href="https://domodigital.com.mx">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?= APLICACION ?> <?= EMPRESA ?>">
    <meta property="og:description" content="<?= APLICACION ?> <?= EMPRESA ?>">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="<?= APLICACION ?> <?= EMPRESA ?>">
    <meta property="twitter:description" content="<?= APLICACION ?> <?= EMPRESA ?>">
    <meta property="twitter:image" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/img/favicon/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/favicon/site.webmanifest') ?>">
    <link rel="mask-icon" href="<?= base_url('assets/img/favicon/safari-pinned-tab.svg') ?>" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <!-- Core -->
    <script src="<?= base_url('vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- Fontawesome JS -->
    <script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>
    <!-- Datatable JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Dropzone JS -->
    <script src="<?= base_url('vendor/dropzone-5.7.0/dist/dropzone.js') ?>" type="text/javascript" charset="utf-8" async defer></script> 
    <!-- Utilerias JS -->
    <script src="<?= base_url('assets/js/utilerias.js') ?>" type="text/javascript" charset="utf-8" async defer></script>     

    <!-- Sweet Alert -->
    <link type="text/css" href="<?= base_url('vendor/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="<?= base_url('vendor/notyf/notyf.min.css') ?>" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('css/volt.css') ?>" rel="stylesheet">
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.4/b-colvis-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.0/sl-1.3.1/datatables.min.css"/>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Dropzone CSS -->
    <link href="<?= base_url('vendor/dropzone-5.7.0/dist/dropzone.css') ?>" rel="stylesheet" />
    <!-- Global CSS -->
    <link href="<?= base_url('assets/css/global.css') ?>" rel="stylesheet" />
</head>