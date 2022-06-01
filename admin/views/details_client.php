<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['admin_micambista'])){
	header("Location: admin");
}
if(isset($_GET['client']) && !empty($_GET) && is_numeric($_GET['client'])){
	//header('Content-Type: video/mp4');
	require_once '../controllers/c_list-details-clients.php';
	$list = new Clients_Details();
	$client_details = $list->list_details($_GET['client']);
}else{
	header("Location: ../../clientes");
}

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
// CONFIGURACIÓN - LOCALHOST
$urlAdmin =  $actual_link . "/MiCambista/admin/";
$url =  $actual_link . "/" ."micambista/admin/views/";
$urlCli =  $actual_link . "/" ."micambista/";
// CONFIGURACIÓN - SERVIDOR
/*
$urlAdmin =  $actual_link . "/admin/";
$url =  $actual_link . "/" ."admin/views/";
$urlCli =  $actual_link . "/";
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Detalle del cliente</title>
	<?php require_once 'includes/header_links.php'; ?>
	<!-- HEADER LINKS (INICIO) -->
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
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
	<!--<meta property="og:image" name="twitter.image" content="<?php echo $url; ?>assets/img/svg/logo.svg"/>-->
	<link rel="icon" type="image/x-icon" href="../views/assets/img/svg/logo.svg"/>
	<!--<link rel="apple-touch-icon" href="<?php echo $url; ?>assets/img/svg/logo.svg">-->
	<link rel="canonical" href="https://localhost/MiCambista/admin">
	<!-- JQUERY UNCOMPRESSED -->
	<script type="text/javascript" src="<?= $url ?>js/jquery/jquery-3.6.0.min.js"></script>
	<!-- BOOTSTRAP DOWNLOADED -->
	<link rel="stylesheet" href="<?php echo $url ?>js/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo $url ?>js/bootstrap/js/bootstrap.min.js"></script>
	<!-- STYLESSHEET -->
	<link rel="stylesheet" href="<?= $url ?>assets/css/styles.min.css">
	<!-- GOOGLE FONTS -->
	<!--
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
	-->
	<!-- SWEET ALERTS 2 -->
	<link rel="stylesheet" href="<?php echo $urlCli; ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="<?php echo $urlCli; ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<!-- HEADER LINKS (FIN) -->
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<!-- SIDEBAR-LEFT (INICIO) -->
		<div class="cDash-adm--csidebarLeft">
			<div class="cDash-adm--csidebarLeft__sidenav">
				<span id="closebtnToggSideNav_icon">
			  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
			  </span>
			  <div class="cDash-adm--csidebarLeft__sidenav__logo">
			  	<a href="admin" class="cDash-adm--csidebarLeft__sidenav__logo__link">
						<img src="<?= $url; ?>assets/img/logos/logo_principal/Memopay_logo.png" alt="logoDashboard_MiCambista" width="100" height="100" decoding="async">
					</a>
			  </div>
			  <ul class="cDash-adm--csidebarLeft__sidenav__mnav">
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="./../admin" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/></svg>
			        <span>Home</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/clientes" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
			        <span>Clientes</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/cupones" class="cDash-adm--csidebarLeft__sidenav__mnav--link">  
							<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.68 122.88"><title>discount-voucher</title><path d="M100.87,60.09c-5.65-8.65-9.59-14.76-13.78-21.23-2.2-3.41-4.48-6.93-7.44-11.48l-1.3.85a2.7,2.7,0,0,1-4-3.12,2.64,2.64,0,0,1,1.08-1.4l1.31-.86c-3-4.68-6.77-10.39-11.59-17.77a.68.68,0,0,0-.41-.28.71.71,0,0,0-.49.09L62,6.32a10.12,10.12,0,0,1,.45,5.75,10.24,10.24,0,0,1-4.36,6.44l-.07.06A10.31,10.31,0,0,1,45.34,17.4L43,18.86a10.3,10.3,0,0,1,.48,5.56A10.13,10.13,0,0,1,39.09,31l-.37.24a10.09,10.09,0,0,1-7.58,1.28,10.39,10.39,0,0,1-5-2.71l-2.93,1.91a.65.65,0,0,0-.24.38.68.68,0,0,0,0,.42l.1.16c4.7,7.19,8.39,12.93,11.47,17.72l.08,0,4.52-3a2.7,2.7,0,0,1,4,3.12,2.74,2.74,0,0,1-1.08,1.4l-4.52,2.95-.12.07c1.13,1.77,2.22,3.46,3.35,5.19Zm-65.68,0-3.85-6c-3.1-4.83-6.85-10.67-12.25-18.94h0a5.43,5.43,0,0,1,1.55-7.5c1.26-.84,3.49-2.47,4.74-3.1a2.4,2.4,0,0,1,3.31.73l0,.06a5.61,5.61,0,0,0,3.46,2.46,5.36,5.36,0,0,0,4-.67l.25-.16a5.37,5.37,0,0,0,2.31-3.46,5.6,5.6,0,0,0-.86-4.15l-.09-.15a2.4,2.4,0,0,1,.79-3.29l5.95-3.65a2.39,2.39,0,0,1,3.32.69,5.45,5.45,0,0,0,7.57,1.59l.06,0a5.5,5.5,0,0,0,2.32-3.43,5.34,5.34,0,0,0-.76-4l-.15-.22a2.4,2.4,0,0,1,.7-3.32l4-2.62a5.45,5.45,0,0,1,7.52,1.58C80,19,85.73,28,91.11,36.26c4,6.26,7.83,12.11,15.49,23.83h.63a5.46,5.46,0,0,1,5.45,5.44v5.61a2.41,2.41,0,0,1-2.4,2.4H110a5.3,5.3,0,0,0-3.77,1.57,5.47,5.47,0,0,0-1.61,3.83v.14a5.32,5.32,0,0,0,1.62,3.84l.11.11a5.63,5.63,0,0,0,3.84,1.45h.1a2.4,2.4,0,0,1,2.4,2.38h0v10a2.4,2.4,0,0,1-2.4,2.4h-.1a5.7,5.7,0,0,0-3.94,1.55,5.37,5.37,0,0,0-1.64,3.84v.15a5.49,5.49,0,0,0,1.61,3.83,5.32,5.32,0,0,0,3.77,1.58h.28a2.39,2.39,0,0,1,2.41,2.37v0h0v4.78a5.46,5.46,0,0,1-5.45,5.44H5.44A5.46,5.46,0,0,1,0,117.44v-4.78a2.4,2.4,0,0,1,2.4-2.4h.3a5.3,5.3,0,0,0,3.77-1.57,5.55,5.55,0,0,0,1.61-3.83v-.07h0A5.46,5.46,0,0,0,2.6,99.32a2.4,2.4,0,0,1-2.4-2.4v-.16L0,86.92a2.39,2.39,0,0,1,2.34-2.44H2.5a5.67,5.67,0,0,0,4-1.54h0a5.36,5.36,0,0,0,1.62-3.84v-.16a5.37,5.37,0,0,0-1.62-3.83L6.35,75A5.68,5.68,0,0,0,2.5,73.54l-.27,0A2.38,2.38,0,0,1,0,71.15H0V65.53a5.46,5.46,0,0,1,5.44-5.44Zm26.09,45.22a3.74,3.74,0,0,1-1.49,1.46,6.91,6.91,0,0,1-3.15.52c-1.48,0-2.21-.39-2.21-1.17a1.47,1.47,0,0,1,.09-.36l16-28.23a6.19,6.19,0,0,1,.75-1.11,3.53,3.53,0,0,1,1.24-.77,5.87,5.87,0,0,1,2.25-.38c1.87,0,2.8.41,2.8,1.22a.87.87,0,0,1-.09.4L61.28,105.31ZM54,92.45a14.65,14.65,0,0,1-3.46-.36,7.93,7.93,0,0,1-2.72-1.26c-1.72-1.23-2.57-3.62-2.57-7.17s.9-5.77,2.7-7a11,11,0,0,1,6-1.48,11.34,11.34,0,0,1,6.08,1.48c1.81,1.18,2.71,3.49,2.71,7s-.86,6-2.57,7.17A10.75,10.75,0,0,1,54,92.45Zm0-4.37a.72.72,0,0,0,.58-.27c.39-.42.59-1.49.59-3.2A22.78,22.78,0,0,0,55,81.07a2.65,2.65,0,0,0-.41-1.2.78.78,0,0,0-.58-.22c-.79,0-1.18,1.4-1.18,4.21s.39,4.22,1.18,4.22ZM77.7,107.74a14.5,14.5,0,0,1-3.45-.36,7.89,7.89,0,0,1-2.73-1.26C69.8,104.89,69,102.5,69,99s.9-5.76,2.7-6.9a10.76,10.76,0,0,1,6-1.54,11.14,11.14,0,0,1,6.09,1.54q2.7,1.71,2.7,6.9c0,3.58-.85,6-2.57,7.17a10.75,10.75,0,0,1-6.22,1.62Zm0-4.37a.78.78,0,0,0,.58-.23c.4-.45.59-1.53.59-3.24a22.78,22.78,0,0,0-.18-3.54,2.65,2.65,0,0,0-.41-1.2.78.78,0,0,0-.58-.23c-.78,0-1.17,1.41-1.17,4.22s.39,4.22,1.17,4.22Zm29.53-38.48h-78v3.6a1.63,1.63,0,0,1,0,.31A2.1,2.1,0,0,1,25,68.49v-3.6H5.44a.64.64,0,0,0-.45.19.68.68,0,0,0-.19.45V69a10.38,10.38,0,0,1,4.83,2.53l.15.13a10.14,10.14,0,0,1,3.08,7.25v.24a10.14,10.14,0,0,1-3.08,7.24A10.36,10.36,0,0,1,4.84,89L5,94.79a10.26,10.26,0,0,1,7.92,10s0,.1,0,.12a10.28,10.28,0,0,1-8.06,9.93v2.6a.65.65,0,0,0,.64.64H25V114.7a1.45,1.45,0,0,1,0-.3,2.1,2.1,0,0,1,4.18.3v3.38h78a.67.67,0,0,0,.65-.64v-2.61a10.13,10.13,0,0,1-5.07-2.77,10.33,10.33,0,0,1-3-7.15v-.24a10.18,10.18,0,0,1,3.09-7.23h0a10.38,10.38,0,0,1,5-2.66V89a10.27,10.27,0,0,1-4.83-2.52l-.15-.13a10.19,10.19,0,0,1-3.09-7.24v-.25a10.37,10.37,0,0,1,3-7.15A10.14,10.14,0,0,1,107.88,69V65.53a.65.65,0,0,0-.2-.45.6.6,0,0,0-.45-.19ZM25,81.09a2.1,2.1,0,0,0,4.18.31,1.55,1.55,0,0,0,0-.31v-4.2a2.1,2.1,0,0,0-4.18-.3,1.45,1.45,0,0,0,0,.3v4.2ZM25,93.7a2.1,2.1,0,0,0,4.18.3,1.45,1.45,0,0,0,0-.3V89.5a2.1,2.1,0,0,0-4.18-.31,1.55,1.55,0,0,0,0,.31v4.2Zm0,12.6a2.1,2.1,0,0,0,4.18.31,1.63,1.63,0,0,0,0-.31v-4.2a2.1,2.1,0,0,0-4.18-.31,1.63,1.63,0,0,0,0,.31v4.2ZM55.75,43a2.76,2.76,0,0,0,1.08-1.39,2.7,2.7,0,0,0-4-3.13l-4.52,3a2.7,2.7,0,1,0,3,4.52l4.52-3Zm13.56-8.87a2.62,2.62,0,0,0,1.08-1.39,2.7,2.7,0,0,0-4-3.13l-4.53,3A2.76,2.76,0,0,0,60.75,34a2.7,2.7,0,0,0,4,3.13l4.52-3Z"/></svg>
			        <span>Cupones</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/operaciones" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M32 176h370.8l-57.38 57.38c-12.5 12.5-12.5 32.75 0 45.25C351.6 284.9 359.8 288 368 288s16.38-3.125 22.62-9.375l112-112c12.5-12.5 12.5-32.75 0-45.25l-112-112c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L402.8 112H32c-17.69 0-32 14.31-32 32S14.31 176 32 176zM480 336H109.3l57.38-57.38c12.5-12.5 12.5-32.75 0-45.25s-32.75-12.5-45.25 0l-112 112c-12.5 12.5-12.5 32.75 0 45.25l112 112C127.6 508.9 135.8 512 144 512s16.38-3.125 22.62-9.375c12.5-12.5 12.5-32.75 0-45.25L109.3 400H480c17.69 0 32-14.31 32-32S497.7 336 480 336z"/></svg>
			        <span>Operaciones</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/tarifario" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="hand-holding-usd" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-hand-holding-usd fa-w-18 fa-3x"><path fill="currentColor" d="M256.7 135.7l56.4 16.1c8.8 2.5 14.9 10.6 14.9 19.7 0 11.3-9.2 20.5-20.5 20.5h-36.9c-8.2 0-16.1-2.6-22.6-7.3-3-2.2-7.2-1.5-9.8 1.2l-11.4 11.4c-3.5 3.5-2.9 9.2 1 12.2 12.3 9.4 27.2 14.5 42.9 14.5h1.4v24c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-24h1.4c22.8 0 44.3-13.6 51.7-35.2 10.1-29.6-7.3-59.8-35.1-67.8L263 104.1c-8.8-2.5-14.9-10.6-14.9-19.7 0-11.3 9.2-20.5 20.5-20.5h36.9c8.2 0 16.1 2.6 22.6 7.3 3 2.2 7.2 1.5 9.8-1.2l11.4-11.4c3.5-3.5 2.9-9.2-1-12.2C336 37.1 321.1 32 305.4 32H304V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v24h-3.5c-30.6 0-55.1 26.3-52.2 57.5 2 22.1 19 40.1 40.4 46.2zm301.6 197.9c-19.7-17.7-49.4-17.6-69.9-1.2l-61.6 49.3c-1.9 1.5-4.2 2.3-6.7 2.3h-41.6c4.6-9.6 6.5-20.7 4.8-32.3-4-27.9-29.6-47.7-57.8-47.7H181.3c-20.8 0-41 6.7-57.6 19.2L85.3 352H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h88l46.9-35.2c11.1-8.3 24.6-12.8 38.4-12.8H328c13.3 0 24 10.7 24 24s-10.7 24-24 24h-88c-8.8 0-16 7.2-16 16s7.2 16 16 16h180.2c9.7 0 19.1-3.3 26.7-9.3l61.6-49.2c7.7-6.1 20-7.6 28.4 0 10.1 9.1 9.3 24.5-.9 32.6l-100.8 80.7c-7.6 6.1-17 9.3-26.7 9.3H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h400.5c17 0 33.4-5.8 46.6-16.4L556 415c12.2-9.8 19.5-24.4 20-40s-6-30.8-17.7-41.4z" class=""></path></svg>
			        <span>Tarifario</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/bancos" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M243.4 2.587C251.4-.8625 260.6-.8625 268.6 2.587L492.6 98.59C506.6 104.6 514.4 119.6 511.3 134.4C508.3 149.3 495.2 159.1 479.1 160V168C479.1 181.3 469.3 192 455.1 192H55.1C42.74 192 31.1 181.3 31.1 168V160C16.81 159.1 3.708 149.3 .6528 134.4C-2.402 119.6 5.429 104.6 19.39 98.59L243.4 2.587zM256 128C273.7 128 288 113.7 288 96C288 78.33 273.7 64 256 64C238.3 64 224 78.33 224 96C224 113.7 238.3 128 256 128zM127.1 416H167.1V224H231.1V416H280V224H344V416H384V224H448V420.3C448.6 420.6 449.2 420.1 449.8 421.4L497.8 453.4C509.5 461.2 514.7 475.8 510.6 489.3C506.5 502.8 494.1 512 480 512H31.1C17.9 512 5.458 502.8 1.372 489.3C-2.715 475.8 2.515 461.2 14.25 453.4L62.25 421.4C62.82 420.1 63.41 420.6 63.1 420.3V224H127.1V416z"/></svg>
			        <span>Bancos</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/transbanks" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M512 64C547.3 64 576 92.65 576 128V384C576 419.3 547.3 448 512 448H64C28.65 448 0 419.3 0 384V128C0 92.65 28.65 64 64 64H512zM272 192C263.2 192 256 199.2 256 208C256 216.8 263.2 224 272 224H496C504.8 224 512 216.8 512 208C512 199.2 504.8 192 496 192H272zM272 320H496C504.8 320 512 312.8 512 304C512 295.2 504.8 288 496 288H272C263.2 288 256 295.2 256 304C256 312.8 263.2 320 272 320zM164.1 160C164.1 148.9 155.1 139.9 143.1 139.9C132.9 139.9 123.9 148.9 123.9 160V166C118.3 167.2 112.1 168.9 108 171.1C93.06 177.9 80.07 190.5 76.91 208.8C75.14 219 76.08 228.9 80.32 237.8C84.47 246.6 91 252.8 97.63 257.3C109.2 265.2 124.5 269.8 136.2 273.3L138.4 273.9C152.4 278.2 161.8 281.3 167.7 285.6C170.2 287.4 171.1 288.8 171.4 289.7C171.8 290.5 172.4 292.3 171.7 296.3C171.1 299.8 169.2 302.8 163.7 305.1C157.6 307.7 147.7 309 134.9 307C128.9 306 118.2 302.4 108.7 299.2C106.5 298.4 104.3 297.7 102.3 297C91.84 293.5 80.51 299.2 77.02 309.7C73.53 320.2 79.2 331.5 89.68 334.1C90.89 335.4 92.39 335.9 94.11 336.5C101.1 339.2 114.4 343.4 123.9 345.6V352C123.9 363.1 132.9 372.1 143.1 372.1C155.1 372.1 164.1 363.1 164.1 352V346.5C169.4 345.5 174.6 343.1 179.4 341.9C195.2 335.2 207.8 322.2 211.1 303.2C212.9 292.8 212.1 282.8 208.1 273.7C204.2 264.7 197.9 258.1 191.2 253.3C179.1 244.4 162.9 239.6 150.8 235.9L149.1 235.7C135.8 231.4 126.2 228.4 120.1 224.2C117.5 222.4 116.7 221.2 116.5 220.7C116.3 220.3 115.7 219.1 116.3 215.7C116.7 213.7 118.2 210.4 124.5 207.6C130.1 204.7 140.9 203.1 153.1 204.1C157.5 205.7 171 208.3 174.9 209.3C185.5 212.2 196.5 205.8 199.3 195.1C202.2 184.5 195.8 173.5 185.1 170.7C180.7 169.5 170.7 167.5 164.1 166.3L164.1 160z"/></svg>
			        <span>Cuentas de transferencia</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/paises" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 496C64 504.8 56.75 512 48 512h-32C7.25 512 0 504.8 0 496V32c0-17.75 14.25-32 32-32s32 14.25 32 32V496zM476.3 0c-6.365 0-13.01 1.35-19.34 4.233c-45.69 20.86-79.56 27.94-107.8 27.94c-59.96 0-94.81-31.86-163.9-31.87C160.9 .3055 131.6 4.867 96 15.75v350.5c32-9.984 59.87-14.1 84.85-14.1c73.63 0 124.9 31.78 198.6 31.78c31.91 0 68.02-5.971 111.1-23.09C504.1 355.9 512 344.4 512 332.1V30.73C512 11.1 495.3 0 476.3 0z"/></svg>
			        <span>Países</span>
			      </a>
			    </li>
			    <li class="cDash-adm--csidebarLeft__sidenav__mnav--item">
			      <a href="../../admin/ajustes" class="cDash-adm--csidebarLeft__sidenav__mnav--link">
			        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M495.9 166.6C499.2 175.2 496.4 184.9 489.6 191.2L446.3 230.6C447.4 238.9 448 247.4 448 256C448 264.6 447.4 273.1 446.3 281.4L489.6 320.8C496.4 327.1 499.2 336.8 495.9 345.4C491.5 357.3 486.2 368.8 480.2 379.7L475.5 387.8C468.9 398.8 461.5 409.2 453.4 419.1C447.4 426.2 437.7 428.7 428.9 425.9L373.2 408.1C359.8 418.4 344.1 427 329.2 433.6L316.7 490.7C314.7 499.7 307.7 506.1 298.5 508.5C284.7 510.8 270.5 512 255.1 512C241.5 512 227.3 510.8 213.5 508.5C204.3 506.1 197.3 499.7 195.3 490.7L182.8 433.6C167 427 152.2 418.4 138.8 408.1L83.14 425.9C74.3 428.7 64.55 426.2 58.63 419.1C50.52 409.2 43.12 398.8 36.52 387.8L31.84 379.7C25.77 368.8 20.49 357.3 16.06 345.4C12.82 336.8 15.55 327.1 22.41 320.8L65.67 281.4C64.57 273.1 64 264.6 64 256C64 247.4 64.57 238.9 65.67 230.6L22.41 191.2C15.55 184.9 12.82 175.3 16.06 166.6C20.49 154.7 25.78 143.2 31.84 132.3L36.51 124.2C43.12 113.2 50.52 102.8 58.63 92.95C64.55 85.8 74.3 83.32 83.14 86.14L138.8 103.9C152.2 93.56 167 84.96 182.8 78.43L195.3 21.33C197.3 12.25 204.3 5.04 213.5 3.51C227.3 1.201 241.5 0 256 0C270.5 0 284.7 1.201 298.5 3.51C307.7 5.04 314.7 12.25 316.7 21.33L329.2 78.43C344.1 84.96 359.8 93.56 373.2 103.9L428.9 86.14C437.7 83.32 447.4 85.8 453.4 92.95C461.5 102.8 468.9 113.2 475.5 124.2L480.2 132.3C486.2 143.2 491.5 154.7 495.9 166.6V166.6zM256 336C300.2 336 336 300.2 336 255.1C336 211.8 300.2 175.1 256 175.1C211.8 175.1 176 211.8 176 255.1C176 300.2 211.8 336 256 336z"/></svg>
			        <span>Ajustes</span>
			      </a>
			    </li>
			  </ul>
			</div>
		</div>
		<!-- SIDEBAR-LEFT (FIN) -->
		<div class="cDash-adm--containRight">
			<!-- HEADER TOP (INICIO) -->
			<div class="cDash-adm--containRight--cTop">
				<div class="cDash-adm--containRight--cTop--cont">
					<div class="cDash-adm--containRight--cTop--cont--item">
						<span id="openbtnToggSideNav_icon" class="cDash-adm--containRight--cTop--cont--item--btniconOpen">
					  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
					  </span>
					</div>
					<div class="cDash-adm--containRight--cTop--cont--item" id="btnClockUnitinSite">
						<p class="mr-1rem" id="dash-timeclock-detail"></p>
					</div>
					<div class="cDash-adm--containRight--cTop--cont--item__liveWeb" id="btnLiveinSite">
						<a href="../../" target="_blank" class="cDash-adm--containRight--cTop--cont--item__liveWeb__link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
						</a>
					</div>
					<div class="cDash-adm--containRight--cTop--cont--item">
						<div class="cDash-adm--containRight--cTop--cont--item--user" id="menu-Optsuser">
							<img src="<?= $url ?>assets/img/images/user_default.png" alt="">
						</div>
						<ul class="cDash-adm--containRight--cTop--cont--item--m" id="m-OptsuserList">
							<li class="cDash-adm--containRight--cTop--cont--item--m--item"><a href="#" class="cDash-adm--containRight--cTop--cont--item--m--link">Mi perfil</a>
							</li>
							<li class="cDash-adm--containRight--cTop--cont--item--m--item">
								<a href="<?= $urlAdmin ?>php/process_logout-adm.php" class="cDash-adm--containRight--cTop--cont--item--m--link">Cerrar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function refreshTime(){
					let currentDate = new Date(),
							year = currentDate.getFullYear(),
							month = currentDate.getMonth(),
							day = parseInt(currentDate.toDateString().slice(8, -5)),
							weekday = currentDate.getDay(),
							hours = currentDate.getHours(),
							minutes = currentDate.getMinutes(),
							seconds = currentDate.getSeconds();

					const weekdays = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
					const months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

					if(day < 10){
						day = "0" + day;
					}

					if(minutes < 10){
						minutes = "0" + minutes;
					}

					if(seconds < 10){
						seconds = "0" + seconds;
					}
					
					document.querySelector('#dash-timeclock-detail').textContent = weekdays[weekday] + ", " + day + " de " + months[month] + " del " + year + " - " + hours + " : " +minutes + " : " +seconds;
				}

				setInterval(refreshTime, 1000);
			</script>
			<!-- HEADER TOP (FIN) -->
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">INFORMACIÓN DEL CLIENTE</h2>
					<!--<button type="button" href="#" id="add-category" class="cDash-adm--containRight--cContain__addtitle--btn-add" data-toggle="modal" data-target="#addcategoryModal"><span class="cDash-adm--containRight--cContain__addtitle--btn-add__hidden">Agregar&nbsp;</span>+</button>-->
				</div>
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo">
						<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardTitle">
							<h4>GENERAL</h4>
						</div>
						<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody">
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo">
								<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Nombres</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php echo $client_details[0]['name']; ?></p>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Apellidos</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php  echo $client_details[0]['lastname']; ?></p>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Email</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php  echo $client_details[0]['email']; ?></p>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Teléfono</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php  echo $client_details[0]['telephone']; ?></p>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">N° de Documento</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php echo $client_details[0]['n_document']; ?></p>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Sexo</label>
				          <p class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__paragraphinfo"><?php  echo $client_details[0]['t_sex']; ?></p>
				        </div>
							</div>
						</div>
					</div>
					<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo">
						<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardTitle">
							<h4>VALIDACIÓN BIOMÉTRICA</h4>
						</div>
						<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody">
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol">
								<input type="hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="val-id_client" value="<?php echo $_GET['client']; ?>">
								<h3 class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardTitle">DOCUMENTO DE IDENTIDAD:</h3>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo">
								<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">DNI frontal</label>
				          <?php
				          $tmp_dnifront = "";
				          	if(isset($client_details[0]['photo_dni_front']) && !empty($client_details[0]['photo_dni_front'])){
				          		$path_dnifront = "../views/assets/img/clients/dni/".$client_details[0]['photo_dni_front'];
				          		$tmp_dnifront = "
						          	<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__cimageinfo' id='c-imgFrontValidDoc'>
							          	<img src='{$path_dnifront}' alt='' width='100' height='100' style='width:200px;height:auto;'>
							          </div>";
				          	}else{
				          		$tmp_dnifront = "
						          	<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__cimageinfo' id='c-imgFrontValidDoc'>
						          		<span>No se subió imagen</span>
						          	</div>";
				          	}
				          	echo $tmp_dnifront;
				          ?>
				        </div>
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">DNI Posterior</label>
				          <?php
				          $tmp_dnifront = "";
				          	if(isset($client_details[0]['photo_dni_back']) && !empty($client_details[0]['photo_dni_back'])){
				          		$path_dnifront = "../views/assets/img/clients/dni/".$client_details[0]['photo_dni_back'];
				          		$tmp_dnifront = "
						          	<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__cimageinfo' id='c-imgBackValidDoc'>
						          	<img src='{$path_dnifront}' alt='' width='100' height='100' style='width:200px;height:auto;'>
						          </div>";
				          	}else{
				          		$tmp_dnifront = "
						          	<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__cimageinfo' id='c-imgBackValidDoc'>
							          	<span>No se subió imagen</span>
							          </div>";
				          	}
				          	echo $tmp_dnifront;
				          ?>
				        </div>
							</div>
							<!-- 
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol">
								<h3 class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardTitle">MULTIMEDIA</h3>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo">
				        <div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem">
				          <label for="" class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cardGrpControlsinfo__ctrlItem__labelinfo">Video</label>
				          <?php 
			          		/*echo $client_details[0]['video_validation'];*/
			          	?>
				          	<video src="<?php /*echo "blob:https://localhost/".$client_details[0]['video_validation']*/ ?>" id="videoShowClient" controls playsinline></video>
				          	<video width="320" height="240" controls="controls" poster="image" preload="metadata">
				          	<source src="<?php /*echo "data:video/*;base64,".base64_encode($client_details[0]['video_validation']);*/ ?>" type="">
			          	</div>
				        </div>
							</div>
							 -->
							<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol">
								<div class="cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts" id="c-btnActionsToMultimediaDocs">
									<?php
										$tmp_validstatus = "";
										if(isset($client_details[0]['photo_dni_front']) && !empty($client_details[0]['photo_dni_front']) && isset($client_details[0]['photo_dni_back']) && !empty($client_details[0]['photo_dni_back']) && $client_details[0]['validation_status'] == "in_review"){
											$tmp_validstatus .= "<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c'>	
											<button type='button' class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn btn__valid-cust-success' data-valid='confirm'>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cIcon'>
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
												</span>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cText'>CONFIRMAR VALIDACIÓN</span>
											</button>
											<button type='button' class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn btn__valid-cust-danger' data-valid='canceled'>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cIcon'>
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
												</span>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cText'>DENEGAR VALIDACIÓN</span>
											</button>
											</div>";
										}else if(isset($client_details[0]['photo_dni_front']) && !empty($client_details[0]['photo_dni_front']) && isset($client_details[0]['photo_dni_back']) && !empty($client_details[0]['photo_dni_back']) && $client_details[0]['validation_status'] == "accepted"){
											$tmp_validstatus .= "<div class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c'>	
											<button type='button' class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn btn__valid-cust-success' data-valid='confirm'>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cIcon'>
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
												</span>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cText'>CONFIRMAR VALIDACIÓN</span>
											</button>
											<button type='button' class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn btn__valid-cust-danger' data-valid='canceled'>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cIcon'>
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
												</span>
												<span class='cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn__cText'>DENEGAR VALIDACIÓN</span>
											</button>
											</div>";
										}else{
											// $tmp_validstatus .= "<div><span class='mssg__txtLineSuccess'>VALIDACIÓN ACEPTADA</span></div>";
											// echo "La validación fue aceptada, depende del cliente si se quiere dejar sin botones luego de actualizar.";
										}
										echo $tmp_validstatus;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL - EDITAR ITEMS -->
				<!-- FIN MODALS-->
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url; ?>js/main.js"></script>
	<script type="text/javascript" src="<?= $url; ?>js/actions_pages/details-client.js"></script>
</body>
</html>