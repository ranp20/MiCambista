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
require_once '../php/class/client.php';
$classCli = new CLient();
$list_stvalidation = $classCli->get_status_biometric_validation($_SESSION['cli_sessmemopay'][0]['id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Memopay | Mi Perfil </title>
	<?php require_once 'includes/header_links.php'; ?>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div id="box-ModalValidAccBiometric"></div>
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="cControlP__cont--containDash--c box" id="cont-my-profile">
					<div class="cControlP__cont--containDash--c--myProfile">
						<div class="cControlP__cont--containDash--c--myProfile--cTitle">
							<h2 class="cControlP__cont--containDash--c--myProfile--cTitle--title">MI PERFIL</h2>
							<p class="cControlP__cont--containDash--c--myProfile--cTitle--desc">En Memopay nos preocupamos por la seguridad de tu información y la protegemos a través de un protocolo de seguridad que garantiza la privacidad de tus datos.</p>
						</div>
							<?php require_once 'includes/dashboard-form-my-profile-data-user.php';?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/dashboard-client.js"></script>
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/my-profile.js"></script>
</body>
</html>