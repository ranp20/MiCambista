<?php 
	require_once '../php/process_data-list.php';
?>
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
				<p>Lunes a Viernes: 9am a 7:00pm </br> Sábados y Feriados: 9am a 2:30pm</p>
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