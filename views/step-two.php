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
	<title>Mi Cambista | Paso 2 </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body>
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="sendBeforeCompleteDivise" id="sendBeforeCompleteDivise">
					<div class="sendBeforeCompleteDivise__charger">
						<div class="sendBeforeCompleteDivise__charger--loader"></div>
					</div>
				</div>
				<?php 
					echo "<pre>";
					print_r($_POST);
					echo "</pre>";
				?>
				<?php require_once 'includes/dashboard-contain-footer.php'; ?>
			</section>
			<?php require_once 'includes/dashboard-formaddaccountbank.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
</body>
</html>