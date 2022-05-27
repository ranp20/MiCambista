<?php 
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
require_once '../php/class/settings.php';
$call_config = new Settings_all();
$g_setting = $call_config->get_config();
?>
<!DOCTYPE html>
<html lang="es" translate="no">
<head>
	<title>Mi Cambista | Políticas de Privacidad</title>
	<?php require_once 'includes/header_links.php' ?> 
</head>
<body>
	<?php require_once 'includes/api_whatsapp.php';?>
	<main class="cMain">
		<div class="cMain__cont">
			<?php require_once 'home_includes/home-headertop.php'; ?>
			<section class="cMain__cont__policy-privacy section-wrapper" id="fromHereFixedHeadTop">
				<div class="cMain__cont__policy-privacy__c">
					<div class="cMain__cont__policy-privacy__c__title">
						<h1>Políticas de privacidad</h1>
					</div>
					<p>La presente Política de Privacidad (en adelante la “Política”) tiene por finalidad informarle la manera como MI CAMBISTA, S.A.C. (en adelante “MI CAMBISTA”), con domicilio en Jr Andahuaylas 271, Lima, Perú, y R.U.C. Nro. 20604340994, trata su información personal a través del Portal “www.cambistainka.com” (en adelante el “Portal Web”). La Política describe toda la tipología de información personal que se recaba de sus Usuarios, y todos los tratamientos que se realizan con dicha información. El Usuario declara haber leído y aceptado de manera previa y expresa la Política sujetándose a sus disposiciones.</p>
					<div class="cMain__cont__policy-privacy__c__cPprivacy">
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">1. ¿Qué información recolectamos?</h3>
							<p>Para navegar en el Portal Web, un Usuario no requiere facilitar información personal. Sin embargo, para hacer uso del servicio deberá crear una cuenta de usuario ingresando un correo electrónico y una contraseña segura en el formulario de registro de usuario implementado a tal efecto. Asimismo, el usuario puede operar con un perfil de persona natural o persona jurídica para lo cual se solicita datos personales que permiten identificarlo, contactarlo y localizarlo, la información solicitada es la siguiente:</p>
							<div class="cMain__cont__policy-privacy__c__cPprivacy__item__cItems">
								<ol>
									<li>Persona natural</li>
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
									<li>Persona jurídica</li>
									<ul>
										<li>Número de RUC.</li>
										<li>Razón social.</li>
										<li>Teléfono celular.</li>
										<li>DNI y nombre del representante legal.</li>
										<li>Ocupación del representante legal.</li>
									</ul>
									<li>Cuentas bancarias propias y de terceros</li>
									<ul>
										<li>Entidad financiera.</li>
										<li>Tipo de cuenta.</li>
										<li>Número de cuenta.</li>
										<li>Moneda.</li>
										<li>Adicionalmente, para cuentas bancarias de terceros se solicita la información del titular de la cuenta: Tipo de documento de identidad, número de documento y nombre completo.</li>
									</ul>
									<li>Asimismo, Mi Cambista requiere almacenar información relativa al comportamiento del usuario dentro del portal, entre la que se incluye:</li>
									<ul>
										<li>La URL de la que proviene el usuario (incluyendo las externas al portal Web).</li>
										<li>URLs más visitadas por el usuario (incluyendo las externas al portal Web).</li>
										<li>Direcciones IP.</li>
										<li>Navegador que utiliza el usuario.</li>
										<li>Todas las actividades realizadas dentro del Portal.</li>
										<li>Información sobre la operativa de portal, tráfico, promociones, campañas de venta, esdísticas de navegación, entre otros.</li>
										<li>Finalmente, MI CAMBISTA podrá requerir al Usuario el llenado de cuestionarios en línea con la finalidad de evaluar y determinar su perfil. Los Usuarios declaran que la información ingresada en dichos cuestionarios es verdadera, y otorgan a MI CAMBISTA la facultad de hacer tratamiento de toda la información ingresada a través de dichos cuestionarios.</li>
									</ul>
								</ol>
							</div>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">2. Sobre la veracidad de la información que recolectamos.</h3>
							<p>El Usuario, al registrarse y utilizar el Portal, declara que toda la información proporcionada es verdadera, completa y exacta. Cada Usuario es responsable por la veracidad, exactitud, vigencia y autenticidad de la información suministrada, y se compromete a mantenerla debidamente actualizada.</p>
							<p>Sin perjuicio de lo anterior, el Usuario autoriza a MI CAMBISTA a verificar la veracidad de los datos personales facilitados por el Usuario a través de información obtenida de fuentes de acceso público o entidades especializadas en la provisión de dicha información.</p>
							<p>MI CAMBISTA no se hace responsable de la veracidad de la información que no sea de elaboración propia, por lo que tampoco asume responsabilidad alguna por posibles daños o perjuicios que pudieran originarse por el uso de dicha información.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">3. ¿Cómo conservamos su información personal?.</h3>
							<p>De acuerdo a lo establecido en la Ley N° 29733, Ley de Protección de Datos Personales, y el Decreto Supremo N° 003-2013-JUS, por el que se aprueba el Reglamento de la Ley de Protección de Datos Personales (la “Ley”), MI CAMBISTA informa a los Usuarios del Portal que todos los datos de carácter personal que nos faciliten serán incorporados a un banco de datos, debidamente inscrito en la Dirección de Registro Nacional de Protección de Datos Personales, titularidad de MI CAMBISTA.</p>
							<p>A través de la presente Política de Privacidad el Usuario da su consentimiento expreso para la inclusión de sus datos personales en el mencionado banco de datos.</p>
							<p>Asimismo, MI CAMBISTA informa a los Usuarios que su información personal puede estar incluida en bancos de datos que se encuentran alojados en el extranjero en virtud de contratos de servicios de almacenamiento de información que MI CAMBISTA tiene suscritos con terceros proveedores de dichos servicios. El Usuario, al registrarse en la presente plataforma manifiesta que está informado sobre la ubicación de dichos bancos de datos y autoriza el flujo transfronterizo de su información personal de ser el caso.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">4. ¿Para qué utilizamos su información personal?.</h3>
							<p>Los datos personales de los Usuarios del Portal son tratados con las siguientes finalidades:</p>
							<div class="cMain__cont__policy-privacy__c__cPprivacy__item__cItems">
								<ul>
									<li>Atender y procesar solicitudes de registro de Usuarios en el Portal.</li>
									<li>Gestionar y administrar las cuentas personales de los Usuarios, así como supervisar el comportamiento y la actividad del Usuario dentro del Portal.</li>
									<li>Contactar al Usuario interesado en utilizar algún servicio ofrecido por el Portal, así como absolver sus consultas.</li>
									<li>Informar al Usuario sobre cambios administrativos o de funcionalidad tanto del Portal como de los medios de pago.</li>
									<li>Realizar estudios internos sobre los intereses, comportamientos y hábitos de conducta de los Usuarios a fin poder ofrecerles un mejor servicio de acuerdo a sus necesidades, con información que pueda ser de su interés.</li>
									<li>Brindar un servicio al cliente más efectivo valiéndonos para ello del apoyo de proveedores de servicios tales como agencias de call center (terceros), empresas de marketing digital para la gestión de campañas comerciales y empresas de mensajería de voz personalizada e interactiva, mensajería vía mensajes de texto (SMS) y mensajería vía correo electrónico.</li>
									<li>Compartir los datos personales de los Usuarios con terceros tales como empresas que contribuyan a mejorar o facilitar la operatividad del Portal, servicios de transporte, medios de pago, compañías de seguros, gestores, empresas con negocios digitales de Internet tales como eCommerce y cualquier otra empresa que preste servicios o tenga acuerdos comerciales con MI CAMBISTA.</li>
								</ul>
							</div>
							<p>Adicionalmente, los datos del Usuario serán utilizados con la finalidad de enviarle noticias, promociones, publicidad y novedades del Portal Web a través de comunicaciones periódicas que serán remitidas a la dirección de correo electrónico que el Usuario facilitó al momento de realizar el registro. Dichas comunicaciones serán consideradas solicitadas y no califican como “spam” bajo la normativa vigente.</p>
							<p>Del mismo modo, los datos del Usuario serán utilizados para el envío de comunicaciones comerciales de los establecimientos o comercios electrónicos afiliados a MI CAMBISTA.</p>
							<p>MI CAMBISTA informa al Usuario que una vez autorizado el envío de las mencionadas comunicaciones, tendrá la facultad de revocar el consentimiento prestado en cada una de las comunicaciones que reciba de MI CAMBISTA a través de un hipervínculo que se incorpora en todas las comunicaciones, o enviando una solicitud a la siguiente dirección de correo electrónico: info@incaex.com.</p>
							<p>Los datos personales del Usuario también podrán ser compartidos con aquellas empresas vinculadas a MI CAMBISTA a fin de que reciba información sobre productos o servicios que puedan ser de su interés.</p>
							<p>El Usuario del Portal Web manifiesta expresamente que ha sido informado de todas las finalidades antes mencionadas y autoriza el tratamiento de sus datos personales con dichas finalidades.</p>
							<p>MI CAMBISTA le recuerda al Usuario que las finalidades de tratamiento de datos necesarias para la ejecución de la relación contractual que vincula al Usuario registrado y a MI CAMBISTA no requieren del consentimiento del mismo.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">5. ¿Cómo resguardamos su información personal?.</h3>
							<p>MI CAMBISTA adopta las medidas técnicas y organizativas necesarias para garantizar la protección de los datos de carácter personal y evitar su alteración, pérdida, tratamiento y/o acceso no autorizado, habida cuenta del estado de la técnica, la naturaleza de los datos almacenados y los riesgos a que están expuestos, todo ello, conforme a lo establecido por la Ley N° 29733, Ley de Protección de Datos Personales, su Reglamento y la Directiva de Seguridad.</p>
							<p>En este sentido, MI CAMBISTA usará los estándares de la industria en materia de protección de la confidencialidad de la información personal de los Usuarios del Portal.</p>
							<p>MI CAMBISTA emplea diversas técnicas de seguridad para proteger tales datos de accesos no autorizados. Sin perjuicio de ello, MI CAMBISTA no se hace responsable por interceptaciones ilegales o violación de sus sistemas o bases de datos por parte de personas no autorizadas, así como la indebida utilización de la información obtenida por esos medios, o de cualquier intromisión ilegítima que escape al control de MI CAMBISTA y que no le sea imputable.</p>
							<p>MI CAMBISTA tampoco se hace responsable de posibles daños o perjuicios que se pudieran derivar de interferencias, omisiones, interrupciones, virus informáticos, averías telefónicas o desconexiones en el funcionamiento operativo de este sistema electrónico, motivadas por causas ajenas a MI CAMBISTA; de retrasos o bloqueos en el uso de la plataforma informática causados por deficiencias o sobrecargas en el Centro de Procesos de Datos, en el sistema de Internet o en otros sistemas electrónicos.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">6. ¿Con quiénes compartimos información?.</h3>
							<p>MI CAMBISTA podrá compartir información con las siguientes sociedades:</p>
							<div class="cMain__cont__policy-privacy__c__cPprivacy__item__cItems">
								<ul>
									<li>Empresa de Call Center.</li>
								</ul>
							</div>
							<p>Asimismo, queda terminantemente prohibido brindar información personal sobre otro Usuario del Portal sin que medie la expresa autorización por parte del Usuario en cuestión y la de MI CAMBISTA.</p>
							<p>MI CAMBISTA se compromete a no divulgar o compartir con terceros la información personal recabada de los Usuarios sin que se haya prestado el debido consentimiento para ello, con excepción de los siguientes casos:</p>
							<div class="cMain__cont__policy-privacy__c__cPprivacy__item__cItems">
								<ul>
									<li>En aquellos casos en que el uso de los datos personales sea necesario para la prestación de los servicios brindados a través del Portal Web.</li>
									<li>Solicitud de información de autoridades públicas en ejercicio de sus funciones y el ámbito de sus competencias.</li>
									<li>Solicitud de información en virtud de órdenes judiciales.</li>
									<li>Solicitud de información en virtud de disposiciones legales.</li>
								</ul>
							</div>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">7. Cookies.</h3>
							<p>El Portal utiliza cookies. Una “Cookie” es un pequeño archivo de texto que un sitio web almacena en el navegador del Usuario. Las cookies facilitan el uso y la navegación por una página web y son importantes para el buen funcionamiento de Internet, aportando innumerables ventajas en la prestación de servicios interactivos.</p>
							<p>A través de las cookies, el Portal podrá utilizar la información de su visita para realizar evaluaciones y cálculos estadísticos sobre datos anónimos, así como para garantizar la continuidad del servicio o para realizar mejoras en el Portal.</p>
							<p>El Portal también utilizará la información obtenida a través de las cookies para analizar los hábitos de navegación del Usuario, de forma que pueda realizar un rastreo de visitas a páginas web en el historial del Usuario; y, las búsquedas realizadas por éste, a fin de mejorar sus iniciativas comerciales y promocionales, mostrando publicidad que pueda ser de su interés, y personalizando los contenidos del Portal Web.</p>
							<p>Las cookies pueden borrarse del disco duro si el Usuario así lo desea. La mayoría de los navegadores aceptan las cookies de forma automática, pero le permiten al Usuario cambiar la configuración de su navegador para que rechace la instalación de cookies, sin que ello perjudique su acceso y navegación por el Portal.</p>
							<p>En el supuesto de que en el presente Portal se dispusieran enlaces o hipervínculos hacia otros lugares de Internet propiedad de terceros que utilicen cookies, MI CAMBISTA no se hace responsable ni controla el uso de cookies por parte de dichos terceros.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">8. Derechos de acceso, rectificación, cancelación y oposición de datos personales</h3>
							<p>MI CAMBISTA pone en conocimiento del Usuario que podrá ejercer cualquiera de los derechos conferidos por la Ley mediante el llenado y envío de formularios de solicitud, a los que podrá acceder a través de un mecanismo establecido en el Portal.</p>
							<p>Del mismo modo, el Usuario puede oponerse al uso o tratamiento de sus datos personales y puede solicitar ser informado sobre todas las finalidades con que se tratan los datos personales.</p>
							<p>Sin perjuicio de lo anterior, MI CAMBISTA podrá conservar determinada información personal del Usuario que solicita la baja, a fin de que sirva de prueba ante una eventual reclamación contra MI CAMBISTA por responsabilidades derivadas del tratamiento de dicha información. La duración de dicha conservación no podrá ser superior al plazo de prescripción legal de dichas responsabilidades.</p>
						</div>
						<div class="cMain__cont__policy-privacy__c__cPprivacy__item">
							<h3 class="cMain__cont__policy-privacy__c__cPprivacy__item__title">9. Modificaciones de las Políticas de Privacidad</h3>
							<p>MI CAMBISTA se reserva expresamente el derecho a modificar, actualizar o completar en cualquier momento la presente Política de Privacidad.</p>
							<p>Cualquier modificación, actualización o ampliación producida en la presente Política será inmediatamente publicada en el Portal, por lo que se recomienda al Usuario revisarla periódicamente, especialmente antes de proporcionar información personal.</p>
						</div>
					</div>
				</div>
			</section>
			<?php /*require_once 'home_includes/home-contact.php';*/ ?>
		</div>
	</main>
	<?php require_once 'home_includes/home-footer.php'; ?>
	<script type="text/javascript" src="<?= $url ?>views/js/main.js"></script>
</body>
</html>