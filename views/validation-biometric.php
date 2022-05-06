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
	<title>Mi Cambista | Validación Biométrica </title>
	<?php require_once 'includes/header_links.php'; ?>
	<!--<script type="text/javascript" src="<?= $url ?>views/js/face-api/face-api.min.js"></script>-->
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
						<?php require_once 'includes/dashboard-validation-biometric.php'; ?>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-form-validation-media.php'; ?>
		</div>
	</div>
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/validation-biometric.js"></script>
</body>
</html>
