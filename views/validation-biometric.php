<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}else{
	if(isset($_SESSION['cli_micambista'][0]['video_validation']) && !empty($_SESSION['cli_micambista'][0]['video_validation']) &&
		 isset($_SESSION['cli_micambista'][0]['photo_dni_front']) && !empty($_SESSION['cli_micambista'][0]['photo_dni_front']) && 
		 isset($_SESSION['cli_micambista'][0]['photo_dni_back']) && !empty($_SESSION['cli_micambista'][0]['photo_dni_back'])){
			header("Location: my-profile");
	}
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es" translate="no">
<head>
	<title>Mi Cambista | Validación Biométrica </title>
	<?php require_once 'includes/header_links.php'; ?>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="<?= $url ?>views/js/whammy/whammy.js"></script>
</head>
<body>
	<div id="box-ModalValidAccBiometric"></div>
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="cControlP__cont--containDash--c" id="cont-valid-biometric">
					<div class="cControlP__cont--containDash--c--validBiom">
						<?php require_once 'includes/dashboard-validation-biometric.php';?>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-form-validation-media.php';?>
		</div>
	</div>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/validation-biometric.js"></script>
</body>
</html>
