<?php 
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  // CONFIGURACIÓN - LOCALHOST
  $url_headassets =  $actual_link . "/MiCambista/";
  // CONFIGURACIÓN - SERVIDOR
  /*
  $url_headassets =  $actual_link . "/";
  */
?>
<section class="cMain__cont--infTop" id="headerTop-info">
	<div class="box">
		<div class="cMain__cont--infTop--hTop">
			<div class="cMain__cont--infTop--hTop--citem">
			<div class="cMain__cont--infTop--hTop--citem--cm" id="main-m-htop">
				<span class="cMain__cont--infTop--hTop--citem--cm--Tm">Menú</span>
				<ul class="cMain__cont--infTop--hTop--citem--cm--m">
					<li class="cMain__cont--infTop--hTop--citem--cm--m--item">
						<a href="#" class="cMain__cont--infTop--hTop--citem--cm--m--link">¿Cómo funciona?</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--item">
						<a href="#" class="cMain__cont--infTop--hTop--citem--cm--m--link">Nosotros</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--item">
						<a href="#" class="cMain__cont--infTop--hTop--citem--cm--m--link">¡Gana con tus referidos!</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--item">
						<a href="#" class="cMain__cont--infTop--hTop--citem--cm--m--link">¿Por qué MiCambista?</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--item">
						<a href="#" class="cMain__cont--infTop--hTop--citem--cm--m--link">Beneficios</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--rcInfoitem">
						<span class="cMain__cont--infTop--hTop--citem--cm--m--rcInfoitem--Thours">Horario</span>
						<p class="cMain__cont--infTop--hTop--citem--cm--m--rcInfoitem--p">Lunes a Viernes 9 am - 7 pm</p>
						<p class="cMain__cont--infTop--hTop--citem--cm--m--rcInfoitem--p">Sábados y Feriados 9 am - 2.30 pm</p>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--btnSignin">
						<a href="signin" class="cMain__cont--infTop--hTop--citem--cm--m--btnSignin--link">Iniciar Sesión</a>
					</li>
					<li class="cMain__cont--infTop--hTop--citem--cm--m--btnSignup">
						<a href="signup" class="cMain__cont--infTop--hTop--citem--cm--m--btnSignup--link">Registrarse</a>
					</li>
				</ul>
			</div>
			<div class="cMain__cont--infTop--hTop--citem--cLogo">
				<div class="cMain__cont--infTop--hTop--citem--cLogo--logo">
					<a href="./">
						<img src="<?= $url_headassets; ?>views/assets/img/svg/logo.svg" alt="logo_MiCambista" width="100" height="100" decoding="async">
					</a>
				</div>
			</div>
		</div>
		<div id="m-show-hpage">
			<span></span>
			<span></span>
			<span></span>
		</div>
		</div>
	</div>	
</section>