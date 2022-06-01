<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}else{
	if($_SESSION['cli_micambista'][0]['complete_account'] <= 16){
		header("Location: complete-register");
	}
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Todas las transacciones </title>
	<?php require_once 'includes/header_links.php'; ?>
	<!-- INCLUIR DATATABLES -->
	<link rel="stylesheet" type="text/css" href="<?= $url ?>views/js/DataTables/datatables.min.css">
	<script type="text/javascript" charset="utf8" src="<?= $url ?>views/js/DataTables/datatables.min.js"></script>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
						<div class="cControlP__cont--containDash--c--cCDashboard__cAllTransacs">
							<div class="cControlP__cont--containDash--c--cCDashboard__cAllTransacs--cTop">
								<div class="cControlP__cont--containDash--c--cCDashboard__cAllTransacs--cTop--cBeforeReturn">
									<a href="tablero">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" size="20" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m297.36 385.28c11.199 11.199 28.559 11.199 39.762 0 11.199-11.199 11.199-28.559 0-39.762l-37.52-37.52h169.12c15.68 0 28-12.32 28-28s-12.32-28-28-28h-169.12l38.078-38.078c11.199-11.199 11.199-28.559 0-39.762-5.6016-5.6016-12.879-8.3984-19.602-8.3984-7.2812 0-14.559 2.8008-19.602 8.3984l-86.238 86.238c-5.0391 5.0391-8.3984 12.32-8.3984 19.602s2.8008 14.559 8.3984 19.602z"/><path d="m350 546c146.72 0 266-119.28 266-266s-119.28-266-266-266-266 119.28-266 266 119.28 266 266 266zm0-476c115.92 0 210 94.078 210 210s-94.078 210-210 210-210-94.078-210-210 94.078-210 210-210z"/></g></svg>
									</a>
								</div>
								<div class="cControlP__cont--containDash--c--cCDashboard__cAllTransacs--cTop--cTitle">
									<p>
										<svg class="MuiSvgIcon-root mr-2" focusable="false" viewBox="0 0 24 24" aria-hidden="true" width="30px" height="30px" size="20"><path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"></path></svg>
										<span>Cambios de divisa realizados</span>
									</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--cCDashboard__cAllTransacs--cBottom">
								<table id="all_transac-cli" cellpadding="0" width="100%">
									<thead>
										<tr>
											<th>Estado</th>
											<th>Pedido</th>
											<th>Fecha</th>
											<th>Solicitado</th>
											<th></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-details-transactions.php'; ?>
		</div>
	</div>		
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/all-transactions.js"></script>
</body>
</html>