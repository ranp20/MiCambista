<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_sessmemopay'])){
	header("Location: signin");
}else{
	if($_SESSION['cli_sessmemopay'][0]['complete_account'] <= 16){
		header("Location: complete-register");
	}
}
require_once '../php/process_data-list.php';
$themeClass = '';
$themeClassBtn = '';
if(!empty($_COOKIE['theme'])){
	if($_COOKIE['theme'] == 'dark'){
		$themeClass = 'dark-theme';
		$themeClassBtn = 'checked';
	}else if($_COOKIE['theme'] == 'light'){
		$themeClass = 'light-theme';
		$themeClassBtn = '';
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Memopay | Bienvenida </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body class="dsh-cli <?php echo $themeClass; ?>">
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="cControlP__cont--containDash--c" id="cont-welcome">
					<div class="cControlP__cont--containDash--c--cWelcome">
						<div class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome">
							<div class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome--cTitle">
								<h2 class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome--cTitle--title">¡Bienvendo a Memopay!</h2>
								<p class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome--cTitle--desc">Con nosotros todo es más fácil, ahora puedes cambiar </br> dólares desde cualquier lugar.</p>
							</div>
						</div>
						<div class="cControlP__cont--containDash--c--cWelcome--cGotoConvert">
							<div class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle">
								<h3 class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--title">¡Cambia ahora con </br>Memopay!</h3>
								<p class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--desc">¿Qué esperas para realizar tu cambio de divisas?</p>
								<a href="convert-divise" class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--btnlinkmobile">Hacer cambio</a>
								<a href="convert-divise" class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--btnlinkdesktop">Quiero cambiar</a>
							</div>
							<img src="<?= $url ?>views/assets/img/svg/exchange-2.svg" alt="">
						</div>
						<!-- 
						<div class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend">
							<div class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle">
								<h3 class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--title">¡Gana KASH </br>recomendado!</h3>
								<p class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--desc">Comparte tu código de afiliado y gana KASH y más beneficios</p>
								<a href="#" class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--btnlinkmobile">Saber más</a>
								<a href="#" class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--btnlinkdesktop">Quiero saber más</a>
							</div>
							<img src="<?= $url ?>views/assets/img/svg/affiliate-3.svg" alt="">
						</div>
						 -->
					</div>
				</div>
			</section>
		</div>
	</div>
	<div class="cSwitchTgg__scheme">
		<input type="checkbox" id="darkmode-toggle" <?= $themeClassBtn;?>/>
		<label for="darkmode-toggle">
			<svg xmlns="http://www.w3.org/2000/svg" class="sun" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m600.82 292.86c-7.0898 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852h10.633c7.1055 0 12.852 5.7617 12.852 12.852 0 7.1055-5.7617 12.852-12.852 12.852zm-250.83-105.59c-7.1055 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852 32.691 0 62.312 13.254 83.75 34.691s34.691 51.055 34.691 83.75c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852 0-25.602-10.383-48.789-27.164-65.57-16.785-16.785-39.969-27.164-65.57-27.164zm-181.41 255.95c5.0234-5.0234 13.156-5.0234 18.18 0 5.0234 5.0234 5.0234 13.156 0 18.18l-33.414 33.434c-5.0234 5.0234-13.156 5.0234-18.18 0-5.0234-5.0234-5.0234-13.156 0-18.18l33.434-33.434zm344.66 18.18c-5.0234-5.0234-5.0234-13.156 0-18.18s13.156-5.0234 18.18 0l33.434 33.434c5.0234 5.0234 5.0234 13.156 0 18.18-5.0234 5.0234-13.156 5.0234-18.18 0zm18.18-344.66c-5.0234 5.0234-13.156 5.0234-18.18 0-5.0234-5.0234-5.0234-13.156 0-18.18l33.434-33.434c5.0234-5.0234 13.156-5.0234 18.18 0 5.0234 5.0234 5.0234 13.156 0 18.18l-33.434 33.414zm-344.66-18.18c5.0234 5.0234 5.0234 13.156 0 18.18-5.0234 5.0234-13.156 5.0234-18.18 0l-33.434-33.414c-5.0234-5.0234-5.0234-13.156 0-18.18 5.0234-5.0234 13.156-5.0234 18.18 0l33.414 33.434zm176.1-69.402c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852v-10.617c0-7.1055 5.7617-12.852 12.852-12.852s12.852 5.7617 12.852 12.852zm-12.852 54.062c54.332 0 103.52 22.023 139.12 57.625 35.617 35.617 57.641 84.809 57.641 139.14s-22.023 103.52-57.641 139.14c-35.598 35.598-84.809 57.625-139.12 57.625-54.332 0-103.52-22.023-139.14-57.641-35.598-35.598-57.625-84.789-57.625-139.12 0-54.332 22.023-103.52 57.625-139.14 35.617-35.598 84.809-57.625 139.14-57.625zm120.96 75.82c-30.961-30.961-73.719-50.098-120.96-50.098-47.242 0-90 19.137-120.96 50.098-30.961 30.961-50.098 73.719-50.098 120.96 0 47.242 19.137 90 50.098 120.96 30.961 30.945 73.719 50.098 120.96 50.098 47.227 0 90-19.152 120.96-50.098 30.945-30.961 50.098-73.719 50.098-120.96 0-47.242-19.152-90-50.098-120.96zm-371.79 108.09c7.1055 0 12.852 5.7617 12.852 12.852 0 7.1055-5.7617 12.852-12.852 12.852h-10.617c-7.1055 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852zm237.97 263.68c0-7.0898 5.7617-12.852 12.852-12.852s12.852 5.7617 12.852 12.852v10.633c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852z"/></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" class="moon" x="0px" y="0px" version="1.1" viewBox="0 0 700 700"><path d="m367.5 525c-150.5 0-262.5-112-262.5-262.5 0-147 108.5-245 210-245 7 0 12.25 3.5 15.75 8.75s3.5 12.25 0 17.5c-63 98-29.75 189 19.25 236.25 47.25 47.25 138.25 82.25 236.25 19.25 5.25-3.5 12.25-3.5 17.5 0s8.75 8.75 8.75 15.75c0 101.5-98 210-245 210zm-84-469c-73.5 19.25-143.5 98-143.5 206.5 0 129.5 98 227.5 227.5 227.5 108.5 0 187.25-70 206.5-143.5-98 45.5-192.5 14-248.5-42-56-54.25-87.5-150.5-42-248.5z"/></svg>
		</label>
	</div>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
</body>
</html>