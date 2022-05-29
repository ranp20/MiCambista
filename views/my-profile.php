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
<html lang="es" translate="no">
<head>
	<title>Mi Cambista | Mi Perfil </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body>
	<div id="box-ModalValidAccBiometric"></div>
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="cControlP__cont--containDash--c" id="cont-my-profile">
					<div class="cControlP__cont--containDash--c--myProfile">
						<div class="cControlP__cont--containDash--c--myProfile--cTitle">
							<h2 class="cControlP__cont--containDash--c--myProfile--cTitle--title">MI PERFIL</h2>
							<p class="cControlP__cont--containDash--c--myProfile--cTitle--desc">En Mi Cambista nos preocupamos por la seguridad de tu información y la protegemos a través de un protocolo de seguridad que garantiza la privacidad de tus datos.</p>
						</div>
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser">
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