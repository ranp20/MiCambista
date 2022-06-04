<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}else{
	if($_SESSION['cli_micambista'][0]['complete_account'] <= 16){
		header("Location: complete-register");
	}else{
		if(!isset($_SESSION['cli_micambista'][0]['profile_type']) && !isset($_SESSION['cli_micambista'][0]['profile_type'])){
			header("Location: select-profile");
		}
	}
}
require_once '../php/process_data-list.php';
require_once '../php/class/settings.php';
$call_config = new Settings_all();
$g_setting = $call_config->get_config();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Comenzar cambio </title>
	<?php require_once 'includes/header_links.php'; ?>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div id="mssg-messageAlertMaxAmount"></div>
	<div class="cControlP">
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash">
				<div class="sendBeforeCompleteDivise" id="sendBeforeCompleteDivise">
					<div class="sendBeforeCompleteDivise__charger">
						<div class="sendBeforeCompleteDivise__charger--loader"></div>
					</div>
				</div>
				<!-- CONTENIDO - CONVERSOR DE DIVISAS-->
				<div class="cControlP__cont--containDash--c" id="cont-convert-divise">
					<!-- CONTENIDO - PERFIL EN USO -->
					<div class="cControlP__cont--containDash--cProfileUsed" id="c-changeProfileSelect">
						<div class="cControlP__cont--containDash--cProfileUsed__cLeftTxt">
							<span>Perfil: </span>
							<span><?php echo $_SESSION['cli_micambista'][0]['profile_name'];?></span>
						</div>
						<div class="cControlP__cont--containDash--cProfileUsed__cRightTxt">
							<a href="change-profile" id="change-profile">
								<span class="cControlP__cont--containDash--cProfileUsed__cRightTxt__cIcon">
									<svg focusable="false" viewBox="0 0 24 24" color="#FFF" aria-hidden="true" width="25px" height="25px"><path d="M9 13.75c-2.34 0-7 1.17-7 3.5V19h14v-1.75c0-2.33-4.66-3.5-7-3.5zM4.34 17c.84-.58 2.87-1.25 4.66-1.25s3.82.67 4.66 1.25H4.34zM9 12c1.93 0 3.5-1.57 3.5-3.5S10.93 5 9 5 5.5 6.57 5.5 8.5 7.07 12 9 12zm0-5c.83 0 1.5.67 1.5 1.5S9.83 10 9 10s-1.5-.67-1.5-1.5S8.17 7 9 7zm7.04 6.81c1.16.84 1.96 1.96 1.96 3.44V19h4v-1.75c0-2.02-3.5-3.17-5.96-3.44zM15 12c1.93 0 3.5-1.57 3.5-3.5S16.93 5 15 5c-.54 0-1.04.13-1.5.35.63.89 1 1.98 1 3.15s-.37 2.26-1 3.15c.46.22.96.35 1.5.35z"></path></svg>
								</span>
								<span class="cControlP__cont--containDash--cProfileUsed__cRightTxt__cTxt">Cambiar Perfil</span>
							</a>
						</div>
					</div>
					<div class="cControlP__cont--containDash--c--cConvertDivise">
						<div class="cControlP__cont--containDash--c--cConvertDivise--cF">
							<div class="c-convert__cFrmConvert pt-3rem">
								<div class="c-convert__cFrmConvert__cSlogOfSite">
									<h3>¡Gana cambiando con MiCambista!</h3>
									<p>Mejores tasas, mayor ahorro</p>
								</div>
								<div class="c-convert__cFrmConvert__mxFrmC">
									<div class="c-convert__cFrmConvert__mxFrmC__cValRatesAll" id="vl-valuesRatesAll">
										<div class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesRates b-shadow-light">
											<p class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesRates__vRateVariable">
												<span>Compramos a:</span>
												<span id="refval_buy_at"></span>
											</p>
											<p class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesRates__vRateVariable">
												<span>Vendemos a:</span>
												<span id="refval_sell_at"></span>
											</p>
										</div>
									</div>
									<form class="c-convert__cFrmConvert__mxFrmC__cFrm" action="" method="POST" id="frm-iConvDivi">
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cCountdown">
											<span>Se actualizará el tipo de cambio en:</span>
											<p>
												<svg class="MuiSvgIcon-root mr-2" width="26" height="26" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 5.72l-4.6-3.86-1.29 1.53 4.6 3.86L22 5.72zM7.88 3.39L6.6 1.86 2 5.71l1.29 1.53 4.59-3.85zM12.5 8H11v6l4.75 2.85.75-1.23-4-2.37V8zM12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9c4.97 0 9-4.03 9-9s-4.03-9-9-9zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"></path></svg>
												<span id="timeoutChangeDivise">0:00</span>
											</p>
										</div>
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction">
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl b-shadow-light">
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cPrefixCurrent" id="name_current_send">
													<span id="txtDivise-one">Soles</span>
												</div>
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cDiviseValue">
													<span id="spanprefix-one">S/.</span>
													<input type="text" id="val_amount_send" placeholder="0" maxlength="20" class="t-align-right">
													<span>Envías</span>
												</div>
											</div>
											<button type="button" class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__btnConvert" id="convert_divise" title="convertir">
												<span>
													<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 34"><g clip-path="url(#clip0)"><path d="M11.1405 26.92C11.2649 26.7096 11.3065 26.4601 11.2572 26.2204C11.2078 25.9807 11.071 25.7679 10.8736 25.6237C9.30801 24.5269 8.08876 23.0032 7.36064 21.2337C6.63252 19.4641 6.4261 17.5229 6.7659 15.6406C7.10569 13.7583 7.97743 12.014 9.2776 10.6147C10.5778 9.21538 12.2518 8.2199 14.1008 7.74644L12.7314 10.1254C12.5991 10.3553 12.5633 10.6285 12.6321 10.885C12.7008 11.1415 12.8684 11.3603 13.0979 11.4932C13.3274 11.6261 13.6001 11.6622 13.8559 11.5937C14.1118 11.5251 14.3298 11.3575 14.4622 11.1276L16.4577 7.66099C16.7224 7.20129 16.7938 6.65482 16.6563 6.14181C16.5189 5.62879 16.1838 5.19126 15.7248 4.92546L12.2632 2.92104C12.0337 2.78814 11.761 2.75199 11.5052 2.82054C11.2493 2.8891 11.0312 3.05674 10.8989 3.2866C10.7666 3.51645 10.7309 3.78968 10.7996 4.04619C10.8683 4.30269 11.0359 4.52146 11.2654 4.65436L13.3752 5.87606C11.1907 6.47989 9.22305 7.69353 7.7015 9.37563C6.17994 11.0577 5.16709 13.1391 4.7809 15.3772C4.3947 17.6154 4.65107 19.9183 5.52013 22.0177C6.38919 24.117 7.83517 25.9265 9.68969 27.2354C9.80376 27.3164 9.93337 27.3727 10.0703 27.4007C10.2072 27.4287 10.3484 27.4279 10.4849 27.3982C10.6214 27.3685 10.7501 27.3107 10.863 27.2283C10.9759 27.146 11.0704 27.041 11.1405 26.92Z" fill="#fff"/><path d="M22.3578 31.4868C22.4901 31.257 22.5258 30.9837 22.4571 30.7272C22.3884 30.4707 22.2208 30.252 21.9913 30.1191L19.8815 28.8974C22.066 28.2935 24.0337 27.0799 25.5552 25.3978C27.0768 23.7157 28.0896 21.6344 28.4758 19.3962C28.862 17.158 28.6057 14.8552 27.7366 12.7558C26.8675 10.6564 25.4216 8.84688 23.567 7.53801C23.453 7.45703 23.3234 7.40074 23.1864 7.3727C23.0495 7.34467 22.9083 7.34552 22.7719 7.3752C22.6354 7.40487 22.5066 7.46273 22.3937 7.54507C22.2808 7.62741 22.1863 7.73244 22.1162 7.85346C21.9918 8.06385 21.9502 8.31328 21.9996 8.55299C22.0489 8.79271 22.1857 9.00547 22.3831 9.14969C23.9487 10.2465 25.168 11.7702 25.8961 13.5398C26.6242 15.3093 26.8306 17.2505 26.4908 19.1328C26.151 21.0151 25.2793 22.7594 23.9791 24.1587C22.679 25.558 21.005 26.5535 19.1559 27.027L20.5253 24.648C20.6577 24.4181 20.6934 24.1449 20.6247 23.8884C20.5559 23.6319 20.3884 23.4131 20.1589 23.2802C19.9293 23.1473 19.6567 23.1112 19.4008 23.1797C19.145 23.2483 18.9269 23.4159 18.7946 23.6458L16.799 27.1124C16.5344 27.5721 16.4629 28.1186 16.6004 28.6316C16.7378 29.1446 17.0729 29.5822 17.532 29.848L20.9935 31.8524C21.223 31.9853 21.4957 32.0214 21.7516 31.9529C22.0074 31.8843 22.2255 31.7167 22.3578 31.4868Z" fill="#fff"/></g><defs><clipPath id="clip0"><rect width="24" height="24" fill="white" transform="matrix(-0.498896 0.866662 -0.865386 -0.501105 32.9998 13)"/></clipPath></defs></svg>
												</span>
											</button>
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl b-shadow-light">
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cPrefixCurrent" id="name_current_received">
													<span id="txtDivise-two">Dólares</span>
												</div>
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cDiviseValue">
													<span id="spanprefix-two">$</span>
													<input type="text" id="val_amount_received" placeholder="0.00" maxlength="20">
													<span>Recibes</span>
												</div>
											</div>
										</div>
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon" id="cnt-ValidCouponConvert">
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cTitle">
												<span>¿Montos mayores a $ <?php echo number_format($g_setting("maxamount_convertion")['setting_value'], 2); ?>?</span>
												<svg focusable="false" width="27" height="27" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path></svg>
											</div>
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl">
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl__iptRsltCoupon">
													<input type="text" name="v-frmCouponDescStrValid" id="v-frmCouponDescStrValid" maxlength="35" placeholder="Ingrese su cupón aquí" autocomplete='off' spellcheck='false'>
													<button type="button" id="btn-coDescRatePercent">Agregar</button>
												</div>
												<span id="m-couponMessageErr"></span>
											</div>
										</div>
										<button type="submit" class="c-convert__cFrmConvert__mxFrmC__cFrm__sButtonSub" id="btn-initConvertPlatform">
											<span>Comenzar cambio</span>
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__sButtonSub__contloader">
												<span class="c-convert__cFrmConvert__mxFrmC__cFrm__sButtonSub__contloader__loader"></span>
											</div>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- CONTENIDO - FORMULARIO DE COMPLETADO DE CAMBIO -->
				<div class="cControlP__cont--containDash--c pt-3rem" id="cont-complete-divise"></div>
				<!-- CONTENIDO - RESUMEN TRANSACCIÓN Y CONTROL AGREGAR NRO DE OPERACIÓN -->
				<div class="cControlP__cont--containDash--c pt-3rem" id="cont-complete-exchange"></div>
				<?php require_once 'includes/dashboard-contain-footer.php';?>
				<div>
					<div>
						<input type="hidden" autocomplete="off" placeholder="" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="v_transccoderegcurrtime-clisel" value="">
						<input type="hidden" autocomplete="off" placeholder="" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="v_transccodeordercurrtime-clisel" value="">
						<input type="hidden" autocomplete="off" placeholder="" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="v_transcidcurrtime-clisel" value="">
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-formaddaccountbank_by_tcurrent.php'; ?>
		</div>
	</div>		
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/dashboard-client.js"></script>
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/convert-divise.js"></script>
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/convert-divise-with-coupon.js"></script>
	<script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/complete-divise.js"></script>
</body>
</html>