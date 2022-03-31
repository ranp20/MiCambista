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
	<title>Mi Cambista | Panel de control</title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body>
	<div class="cControlP">
		<div class="msgAlertLogin" id="msgAlertLogin"></div>
		<div class="cControlP__cont">
			<section class="cControlP__cont--hTop">
				<div id="m-show-hpagepanel">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="cControlP__cont--hTop--c">
					<div class="cControlP__cont--hTop--c--cLogHorario">
						<div class="cControlP__cont--hTop--c--cLogHorario--cLogo">
							<img src="<?= $url ?>views/assets/img/svg/logo.svg" alt="">
						</div>
						<div class="cControlP__cont--hTop--c--cLogHorario--cHorario">
							<p>Lunes a Viernes: 9am 7:00pm </br> Sábadosy Feriados: 9am a 2:30pm</p>
						</div>
					</div>
					<div class="cControlP__cont--hTop--c--cWpsNameCli">
						<a href="#" class="cControlP__cont--hTop--c--cWpsNameCli--wpsMobile">
							<img src="<?= $url ?>views/assets/img/svg/whatsapp-green.svg" alt="">
						</a>
						<a href="#" class="cControlP__cont--hTop--c--cWpsNameCli--wpsWeb">
							<p>927 013 800</p>
							<div class="cControlP__cont--hTop--c--cWpsNameCli--wpsWeb--cIcon">
								<img src="<?= $url ?>views/assets/img/svg/whatsapp-green.svg" alt="">
							</div>
						</a>
						<div class="cControlP__cont--hTop--c--cWpsNameCli--ndataCli">
							<div class="cControlP__cont--hTop--c--cWpsNameCli--ndataCli--cIcon">
								<img src="<?= $url ?>views/assets/img/svg/user-male.svg" alt="">
							</div>
							<div class="cControlP__cont--hTop--c--cWpsNameCli--ndataCli--cNamecli">
								<p>
									<span>Hola,</br></span>
									<span><?= $name; ?></span>
								</p>
							</div>
							<button type="button" class="cControlP__cont--hTop--c--cWpsNameCli--ndataCli--cIconArrow" id="btnShowSideRight">
								<img src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
							</button>
						</div>
					</div>
				</div>
			</section>
			<section class="cControlP__cont--sdLeft">
				<div class="cControlP__cont--sdLeft--c">
					<div class="cControlP__cont--sdLeft--c--cIconMobile">
						<img src="<?= $url ?>views/assets/img/svg/logo.svg" alt="">
					</div>
					<ul class="cControlP__cont--sdLeft--c--m">
						<li class="cControlP__cont--sdLeft--c--m--item">
							<a href="#" class="cControlP__cont--sdLeft--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/dashboard-item-1.svg" alt="">
								<span>Mi actividad</span>
							</a>
						</li>
						<li class="cControlP__cont--sdLeft--c--m--item">
							<a href="#" class="cControlP__cont--sdLeft--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/dashboard-item-2.svg" alt="">
								<span>Cambio de divisas</span>
							</a>
						</li>
						<li class="cControlP__cont--sdLeft--c--m--item">
							<a href="#" class="cControlP__cont--sdLeft--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/dashboard-item-3.svg" alt="">
								<span>Mis cuentas</span>
							</a>
						</li>
						<li class="cControlP__cont--sdLeft--c--m--item">
							<a href="#" class="cControlP__cont--sdLeft--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/dashboard-item-4.svg" alt="">
								<span>Recomienda y gana</span>
							</a>
						</li>
					</ul>	
				</div>
			</section>
			<section class="cControlP__cont--sdRight">
				<div class="cControlP__cont--sdRight--c">
					<div class="cControlP__cont--sdRight--c--iconclose" id="btnCloseSdRight">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</div>
					<div class="cControlP__cont--sdRight--c--cNamecli">
						<div class="cControlP__cont--sdRight--c--cNamecli--cImg">
							<img src="<?= $url ?>views/assets/img/svg/user-male.svg" alt="">
						</div>
						<div class="cControlP__cont--sdRight--c--cNamecli--cnamcli">
							<p><?= $name; ?></p>
							<span>Usuario</span>
						</div>
					</div>
					<ul class="cControlP__cont--sdRight--c--m">
						<li class="cControlP__cont--sdRight--c--m--item">
							<a href="#" class="cControlP__cont--sdRight--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/profiles-1.svg" alt="">
								<span>Cambiar perfil</span>
							</a>
						</li>
						<li class="cControlP__cont--sdRight--c--m--item">
							<a href="logout" class="cControlP__cont--sdRight--c--m--link">
								<img src="<?= $url ?>views/assets/img/svg/profiles-2.svg" alt="">
								<span>Cerrar sesión</span>
							</a>
						</li>
					</ul>
				</div>
			</section>
			<section class="cControlP__cont--containDash" id="page-indexusercontrol">
				<div class="cControlP__cont--containDash--c" id="cont-initial-page">
					<div class="cControlP__cont--containDash--c__ctitle">
						<h2>¡Nos alegra que estés aquí!</h2>
						<h3>Selecciona el perfil que usarás hoy</h3>
					</div>
					<ul class="cControlP__cont--containDash--c__cBtnsOpts-m">
						<?php 
							if(!empty($dataEnterprise)){
								echo "
									<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
										<a href='welcome' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
											<img src='{$url}views/assets/img/svg/user-male.svg' alt=''>
										</a>
										<span>{$name}</span>
									</li>
								";
							}else{
								echo "
									<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
										<a href='welcome' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
											<img src='{$url}views/assets/img/svg/user-male.svg' alt=''>
										</a>
										<span>{$name}</span>
									</li>
									<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
										<button type='button' id='btn-addAccountEnterpriseShow' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
											<img src='{$url}views/assets/img/svg/add-profile.svg' alt=''>
										</button>
										<span>Agregar empresa</span>
									</li>
								";
							}
						?>
					</ul>
				</div>
			</section>
			<?php require_once 'includes/dashboard-formaddenterprise.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/add-enterprise.js"></script>
</body>
</html>