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
					<div class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume">
						<a href="clientes" class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn">
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cIcon">
								<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg>
							</span>
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cText">Clientes</span>
						</a>
						<a href="operaciones" class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn">
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cIcon">
								<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 512 512"><path d="M32 176h370.8l-57.38 57.38c-12.5 12.5-12.5 32.75 0 45.25C351.6 284.9 359.8 288 368 288s16.38-3.125 22.62-9.375l112-112c12.5-12.5 12.5-32.75 0-45.25l-112-112c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L402.8 112H32c-17.69 0-32 14.31-32 32S14.31 176 32 176zM480 336H109.3l57.38-57.38c12.5-12.5 12.5-32.75 0-45.25s-32.75-12.5-45.25 0l-112 112c-12.5 12.5-12.5 32.75 0 45.25l112 112C127.6 508.9 135.8 512 144 512s16.38-3.125 22.62-9.375c12.5-12.5 12.5-32.75 0-45.25L109.3 400H480c17.69 0 32-14.31 32-32S497.7 336 480 336z"></path></svg>
							</span>
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cText">Operaciones</span>
						</a>
						<a href="tarifario" class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn">
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cIcon">
								<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="hand-holding-usd" role="img" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 576 512" class="svg-inline--fa fa-hand-holding-usd fa-w-18 fa-3x"><path fill="currentColor" d="M256.7 135.7l56.4 16.1c8.8 2.5 14.9 10.6 14.9 19.7 0 11.3-9.2 20.5-20.5 20.5h-36.9c-8.2 0-16.1-2.6-22.6-7.3-3-2.2-7.2-1.5-9.8 1.2l-11.4 11.4c-3.5 3.5-2.9 9.2 1 12.2 12.3 9.4 27.2 14.5 42.9 14.5h1.4v24c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-24h1.4c22.8 0 44.3-13.6 51.7-35.2 10.1-29.6-7.3-59.8-35.1-67.8L263 104.1c-8.8-2.5-14.9-10.6-14.9-19.7 0-11.3 9.2-20.5 20.5-20.5h36.9c8.2 0 16.1 2.6 22.6 7.3 3 2.2 7.2 1.5 9.8-1.2l11.4-11.4c3.5-3.5 2.9-9.2-1-12.2C336 37.1 321.1 32 305.4 32H304V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v24h-3.5c-30.6 0-55.1 26.3-52.2 57.5 2 22.1 19 40.1 40.4 46.2zm301.6 197.9c-19.7-17.7-49.4-17.6-69.9-1.2l-61.6 49.3c-1.9 1.5-4.2 2.3-6.7 2.3h-41.6c4.6-9.6 6.5-20.7 4.8-32.3-4-27.9-29.6-47.7-57.8-47.7H181.3c-20.8 0-41 6.7-57.6 19.2L85.3 352H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h88l46.9-35.2c11.1-8.3 24.6-12.8 38.4-12.8H328c13.3 0 24 10.7 24 24s-10.7 24-24 24h-88c-8.8 0-16 7.2-16 16s7.2 16 16 16h180.2c9.7 0 19.1-3.3 26.7-9.3l61.6-49.2c7.7-6.1 20-7.6 28.4 0 10.1 9.1 9.3 24.5-.9 32.6l-100.8 80.7c-7.6 6.1-17 9.3-26.7 9.3H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h400.5c17 0 33.4-5.8 46.6-16.4L556 415c12.2-9.8 19.5-24.4 20-40s-6-30.8-17.7-41.4z" class=""></path></svg>
							</span>
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cText">Tarifario</span>
						</a>
						<a href="ajustes" class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn">
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cIcon">
								<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 512 512"><path d="M495.9 166.6C499.2 175.2 496.4 184.9 489.6 191.2L446.3 230.6C447.4 238.9 448 247.4 448 256C448 264.6 447.4 273.1 446.3 281.4L489.6 320.8C496.4 327.1 499.2 336.8 495.9 345.4C491.5 357.3 486.2 368.8 480.2 379.7L475.5 387.8C468.9 398.8 461.5 409.2 453.4 419.1C447.4 426.2 437.7 428.7 428.9 425.9L373.2 408.1C359.8 418.4 344.1 427 329.2 433.6L316.7 490.7C314.7 499.7 307.7 506.1 298.5 508.5C284.7 510.8 270.5 512 255.1 512C241.5 512 227.3 510.8 213.5 508.5C204.3 506.1 197.3 499.7 195.3 490.7L182.8 433.6C167 427 152.2 418.4 138.8 408.1L83.14 425.9C74.3 428.7 64.55 426.2 58.63 419.1C50.52 409.2 43.12 398.8 36.52 387.8L31.84 379.7C25.77 368.8 20.49 357.3 16.06 345.4C12.82 336.8 15.55 327.1 22.41 320.8L65.67 281.4C64.57 273.1 64 264.6 64 256C64 247.4 64.57 238.9 65.67 230.6L22.41 191.2C15.55 184.9 12.82 175.3 16.06 166.6C20.49 154.7 25.78 143.2 31.84 132.3L36.51 124.2C43.12 113.2 50.52 102.8 58.63 92.95C64.55 85.8 74.3 83.32 83.14 86.14L138.8 103.9C152.2 93.56 167 84.96 182.8 78.43L195.3 21.33C197.3 12.25 204.3 5.04 213.5 3.51C227.3 1.201 241.5 0 256 0C270.5 0 284.7 1.201 298.5 3.51C307.7 5.04 314.7 12.25 316.7 21.33L329.2 78.43C344.1 84.96 359.8 93.56 373.2 103.9L428.9 86.14C437.7 83.32 447.4 85.8 453.4 92.95C461.5 102.8 468.9 113.2 475.5 124.2L480.2 132.3C486.2 143.2 491.5 154.7 495.9 166.6V166.6zM256 336C300.2 336 336 300.2 336 255.1C336 211.8 300.2 175.1 256 175.1C211.8 175.1 176 211.8 176 255.1C176 300.2 211.8 336 256 336z"></path></svg>
							</span>
							<span class="cDash-adm--containRight--cContain__cBody__cGroupBtnResume__btn__cText">Ajustes</span>
						</a>
					</div>
					<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics">
						<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic grp-large">
							<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic__cGrap">
								<canvas id="firstGraphics" width="400" height="200"></canvas>
							</div>
						</div>
						<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic grp-small">
							<div class="cDash-adm--containRight--cContain__cBody__cardBody-graphics__cGraphic__cGrap">
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