<?php 
	session_start();
	if(!isset($_SESSION['cli_micambista'])){
		header("Location: signin");
	}
	require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
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
						<div class="cControlP__cont--containDash--c--myProfile--cContDataUser">
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data">
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--label">NOMBRE</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--input">TIMOTHY RICHARD</p>
								</div>
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--label">APELLIDO PATERNO</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--input">ANGELINO</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data">
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--label">APELLIDO MATERNO</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--input">ARONI</p>
								</div>
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--label">DOC Nº DOC</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDnonUpdatable-data--control--input">
										<span>DNI</span> 
										<span>76295926</span>
									</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate">
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--label">TELÉFONO</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--input">947220630</p>
								</div>
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--label">CORREO</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--input">apk125@gmail.com</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate">
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--label">OCUPACIÓN</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--input">Gerente de Administración y Finanzas</p>
								</div>
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--label">NACIONALIDAD</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemDdata-uddate--control--input">Sin especificar</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemUdata-uddate">
								<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemUdata-uddate--control">
									<label for="" class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemUdata-uddate--control--label">¿Es USTED UNA PERSONA POLÍTICAMENTE EXPUESTA?</label>
									<p class="cControlP__cont--containDash--c--myProfile--cContDataUser--itemUdata-uddate--control--input">NO</p>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate">
								<ul class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m">
									<li class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--item">
										<a href="#" class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--link">
											<span class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--link--cIcon">
												<svg xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve"><switch><foreignObject requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0" y="0" width="1" height="1"/><g i:extraneous="self"><g><path d="M5273.1,2400.1v-2c0-2.8-5-4-9.7-4s-9.7,1.3-9.7,4v2c0,1.8,0.7,3.6,2,4.9l5,4.9c0.3,0.3,0.4,0.6,0.4,1v6.4     c0,0.4,0.2,0.7,0.6,0.8l2.9,0.9c0.5,0.1,1-0.2,1-0.8v-7.2c0-0.4,0.2-0.7,0.4-1l5.1-5C5272.4,2403.7,5273.1,2401.9,5273.1,2400.1z      M5263.4,2400c-4.8,0-7.4-1.3-7.5-1.8v0c0.1-0.5,2.7-1.8,7.5-1.8c4.8,0,7.3,1.3,7.5,1.8C5270.7,2398.7,5268.2,2400,5263.4,2400z"/><path d="M5268.4,2410.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H5268.4z"/><path d="M5272.7,2413.7h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2414.1,5273.3,2413.7,5272.7,2413.7z"/><path d="M5272.7,2417h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2417.5,5273.3,2417,5272.7,2417z"/></g><g><circle cx="50" cy="64.6" r="6.6"/><circle cx="31.6" cy="64.6" r="6.6"/><circle cx="68.4" cy="64.6" r="6.6"/><path d="M77.4,31.7h-3.2v-5.1C74.1,13.3,63.3,2.5,50,2.5c-13.3,0-24.1,10.8-24.1,24.1v5.1h-3.2c-7.4,0-13.4,6-13.4,13.4v38.9     c0,7.4,6,13.4,13.4,13.4h54.7c7.4,0,13.4-6,13.4-13.4V45.2C90.8,37.8,84.8,31.7,77.4,31.7z M34.1,26.6c0-8.8,7.1-15.9,15.9-15.9     c8.8,0,15.9,7.1,15.9,15.9v5.1H34.1V26.6z M82.6,84.1c0,2.9-2.3,5.2-5.2,5.2H22.6c-2.9,0-5.2-2.3-5.2-5.2V45.2     c0-2.9,2.3-5.2,5.2-5.2h54.7c2.9,0,5.2,2.3,5.2,5.2V84.1z"/></g></g></switch></svg>
											</span>
											<span>Cambiar Contraseña</span>
										</a>
									</li>
									<li class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--item">
										<button type="button" class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--link" id="link-SValidModalAccBiometric">
											<span class="cControlP__cont--containDash--c--myProfile--cContDataUser--cDataValidate--m--link--cIcon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;" viewBox="0 0 846.66 1058.325" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd"><defs></defs><g><path class="fil0" d="M423.33 227.01c157.51,0 292.93,62.38 378.95,196.33 -86.02,133.95 -221.44,196.33 -378.95,196.33 -157.49,0 -292.96,-62.38 -378.95,-196.33 85.99,-133.95 221.46,-196.33 378.95,-196.33zm-392.52 -38.1l0 -158.09 158.09 0 0 54.28 -103.81 0 0 103.81 -54.28 0zm626.95 -158.09l158.09 0 0 158.09 -54.28 0 0 -103.81 -103.81 0 0 -54.28zm158.09 626.95l0 158.09 -158.09 0 0 -54.28 103.81 0 0 -103.81 54.28 0zm-626.95 158.09l-158.09 0 0 -158.09 54.28 0 0 103.81 103.81 0 0 54.28zm234.43 -519.13c69.93,0 126.61,56.68 126.61,126.61 0,69.93 -56.68,126.61 -126.61,126.61 -69.93,0 -126.61,-56.68 -126.61,-126.61 0,-69.93 56.68,-126.61 126.61,-126.61zm0 74.04c29.03,0 52.57,23.54 52.57,52.57 0,29.03 -23.54,52.57 -52.57,52.57 -29.03,0 -52.57,-23.54 -52.57,-52.57 0,-29.03 23.54,-52.57 52.57,-52.57zm-313.8 52.57c71.42,97.53 196.04,141.95 313.8,141.95 117.75,0 242.37,-44.42 313.79,-141.95 -71.42,-97.53 -196.04,-141.95 -313.79,-141.95 -117.76,0 -242.38,44.42 -313.8,141.95z"/></g></svg>
											</span>
											<span>Verificación Biométrica</span>
										</button>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/my-profile.js"></script>
</body>
</html>