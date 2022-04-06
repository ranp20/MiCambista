<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['admin_micambista'])){
	header("Location: admin");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Dashboard Admin</title>
	<?php require_once 'includes/header_links.php' ?> 
</head>
<body>
	<main class="cDash-adm">
		<?php require_once 'includes/sidebar_left.php';	?>
		<div class="cDash-adm--containRight">
			<?php require_once 'includes/headertop.php';	?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">DASHBOARD</h2>
				</div>
			</div>
		</div>
	</main>
	<script src="<?= $url ?>js/main.js"></script>
</body>
</html>