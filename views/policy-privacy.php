<?php 
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
require_once '../php/class/settings.php';
$call_config = new Settings_all();
$g_setting = $call_config->get_config();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Políticas de Privacidad</title>
	<?php require_once 'includes/header_links.php' ?> 
</head>
<body>
	<a href="https://api.whatsapp.com/send?phone=51951488317&text=Hola,%20quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20los%20productos." class="float" target="_blank" id="chat_wstp-icon"><i class="fa fa-whatsapp my-float"></i>
  </a>
	<main class="cMain">
		<div class="cMain__cont">
			<?php require_once 'home_includes/home-headertop.php'; ?>
			<section class="cMain__cont--policy-privacy section-wrapper" id="c-policy-privacy">
				<div class="cMain__cont--policy-privacy--c">
					<h1 class="cMain__cont--policy-privacy--c--title">Políticas de Privacidad</h1>
					<p>La presente Política de Privacidad (en adelante la “Política”) tiene por finalidad informarle la manera como MI CAMBISTA, S.A.C. (en adelante “MI CAMBISTA”), con domicilio en Jr Andahuaylas 271, Lima, Perú, y R.U.C. Nro. 20604340994, trata su información personal a través del Portal “www.cambistainka.com” (en adelante el “Portal Web”). La Política describe toda la tipología de información personal que se recaba de sus Usuarios, y todos los tratamientos que se realizan con dicha información. El Usuario declara haber leído y aceptado de manera previa y expresa la Política sujetándose a sus disposiciones.</p>
					<div class="cMain__cont--policy-privacy--c--cPprivacy">
						<h3 class="cMain__cont--policy-privacy--c--cPprivacy--title"><b>1. ¿Qué información recolectamos?</b></h3>
						<p>Para navegar en el Portal Web, un Usuario no requiere facilitar información personal. Sin embargo, para hacer uso del servicio deberá crear una cuenta de usuario ingresando un correo electrónico y una contraseña segura en el formulario de registro de usuario implementado a tal efecto. Asimismo, el usuario puede operar con un perfil de persona natural o persona jurídica para lo cual se solicita datos personales que permiten identificarlo, contactarlo y localizarlo, la información solicitada es la siguiente:</p>
						<div class="cMain__cont--policy-privacy--c--cPprivacy--cItems">
							<div class="cMain__cont--policy-privacy--c--cPprivacy--cItems--m">
								<h4>Persona natural</h4>
								<ul>
									<li>Nombres completos.</li>
									<li>Apellidos completos.</li>
									<li>Tipo y número de documento de identidad.</li>
									<li>Fecha de nacimiento.</li>
									<li>Correo electrónico.</li>
									<li>Teléfono celular.</li>
									<li>Teléfono fijo.</li>
									<li>Ocupación.</li>
									<li>Origen de los fondos.</li>
								</ul>
							</div>
							<div class="cMain__cont--policy-privacy--c--cPprivacy--cItems--m">
								<h4>Persona jurídica</h4>
								<ul>
									<li>Número de RUC.</li>
									<li>Razón social.</li>
									<li>Teléfono celular.</li>
									<li>DNI y nombre del representante legal.</li>
									<li>Ocupación del representante legal.</li>
								</ul>
							</div>
							<div class="cMain__cont--policy-privacy--c--cPprivacy--cItems--m">
								<h4>Cuentas bancarias propias y de terceros</h4>
								<ul>
									<li>Entidad financiera.</li>
									<li>Tipo de cuenta.</li>
									<li>Número de cuenta.</li>
									<li>Moneda.</li>
									<li>Adicionalmente, para cuentas bancarias de terceros se solicita la información del titular de la cuenta: Tipo de documento de identidad, número de documento y nombre completo.</li>
								</ul>
							</div>
							<div class="cMain__cont--policy-privacy--c--cPprivacy--cItems--m">
								<p>Asimismo, Mi Cambista requiere almacenar información relativa al comportamiento del usuario dentro del portal, entre la que se incluye:</p>
								<ul>
									<li>La URL de la que proviene el usuario (incluyendo las externas al portal Web).</li>
									<li>URLs más visitadas por el usuario (incluyendo las externas al portal Web).</li>
									<li>Direcciones IP.</li>
									<li>Navegador que utiliza el usuario.</li>
									<li>Todas las actividades realizadas dentro del Portal.</li>
									<li>Información sobre la operativa de portal, tráfico, promociones, campañas de venta, esdísticas de navegación, entre otros.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php require_once 'home_includes/home-contact.php'; ?>
		</div>
	</main>
	<?php require_once 'home_includes/home-footer.php'; ?>
	<script src="<?= $url ?>js/main.js"></script>
	<script src="<?= $url ?>js/actions_pages/convert-divise.js"></script>
</body>
</html>