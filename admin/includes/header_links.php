<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $url =  $actual_link . "/" ."micambista/admin/";
?>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="description" content="¡Gana cambiando con MiCambista! Dale a tu dinero el valor que merece."/>
<meta name="theme-color" content="#FFF394">
<meta name="author" content="R@np-2021"/>
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
<meta name="twitter.card" content="summary">
<meta property="og:locale" content="es_ES"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Mi Cambista - Panel de Administración"/>
<meta property="og:url" name="twitter.url" content="https://localhost/MiCambista/admin">
<meta property="og:title" name="twitter.title" content="Centro de cambio en línea con las mejores tasas | Mi Cambista"/>
<meta property="og:description" name="twitter.description" content="¡Gana cambiando con MiCambista! Dale a tu dinero el valor que merece."/>
<meta property="og:image" name="twitter.image" content="assets/img/svg/logo.svg"/>
<link rel="icon" type="image/x-icon" href="assets/img/svg/logo.svg"/>
<link rel="apple-touch-icon" href="assets/img/svg/logo.svg">
<link rel="canonical" href="https://localhost/MiCambista/admin">
<link rel="stylesheet" href="<?= $url ?>assets/css/styles.min.css">
<!-- JQUERY UNCOMPRESSED -->
<script src="<?= $url ?>js/jquery/jquery-3.6.0.min.js"></script>
<!-- BOOTSTRAP UNCOMPRESSED -->
<link rel="stylesheet" href="<?php echo $url ?>js/bootstrap/css/bootstrap.min.css">
<script src="<?php echo $url ?>js/bootstrap/js/bootstrap.min.js"></script>