<?php 
	//COMPRIMIR ARCHIVOS DE TEXTO...
  (substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
  session_start();
  if(isset($_SESSION['cli_micambista'])){
  	header("Location: control-panel");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once 'views/includes/header_links.php' ?> 
	<title>Mi Cambista | centro de cambio en línea con las mejores tasas</title>
</head>
<body>
	<?php require_once 'views/includes/api_whatsapp.php';?>
	<main class="cMain">
		<div class="cMain__cont">
			<?php require_once 'views/home_includes/home-headertop.php'; ?>
			<section class="cMain__cont--heroI" id="heroimage-info">
				<div class="cMain__cont--heroI--c box">
					<div class="cMain__cont--heroI--c--cheader">
						<h1 class="cMain__cont--heroI--c--cheader--title">¡Gana cambiando con MiCambista!</h1>
						<p class="cMain__cont--heroI--c--cheader--desc">Dale a tu dinero el valor que merece</p>
					</div>
					<section class="cMain__cont--heroI--c--formuser">
						<div class="cMain__cont--heroI--c--formuser--cForm">
							<div class="cMain__cont--heroI--c--formuser--cForm--cT">
								<div class="cMain__cont--heroI--c--formuser--cForm--cT--cl">
									<p>Compramos</p>
									<p>s/. <span id="refer_solesdiviseindex">3.913</span></p>
								</div>
								<div class="cMain__cont--heroI--c--formuser--cForm--cT--cr">
									<p>Vendemos</p>
									<p>s/. <span id="refer_dollardiviseindex">3.922</span></p>
								</div>
							</div>
							<form class="cMain__cont--heroI--c--formuser--cForm--cF">
								<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc">
									<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls" id="cont-DiviseOneindex">
										<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--ChangeVal" id="txtDivise-oneindex">Soles</div>
										<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues">
											<label for="inputval-oneindex" class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues--label">Envías</label>
											<input type="text" name="inputval-oneindex" id="inputval-oneindex" class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues--input"  min="0" maxlength="21">
											<span id="spanprefix-oneindex">S/.</span>
										</div>
									</div>
									<button type="button" class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--btnChangeCurrency" id="btn-Changecurr">
										<img src="./views/assets/img/svg/circleArrows.svg" alt="">
									</button>
									<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls">
										<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--ChangeVal" id="txtDivise-twoindex">Dólares</div>
										<div class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues">
											<label for="inputval-twoindex" class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues--label">Recibes</label>
											<input type="text" name="inputval-twoindex" id="inputval-twoindex" class="cMain__cont--heroI--c--formuser--cForm--cF--Cc--controls--cValues--input"  min="0" maxlength="21">
											<span id="spanprefix-twoindex">$</span>
										</div>
									</div>
								</div>
								<p class="cMain__cont--heroI--c--formuser--cForm--cF--Tmaxvalue">
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
									<span>Para montos mayores a $ 5, 000 solicita un tipo de cambio preferencial en nuestro chat de whatsapp.</span>
								</p>
								<a href="signin" class="cMain__cont--heroI--c--formuser--cForm--cF--btnSendconvert" id="btn-initConvertPlatform">Comenzar cambio</a>
							</form>
						</div>
						<div class="cMain__cont--heroI--c--formuser--cTransBank">
							<h3 class="cMain__cont--heroI--c--formuser--cTransBank--T">Transferencias inmediatas (5-25min):</h3>
							<div class="cMain__cont--heroI--c--formuser--cTransBank--cBanks">
								<img src="./views/assets/img/svg/interbank.svg" alt="">
								<img src="./views/assets/img/svg/bcp.svg" alt="">
							</div>
						</div>
						<div class="cMain__cont--heroI--c--formuser--cimg">
							<img src="./views/assets/img/svg/welcome.svg" alt="">
						</div>
					</section>
				</div>
			</section>
			<section class="cMain__cont--manualU box">
				<div class="cMain__cont--manualU--c">
					<ul class="cMain__cont--manualU--c--m">
						<li class="cMain__cont--manualU--c--m--item">
							<div class="cMain__cont--manualU--c--m--item--cIcon">
								<img src="./views/assets/img/svg/badge.svg" alt="">
							</div>
							<div class="cMain__cont--manualU--c--m--item--cT">
								<p class="cMain__cont--manualU--c--m--item--cT--txt">
									<span class="cMain__cont--manualU--c--m--item--cT--txt--t">Registrados y autorizados por la</span>
								</p>
								<h3 class="cMain__cont--manualU--c--m--item--cT--deskShow"><b>Superintendencia de Banca, Seguros y AFP </b></h3>
							</div>
						</li>
						<li class="cMain__cont--manualU--c--m--item">
							<div class="cMain__cont--manualU--c--m--item--cIconspecial">
								<img src="./views/assets/img/svg/laptop.svg" alt="">
							</div>
							<div class="cMain__cont--manualU--c--m--item--cT">
								<h3 class="cMain__cont--manualU--c--m--item--cT--deskShow"><b>20 Mil</b></h3>
								<p class="cMain__cont--manualU--c--m--item--cT--txt">
									<span class="cMain__cont--manualU--c--m--item--cT--txt--t">Operaciones Exitosas</span>
								</p>
							</div>
						</li>
						<li class="cMain__cont--manualU--c--m--item">
							<div class="cMain__cont--manualU--c--m--item--cIcon">
								<img src="./views/assets/img/svg/soles.svg" alt="">
							</div>
							<div class="cMain__cont--manualU--c--m--item--cT">
								<h3 class="cMain__cont--manualU--c--m--item--cT--deskShow"><b>132 Millones</b></h3>
								<p class="cMain__cont--manualU--c--m--item--cT--txt">
									<span class="cMain__cont--manualU--c--m--item--cT--txt--t">Soles transferidos</span>
								</p>
							</div>
						</li>
						<li class="cMain__cont--manualU--c--m--item">
							<div class="cMain__cont--manualU--c--m--item--cIcon">
								<img src="./views/assets/img/svg/users.svg" alt="">
							</div>
							<div class="cMain__cont--manualU--c--m--item--cT">
								<h3 class="cMain__cont--manualU--c--m--item--cT--deskShow"><b> 8 Mil</b></h3>
								<p class="cMain__cont--manualU--c--m--item--cT--txt">
									<span class="cMain__cont--manualU--c--m--item--cT--txt--t">Usuarios activos</span>
								</p>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<section class="cMain__cont--stepsU box">
				<h2 class="cMain__cont--stepsU--title">¿Cómo funciona?</h2>
				<h3 class="cMain__cont--stepsU--title-two">Mi Cambista es una Fintech que te permitirá hacer los cambios desde donde estés, solo debes seguir estos sencillos pasos:</h3>
				<ul class="cMain__cont--stepsU--m">
					<li class="cMain__cont--stepsU--m--item">
						<img src="./views/assets/img/svg/step-1.svg" alt="" class="cMain__cont--stepsU--m--item--img">
						<div class="cMain__cont--stepsU--m--item--c">
							<h4 class="cMain__cont--stepsU--m--item--c--title">Paso 1</h4>
							<p class="cMain__cont--stepsU--m--item--c--desc">
								<b class="cMain__cont--stepsU--m--item--c--desc--bold">Regístrate y cotiza tu cambio</b>
								<span class="cMain__cont--stepsU--m--item--c--desc--light">Coloca el monto a enviar o recibir y obtén la mejor tasa.</span>
							</p>
						</div>
					</li>
					<li class="cMain__cont--stepsU--m--item">
						<img src="./views/assets/img/svg/step-2.svg" alt="" class="cMain__cont--stepsU--m--item--img">
						<div class="cMain__cont--stepsU--m--item--c">
							<h4 class="cMain__cont--stepsU--m--item--c--title">Paso 2</h4>
							<p class="cMain__cont--stepsU--m--item--c--desc">
								<b class="cMain__cont--stepsU--m--item--c--desc--bold">Transfiere los fondos a Mi Cambista.</b>
								<span class="cMain__cont--stepsU--m--item--c--desc--light">Realiza la transferencia desde tu banco a la cuenta indicada.</span>
							</p>
						</div>
					</li>
					<li class="cMain__cont--stepsU--m--item">
						<img src="./views/assets/img/svg/step-3.svg" alt="" class="cMain__cont--stepsU--m--item--img">
						<div class="cMain__cont--stepsU--m--item--c">
							<h4 class="cMain__cont--stepsU--m--item--c--title">Paso 3</h4>
							<p class="cMain__cont--stepsU--m--item--c--desc">
								<b class="cMain__cont--stepsU--m--item--c--desc--bold">Recibe tu cambio</b>
								<span class="cMain__cont--stepsU--m--item--c--desc--light">Verifica el bono en tu cuenta y sigue ahorrando con Mi Cambista.</span>
							</p>
						</div>
					</li>
				</ul>
			</section>
			<section class="cMain__cont--affiliateU section-wrapper">
				<div class="cMain__cont--affiliateU--cT box">
					<h2 class="cMain__cont--affiliateU--cT--title">¡Recomienda y gana!</h2>
					<h3 class="cMain__cont--affiliateU--cT--title-two">Con el nuevo sistema de afiliados obtendras siempre los mejores y mayores beneficios. <br>Comienza a usarlo al toque.</h3>
				</div>
				<div class="cMain__cont--affiliateU--cCenter">
					<div class="cMain__cont--affiliateU--cCenter--cimginitial">
					<img src="./views/assets/img/svg/affiliates-1.svg" alt="">
					</div>
					<div class="cMain__cont--affiliateU--cCenter--csteps">
						<ul class="cMain__cont--affiliateU--cCenter--csteps--msteps">
							<li class="cMain__cont--affiliateU--cCenter--csteps--msteps--step">
								<div class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c">
									<h1 class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c--numbtitle">01</h1>
									<p class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c--desc"><b>Comparte</b> tu código de afiliado con tus amigos.</p>
								</div>
							</li>
							<li class="cMain__cont--affiliateU--cCenter--csteps--msteps--step">
								<div class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c">
									<h1 class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c--numbtitle">02</h1>
									<p class="cMain__cont--affiliateU--cCenter--csteps--msteps--step--c--desc">Al realizar su primera operación tus <b>amigos ganarán</b> una tasa preferencial.</p>
								</div>
							</li>
							<li class="cMain__cont--affiliateU--cCenter--csteps--msteps--finalstep">
								<div class="cMain__cont--affiliateU--cCenter--csteps--msteps--finalstep--c">
									<h1 class="cMain__cont--affiliateU--cCenter--csteps--msteps--finalstep--c--numbtitle">03</h1>
									<p class="cMain__cont--affiliateU--cCenter--csteps--msteps--finalstep--c--desc">Recibirás <b>1 KASH </b>por cada amigo	que realice su primera operación. </br><b>1 KASH = $1 USD</b></p>
								</div>
								<a href="signin" class="cMain__cont--affiliateU--cCenter--csteps--msteps--finalstep--btnLogin">Ingresar ahora</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="cMain__cont--affiliateU--cimgfinal">
					<img src="./views/assets/img/svg/affiliates-2.svg" alt="">
				</div>
			</section>
			<section class="cMain__cont--benefits box section-wrapper">
				<div class="cMain__cont--benefits--cList">
					<h2 class="cMain__cont--benefits--cList--title">Conoce nuestros beneficios</h2>
					<ul class="cMain__cont--benefits--cList--m">
						<li class="cMain__cont--benefits--cList--m--item">Obtendrás <b>las mejores tasas</b> del Perú.</li>
						<li class="cMain__cont--benefits--cList--m--item"><b>Ahorrarás</b> dinero en cada cambio.</li>
						<li class="cMain__cont--benefits--cList--m--item">Recibirás tu cambio en <b>pocos minutos</b>.</li>
						<li class="cMain__cont--benefits--cList--m--item">Ganarás <b>1 KASH </b>por cada recomendación.</li>
					</ul>
				</div>
				<div class="cMain__cont--benefits--cimg">
					<img src="./views/assets/img/svg/benefits.svg" alt="">
				</div>
			</section>
			<?php require_once 'views/home_includes/home-contact.php'; ?>
		</div>
	</main>
	<?php require_once 'views/home_includes/home-footer.php'; ?>
	<script type="text/javascript" src="<?= $url ?>views/js/main.js"></script>
</body>
</html>