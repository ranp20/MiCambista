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
<html lang="es" translate="no">
<head>
	<title>Mi Cambista | Dashboard </title>
	<?php require_once 'includes/header_links.php'; ?>
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
						<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape">
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange">
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange--cTitle">
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange--cTitle--cIcon">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
										<span>Total Cambiado</span>
									</div>
								</div>
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange--cList">
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange--cList--cDollarsToSoles">
										<h3>Dólares a Soles</h3>
										<p>No has completado niguna transacción</p>
									</div>
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cUChange--cList--cSolesToDollars">
										<h3>Soles a Dólares</h3>
										<p>No has completado niguna transacción</p>
									</div>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange">
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cTitle">
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cTitle--cIcon">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
										<span>Último cambios de divisa</span>
									</div>
									<a href="all-converts">Ver todos</a>
								</div>
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList">
									<ul class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m" id="c-listAlls_Transacs"></ul>
								</div>
							</div>
						</div>
						<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait">
							<!--
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--totalKash">
								<img src="views/assets/img/svg/tablero-kash.svg" alt="" width="100" height="100">
								<h2>No posees nigún KASH</h2>
							</div>
							-->
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesChanges">
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesChanges--cTitle">
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesChanges--cTitle--cIcon">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
										<span>Soles Cambios</span>
									</div>
									<p>Importe total en soles</p>
								</div>
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesChanges--cList">
									<h2>S/.0.00</h2>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesDollars">
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesDollars--cTitle">
									<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesDollars--cTitle--cIcon">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
										<span>Ahorro aproximados</span>
									</div>
									<p>Importe en relación a otras casas y bancos</p>
								</div>
								<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsPortrait--SolesDollars--cList">
									<h2>S/.0.00</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-details-transactions.php'; ?>
		</div>
	</div>		
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/tablero-client.js"></script>
</body>
</html>