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
	<title>Mi Cambista | Ajustes Generales</title>
	<?php require_once 'includes/header_links.php' ?>
	<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<?php require_once 'includes/sidebar_left.php';?>
		<div class="cDash-adm--containRight">
			<?php require_once 'includes/headertop.php';?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">AJUSTES</h2>
				</div>
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cSettings">
						<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideLinkAnchors">
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideLinkAnchors__cLinks" id="c-Settings_linksAnchors">
								<ul id="c-Settings_linksAnchors-m">
									<li data-target="#anchor_settings_home">Home</li>
									<li data-target="#anchor_settings_convert-divise">Conversiones</li>
									<li data-target="#anchor_settings_banners">Banners</li>
									<li data-target="#anchor_settings_logos">Logos</li>
									<li data-target="#anchor_settings_about-us">Nosotros</li>
								</ul>
							</div>
						</div>
						<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors">
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting" id="#anchor_settings_home">
								<form action="" method="POST">
									<div class="cDash-adm--containRight--cContain__cBody__cardBody">
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__contCol">
											<h3 class="cDash-adm--containRight--cContain__cBody__cardBody__contCol__cardTitle">Home</h3>
										</div>
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__colElement ta-right">
											<button type="submit" class="cDash-adm--containRight--cContain__cBody__cardBody__colElement__btnFormAction">
												<span>Guardar</span>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting" id="#anchor_settings_convert-divise">
								<form action="" method="POST">
									<div class="cDash-adm--containRight--cContain__cBody__cardBody">
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__contCol">
											<h3 class="cDash-adm--containRight--cContain__cBody__cardBody__contCol__cardTitle">Conversiones</h3>
										</div>
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__colElement ta-right">
											<button type="submit" class="cDash-adm--containRight--cContain__cBody__cardBody__colElement__btnFormAction">
												<span>Guardar</span>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting" id="#anchor_settings_banners">
								<form action="" method="POST">
									<div class="cDash-adm--containRight--cContain__cBody__cardBody">
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__contCol">
											<h3 class="cDash-adm--containRight--cContain__cBody__cardBody__contCol__cardTitle">Banners</h3>
										</div>
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__colElement ta-right">
											<button type="submit" class="cDash-adm--containRight--cContain__cBody__cardBody__colElement__btnFormAction">
												<span>Guardar</span>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting" id="#anchor_settings_logos">
								<form action="" method="POST">
									<div class="cDash-adm--containRight--cContain__cBody__cardBody">
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__contCol">
											<h3 class="cDash-adm--containRight--cContain__cBody__cardBody__contCol__cardTitle">Logos</h3>
										</div>
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__colElement ta-right">
											<button type="submit" class="cDash-adm--containRight--cContain__cBody__cardBody__colElement__btnFormAction">
												<span>Guardar</span>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div class="cDash-adm--containRight--cContain__cBody__cSettings__sideContAnchors__cItemSetting" id="#anchor_settings_about-us">
								<form action="" method="POST">
									<div class="cDash-adm--containRight--cContain__cBody__cardBody">
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__contCol">
											<h3 class="cDash-adm--containRight--cContain__cBody__cardBody__contCol__cardTitle">Nosotros</h3>
										</div>
										<div class="cDash-adm--containRight--cContain__cBody__cardBody__colElement ta-right">
											<button type="submit" class="cDash-adm--containRight--cContain__cBody__cardBody__colElement__btnFormAction">
												<span>Guardar</span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url ?>js/main.js"></script>
	<script type="text/javascript" src="<?= $url ?>js/actions_pages/settings.js"></script>
</body>
</html>