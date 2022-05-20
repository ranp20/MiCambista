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
	<script type="text/javascript" src="../node_modules/chart.js/dist/chart.min.js"></script>
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
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics">
						<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic grp-large">
							<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic__cGrap" style="width:700px;height:auto;">
								<canvas id="firstGraphics" width="400" height="300"></canvas>
							</div>
						</div>
						<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic grp-small">
							<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic__cGrap" style="width:400px;height:auto;">
								<canvas id="secondGraphics" width="400" height="300"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url; ?>js/main.js"></script>
	<script type="text/javascript" src="<?= $url; ?>js/actions_pages/dashboard.js"></script>
</body>
</html>