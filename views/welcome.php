<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Bienvenida </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body>
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
								<h2 class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome--cTitle--title">¡Bienvendo a Mi Cambista!</h2>
								<p class="cControlP__cont--containDash--c--cWelcome--cMsgWelcome--cTitle--desc">Con nosotros todo es más fácil, ahora puedes cambiar </br> dólares desde cualquier lugar.</p>
							</div>
						</div>
						<div class="cControlP__cont--containDash--c--cWelcome--cGotoConvert">
							<div class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle">
								<h3 class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--title">¡Cambia ahora con </br>Mi Cambista!</h3>
								<p class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--desc">¿Qué esperas para realizar tu cambio de divisas?</p>
								<a href="convert-divise" class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--btnlinkmobile">Hacer cambio</a>
								<a href="convert-divise" class="cControlP__cont--containDash--c--cWelcome--cGotoConvert--cTitle--btnlinkdesktop">Quiero cambiar</a>
							</div>
							<img src="<?= $url ?>views/assets/img/svg/exchange-2.svg" alt="">
						</div>
						<div class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend">
							<div class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle">
								<h3 class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--title">¡Gana KASH </br>recomendado!</h3>
								<p class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--desc">Comparte tu código de afiliado y gana KASH y más beneficios</p>
								<a href="#" class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--btnlinkmobile">Saber más</a>
								<a href="#" class="cControlP__cont--containDash--c--cWelcome--cMsgRecomend--cTitle--btnlinkdesktop">Quiero saber más</a>
							</div>
							<img src="<?= $url ?>views/assets/img/svg/affiliate-3.svg" alt="">
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
</body>
</html>