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
	<title>Memopay | Políticas de Privacidad</title>
	<?php require_once 'includes/header_links.php' ?> 
</head>
<body>
	<?php require_once 'includes/api_whatsapp.php';?>
	<main class="cMain">
		<div class="cMain__cont">
			<?php require_once 'home_includes/home-headertop.php'; ?>
			<section class="cMain__cont__terms-and-conditions section-wrapper" id="fromHereFixedHeadTop">
				<div class="cMain__cont__terms-and-conditions__c">
					<div class="cMain__cont__terms-and-conditions__c__title">
						<h1>Términos y condiciones</h1>
					</div>
					<p>Los Términos y Condiciones aquí señalados representan un contrato (en adelante, el “Contrato”) entre el usuario (en adelante, “EL CLIENTE”) y MI CAMBISTA (en adelante, “→”). Los Términos y Condiciones detallan los servicios que presta CAMBIA FX y las condiciones que acepta EL CLIENTE al acceder a los mismos.</p>
					<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions">
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">1. LA EMPRESA</h5>
							<p>MI CAMBISTA es una empresa que tiene por finalidad realizar el servicio de cambio de divisas en el Perú a través de su portal web “www.memopay.com.pe” (en adelante el “Portal Web”). MI CAMBISTA se encuentra debidamente registrada con RUC. Nro. 20604340994, con domicilio legal en Jr. Andahuaylas 271 int 02 Lima-Lima-Lima, Perú.</p>
							<p>Asimismo, MI CAMBISTA se encuentra autorizada para operar como empresa de cambio de divisas y se encuentra registrada en la Superintendencia de Banca, Seguros y AFP (En adelante SBS) a través de su resolución SBS N° 04237-2019.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">2. OBJETO DEL CONTRATO</h5>
							<p>El objeto del presente contrato es que EL CLIENTE se informe de los términos y condiciones del servicio prestado por MI CAMBISTA, por ende, le recomendamos que lea este contrato de forma detallada antes de hacer uso del mismo. Al registrarse o hacer uso de nuestro servicio a través de nuestro PORTAL WEB usted estará aceptando los términos y condiciones descritos en el presente contrato.</p>
							<p>Tenga en cuenta que de no aceptar este contrato no podrá hacer uso del servicio brindado por MI CAMBISTA.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">3. TARIFARIO Y COMISIONES</h5>
							<p>MI CAMBISTA no cobra ninguna comisión por el uso del servicio mediante PORTAL WEB.</p>
							<p>Sin embargo, EL CLIENTE puede incurrir en cobros de ITF (Impuesto a las transacciones financieras) y comisiones efectuadas por las entidades financieras.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h3 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__title">REGISTROS</h3>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">4.1. REGISTRO DE USUARIO Y PERFILES</h5>
							<p>EL CLIENTE para hacer uso del servicio debe cumplir con los siguientes requisitos: (a) Ser mayor de edad (Tener cumplidos 18 años), (b) Contar con un documento de identidad vigente, para peruanos contar con DNI y para extranjeros Carnet Extranjería o Pasaporte, (c) Tener una cuenta de correo electrónico.</p>
							<p>EL CLIENTE podrá navegar por el Portal Web sin necesidad de registrarse en una cuenta, sin embargo, para hacer uso del servicio deberá crear una cuenta de usuario ingresando un correo electrónico y una contraseña segura en el formulario de registro de usuario implementado a tal efecto.</p>
							<p>EL CLIENTE podrá crear un perfil de persona natural y dos perfiles de persona jurídica. Cabe resaltar que para el caso de creación del perfil de persona natural EL CLIENTE declara que es de uso personal y no está actuando en nombre de una tercera persona. Asimismo, para el caso de creación del perfil de persona jurídica EL CLIENTE declara que es una empresa que representa y que los datos ingresados son verídicos y vigentes.</p>
							<p>EL CLIENTE es responsable de su propia contraseña, y deberá mantenerla bajo absoluta reserva y confidencialidad, sin revelarla o compartirla, en ningún caso, con terceros. Cada cliente es responsable de todas las acciones realizadas mediante el uso de su contraseña. MI CAMBISTA informa al cliente que toda acción realizada a través de la cuenta de usuario personal se presume realizada por EL CLIENTE titular de dicha cuenta.</p>
							<p>MI CAMBISTA podrá solicitar información adicional para el registro de usuario o perfiles, en caso lo considere necesario o sea una exigencia de las entidades supervisoras.</p>
							<h3 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">4.2. REGISTRO DE CUENTAS BANCARIAS</h3>
							<p>EL CLIENTE deberá registrar como mínimo una cuenta bancaria en soles y otra en dólares para realizar la operación.</p>
							<p>MI CAMBISTA opera con cuentas bancarias de las siguientes entidades financieras:</p>
							<ul>
								<li>BCP E INTERBANK: A nivel nacional (Todos los departamentos del Perú).</li>
								<li>Otras entidades financieras: Únicamente en la Provincia de Lima por medio del servicio de transferencias interbancarias utilizando el CCI (Código de cuenta Interbancario). Cabe resaltar que EL CLIENTE asumirá los costos por comisión interbancaria que cobran las entidades financieras.</li>
							</ul>
							<p>EL CLIENTE es responsable de registrar la información de las cuentas bancarias de forma correcta, la información consignada para cuentas bancarias propias es: Nombre de la entidad financiera, tipo de cuenta, número de cuenta y moneda. Adicionalmente, para cuentas bancarias de tercero se solicita la información del titular de la cuenta.</p>
							<h3 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">4.3. CUENTAS DE USUARIO DUPLICADAS</h3>
							<p>Cada cliente puede tener solo una cuenta de usuario, en caso se detecte a un cliente con más de una cuenta de usuario, MI CAMBISTA se reserva el derecho a desactivar o fusionar las otras cuentas, sin previo aviso al titular de la cuenta.</p>
							<p>MI CAMBISTA podrá suspender la cuenta de usuario cuando considere que esta ya no es segura, o si se recibe alguna queja o denuncia respecto a la cuenta de usuario.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h3 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__title">OPERACIÓN DE CAMBIO DE MONEDA</h3>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.1. Montos máximos y mínimos</h5>
							<p>El monto máximo establecido para realizar operaciones es de 50,000.00 dólares. En caso que el cliente desee un monto superior debe comunicarse previamente con nosotros para poder darle el visto bueno para realizar la operación.</p>
							<p>El monto mínimo para realizar la operación es de 10.00 dólares.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.2. Tipo Cambio Acordado</h5>
							<p>El tipo de cambio acordado entre EL CLIENTE y MI CAMBISTA tiene una vigencia máxima de 15 minutos a partir del registro de su operación en PORTAL WEB, en estos 15 minutos EL CLIENTE deberá realizar la transferencia del monto acordado a la cuenta bancaria indicada de MI CAMBISTA y seguidamente deberá adjuntar o enviar el váucher de la transferencia al correo electrónico indicado. En caso, EL CLIENTE no realice la transferencia pasada este tiempo perderá el tipo de cambio acordado y la operación será anulada de forma automática.</p>
							<p>En caso el cliente realice la transferencia pasado el tiempo de vigencia máxima, se propondrá un nuevo tipo de cambio en base a la fecha y hora de la recepción del monto que figura en los movimientos de la cuenta bancaria de MI CAMBISTA.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.3. Registro de Operación</h5>
							<p>Para realizar la operación previamente EL CLIENTE debe iniciar sesión con su cuenta de usuario en nuestro PORTAL WEB y seleccionar el perfil con el cual quiere operar. Seguidamente El CLIENTE ingresara el monto a enviar y recibir. Adicionalmente, EL CLIENTE está obligado a informar el origen de los fondos según la normativa vigente del sistema lavado de activos y financiamiento de terrorismo.</p>
							<p>A continuación, EL CLIENTE debe seleccionar o registrar la cuenta bancaria origen desde donde se envía el fondo y la cuenta bancaria destino donde recibirá el monto de cambio. Para registrar una nueva cuenta bancarias ver (numeral 4.2).</p>
							<p>Es importante recalcar que MI CAMBISTA opera a nivel nacional únicamente con cuentas bancarias del BCP E INTERBANK. Adicionalmente, para la provincia de Lima opera con cuentas bancarias de otras entidades financieras, siempre que hayan sido aperturadas en dicha provincia y por medio de transferencias interbancarias utilizando el Código de Cuenta Interbancario (CCI).</p>
							<p>Una vez que haya completado los pasos, la operación estará vigente por un plazo de 15 minutos, tiempo en el cual EL CLIENTE deberá realizar la transferencia de los fondos.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.4. Recepción de fondos</h5>
							<p>Una vez que EL CLIENTE haya registrado su operación, deberá proceder a realizar la transferencia del monto a la cuenta bancaria de MI CAMBISTA, en un tiempo máximo de 15 minutos a partir del registro de su operación para poder mantener el tipo de cambio acordado. Seguidamente, deberá adjuntar o enviar el váucher de la transferencia realizada al correo “transferencias@memopay.com”.</p>
							<p>MI CAMBISTA no acepta depósitos en efectivo.</p>
							<p>MI CAMBISTA acepta transferencias bancarias a nivel nacional desde cualquier cuenta bancaria del BCP E INTERBANK.</p>
							<p>MI CAMBISTA acepta transferencias interbancarias inmediatas de otras entidades financieras solo para cuentas bancarias aperturadas en la provincia de Lima. En caso que EL CLIENTE realice una transferencia interbancaria desde una cuenta aperturada en otra localidad, EL CLIENTE deberá asumir el costo de la transferencia inmediata cobrada por su entidad financiera y ejecutar la transferencia dentro de los horarios establecidos para la operativa interbancaria; el cual establece que el tiempo para realizar este tipo de operaciones es de Lunes a Viernes de 8:30 am y 3:45 pm de días hábiles.</p>
							<p>En caso que EL CLIENTE realice una transferencia interbancaria regular, deberá asumir el tiempo que demore la transferencia en figurar en la cuenta de MI CAMBISTA.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.5. Emisión de fondos</h5>
							<p>Una vez se verifique la recepción del fondo en la cuenta de MI CAMBISTA y se contraste con el Váucher enviado por el cliente, se procederá a realizar la emisión de fondo acordado a la cuenta destino del cliente.</p>
							<p>MI CAMBISTA tiene cuentas bancarias en el BCP E INTERBANK. Las transferencias hacia otros bancos serán consideradas como transferencias interbancarias.</p>
							<p>El tiempo para las transferencias a cuentas bancarias del BCP E INTERBANK E INTERBANK será un máximo de 15 minutos a partir de la recepción del fondo en la cuenta de MI CAMBISTA, siempre en cuando no se hayan establecido tiempos diferentes entre las partes. Cabe resaltar que MI CAMBISTA no se hace responsable de los tiempos que toman las entidades financieras para que el fondo esté disponible en la cuenta bancaria del titular.</p>
							<p>El tiempo para las transferencias interbancarias diferidas a otras entidades financieras será un máximo de 24 horas considerando solo días hábiles, el tiempo de transferencia depende del banco emisor y las horas en que procesan las operaciones mediante la cámara de compensación electrónica.</p>
							<p>Asimismo, es importante mencionar que los tiempos establecidos están sujetos a variaciones causadas por la disponibilidad de las plataformas bancarias utilizadas y verificaciones adicionales por la magnitud del monto de la operación.</p>
							<p>En caso que MI CAMBISTA transfiera un monto distinto al acordado, se debe definir inmediatamente si el saldo es a favor del cliente o para MI CAMBISTA. Tanto EL CLIENTE como MI CAMBISTA se comprometen a transferir la cantidad necesaria para restablecer lo acordado. En caso el usuario no transfiera a MI CAMBISTA, este saldo será considerado una deuda. MI CAMBISTA recurrirá a reportar el incidente a centrales de riesgo crediticio y reportar a Infocorp.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.6. Anulación de la operación</h5>
							<p>MI CAMBISTA podrá realizar la anulación automática o manual de la operación en los siguientes casos:</p>
							<p>EL CLIENTE no realice la transferencia del efectivo en el tiempo acordado.</p>
							<p>EL CLIENTE realice la transferencia fuera del tiempo acordado, en cuyo caso el cliente tendrá dos opciones:</p>
							<ul class="anylst-onlypd">
								<li>a) Aceptar el nuevo tipo de cambio en base a la fecha y hora del abono que figura en los movimientos de la cuenta bancaria de MI CAMBISTA.</li>
								<li>b) Anular la operación, MI CAMBISTA realizará la devolución del monto abonado en la cuenta del cliente, previamente el cliente deberá asumir todos los costos o gastos en los que incurra MI CAMBISTA para la devolución.</li>
							</ul>
							<p>EL CLIENTE realice un depósito en efectivo en la cuenta de MI CAMBISTA, se procederá a realizar la devolución a la cuenta del cliente del monto depositado, previamente el cliente deberá asumir todos los costos o gastos en los que incurra MI CAMBISTA para la devolución.</p>
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">5.7. Historial de operaciones</h5>
							<p>El CLIENTE tiene la opción de consultar sus 10 últimas operaciones históricas ingresando al PORTAL WEB con su usuario y contraseña.</p>
							<p>En caso que EL CLIENTE desee consultar más de 10 operaciones, deberá solicitarlo enviando un correo electrónico a info@memopay.com.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h3 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">6. DEFINICIONES GENERALES</h3>
							<p>Compra: proceso mediante el cual EL CLIENTE transfiere dólares y MI CAMBISTA transfiere soles a EL CLIETNE.</p>
							<p>Venta: proceso mediante el cual EL CLIENE transfiere soles y MI CAMBISTA transfiere dólares a EL CLIENTE.</p>
							<p>Transferencias bancarias: Las transferencias bancarias son envíos de dinero realizados a la orden de un cliente desde su cuenta bancaria origen (ordenante) a otra destino (beneficiario) en una misma entidad financiera.</p>
							<p>Transferencias Interbancarias: Las transferencias interbancarias son envíos de dinero realizados a la orden de un cliente desde su cuenta bancaria origen a otra destino, donde la cuenta origen y destino están en diferentes entidades financieras.</p>
							<p>ITF: es un cobro que realizan los bancos a determinadas transacciones financieras incluidos los depósitos y retiros en cuentas de ahorros y corrientes (excepción de cuentas CTS y Sueldo), el cobro es de 0.005% (0.5 soles por cada S/ 10,000.00).</p>
							<p>Comisión InterPlaza: Es una comisión que se cobra cuando se realiza una transacción (deposito, retiro, transferencia) a una cuenta bancaria en una localidad distinta a donde se apertura dicha cuenta.</p>
							<p>Código de cuenta interbancaria (CCI): Permite identificar una cuenta bancaria en el sistema financiero peruano. Además, permite realizar transferencias entre diferentes bancos.</p>
							<p>Cuenta bancaria: Una cuenta bancaria es un contrato entre el cliente y el banco, donde el titular deposita una cantidad de dinero y la entidad adquiere el compromiso de custodiarlo.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">7. SINCERIDAD DE LA INFORMACIÓN</h5>
							<p>EL CLIENTE, al registrarse y utilizar el Portal Web, declara que toda la información proporcionada es verdadera, completa y exacta. Cada cliente es responsable por la veracidad, exactitud, vigencia y autenticidad de la información suministrada, y se compromete a mantenerla debidamente actualizada.</p>
							<p>Sin perjuicio de lo anterior, EL CLIENTE autoriza a MI CAMBISTA a verificar la veracidad de los datos personales facilitados por el Usuario a través de información obtenida de fuentes de acceso público o entidades especializadas en la provisión de dicha información.</p>
							<p>MI CAMBISTA no se hace responsable de la veracidad de la información que no sea de elaboración propia, por lo que tampoco asume responsabilidad alguna por posibles daños o perjuicios que pudieran originarse por el uso de dicha información.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">8. De las modificaciones de los términos y condiciones</h5>
							<p>MI CAMBISTA se reserva expresamente el derecho a modificar, actualizar o completar en cualquier momento los presentes Términos y Condiciones.</p>
							<p>Cualquier modificación, actualización o aplicación de los presentes términos y condiciones, será inmediatamente publicada en nuestro PORTAL WEB, siendo responsabilidad del cliente revisar los términos y condiciones vigentes de forma periódica, especialmente antes de realizar la operación.</p>
						</div>
						<div class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item">
							<h5 class="cMain__cont__terms-and-conditions__c__cTermsAndConditions__item__subtitle">9. JURISDICCIÓN</h5>
							<p>EL CLIENTE se somete a la competencia de los jueces y tribunales de Lima, Perú. Todas las notificaciones extrajudiciales o judiciales a que hubiera lugar se realizarán en el domicilio consignado en el registro del cliente. Cualquier cambio del domicilio deberá ser actualizado por EL CLIENTE, a través de nuestro PORTAL WEB.</p>
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