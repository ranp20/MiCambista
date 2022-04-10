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
	<title>Mi Cambista | Todas las transacciones </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body class="min-height">
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash" id="genCont-cli-dashboard">
				<div class="cControlP__cont--containDash--c">
					<div class="cControlP__cont--containDash--c--cCDashboard">
						
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-details-transactions.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
</body>
</html>