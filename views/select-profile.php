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
	<title>Mi Cambista | Panel de control</title>
	<?php require_once 'includes/header_links.php';?>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div class="cControlP">
		<div class="msgAlertLogin" id="msgAlertLogin"></div>
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash" id="page-indexusercontrol">
				<div class="cControlP__cont--containDash--c" id="cont-initial-page">
					<div class="cControlP__cont--containDash--c__ctitle">
						<h2>¡Nos alegra que estés aquí!</h2>
						<h3>Selecciona el perfil que usarás hoy</h3>
					</div>
					<div class="cControlP__cont--containDash--c__cBtnsOpts-m" id="c_listTypeProfileOfUser">
						<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
							<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__cIcon">
								<img src='<?= $url; ?>views/assets/img/svg/user-male.svg' alt='' width="100" height="100">
							</span>
							<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__ctext">
								<span><?php echo $name; ?></span>
							</span>
						</a>
						<a href="javascript:void(0);" id='btn-addAccountEnterpriseShow' class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
							<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__cIcon">
								<img src='<?= $url; ?>views/assets/img/svg/add-profile.svg' alt='' width="100" height="100" style="width:auto;height:auto;">
							</span>
							<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__ctext">
								<span>Agregar empresa</span>
							</span>
						</a>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-formaddenterprise.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/select-profile.js"></script>
</body>
</html>