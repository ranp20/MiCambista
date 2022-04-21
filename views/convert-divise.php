<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Comenzar cambio </title>
	<?php require_once 'includes/header_links.php'; ?>
</head>
<body>
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
					<div class="cControlP__cont--containDash--c--cConvertDivise">
						<div class="cControlP__cont--containDash--c--cConvertDivise--cF">
							<div class="c-convert__cFrmConvert pt-3rem">
								<div class="c-convert__cFrmConvert__cSlogOfSite">
									<h3>¡Gana cambiando con MiCambista!</h3>
									<p>Mejores tasas, mayor ahorro</p>
								</div>
								<div class="c-convert__cFrmConvert__mxFrmC">
									<div class="c-convert__cFrmConvert__mxFrmC__cValuesRates b-shadow-light">
										<p class="c-convert__cFrmConvert__mxFrmC__cValuesRates__vRateVariable">
											<span>Compramos a:</span>
											<span id="refval_buy_at"></span>
										</p>
										<p class="c-convert__cFrmConvert__mxFrmC__cValuesRates__vRateVariable">
											<span>Vendemos a:</span>
											<span id="refval_sell_at"></span>
										</p>
									</div>
									<form class="c-convert__cFrmConvert__mxFrmC__cFrm" action="" method="POST" id="frm-iConvDivi">
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cCountdown">
											<span>Se actualizará el tipo de cambio en:</span>
											<p>
												<svg class="MuiSvgIcon-root mr-2" width="26" height="26" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 5.72l-4.6-3.86-1.29 1.53 4.6 3.86L22 5.72zM7.88 3.39L6.6 1.86 2 5.71l1.29 1.53 4.59-3.85zM12.5 8H11v6l4.75 2.85.75-1.23-4-2.37V8zM12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9c4.97 0 9-4.03 9-9s-4.03-9-9-9zm0 16c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"></path></svg>
												<span id="timeoutChangeDivise">0.00</span>
											</p>
										</div>
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction">
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl">
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cPrefixCurrent" id="name_current_send">
													<span id="txtDivise-one">Soles</span>
												</div>
												<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl__cDiviseValue">
													<span id="spanprefix-one">S/.</span>
													<input type="text" id="val_amount_send" placeholder="0" maxlength="20" class="t-align-right">
													<span>Envías</span>
												</div>
											</div>
											<button type="button" class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__btnConvert" id="convert_divise">
												<span>
													<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 34" fill="none"><g clip-path="url(#clip0)"><path d="M11.1405 26.92C11.2649 26.7096 11.3065 26.4601 11.2572 26.2204C11.2078 25.9807 11.071 25.7679 10.8736 25.6237C9.30801 24.5269 8.08876 23.0032 7.36064 21.2337C6.63252 19.4641 6.4261 17.5229 6.7659 15.6406C7.10569 13.7583 7.97743 12.014 9.2776 10.6147C10.5778 9.21538 12.2518 8.2199 14.1008 7.74644L12.7314 10.1254C12.5991 10.3553 12.5633 10.6285 12.6321 10.885C12.7008 11.1415 12.8684 11.3603 13.0979 11.4932C13.3274 11.6261 13.6001 11.6622 13.8559 11.5937C14.1118 11.5251 14.3298 11.3575 14.4622 11.1276L16.4577 7.66099C16.7224 7.20129 16.7938 6.65482 16.6563 6.14181C16.5189 5.62879 16.1838 5.19126 15.7248 4.92546L12.2632 2.92104C12.0337 2.78814 11.761 2.75199 11.5052 2.82054C11.2493 2.8891 11.0312 3.05674 10.8989 3.2866C10.7666 3.51645 10.7309 3.78968 10.7996 4.04619C10.8683 4.30269 11.0359 4.52146 11.2654 4.65436L13.3752 5.87606C11.1907 6.47989 9.22305 7.69353 7.7015 9.37563C6.17994 11.0577 5.16709 13.1391 4.7809 15.3772C4.3947 17.6154 4.65107 19.9183 5.52013 22.0177C6.38919 24.117 7.83517 25.9265 9.68969 27.2354C9.80376 27.3164 9.93337 27.3727 10.0703 27.4007C10.2072 27.4287 10.3484 27.4279 10.4849 27.3982C10.6214 27.3685 10.7501 27.3107 10.863 27.2283C10.9759 27.146 11.0704 27.041 11.1405 26.92Z" fill="#676767"/><path d="M22.3578 31.4868C22.4901 31.257 22.5258 30.9837 22.4571 30.7272C22.3884 30.4707 22.2208 30.252 21.9913 30.1191L19.8815 28.8974C22.066 28.2935 24.0337 27.0799 25.5552 25.3978C27.0768 23.7157 28.0896 21.6344 28.4758 19.3962C28.862 17.158 28.6057 14.8552 27.7366 12.7558C26.8675 10.6564 25.4216 8.84688 23.567 7.53801C23.453 7.45703 23.3234 7.40074 23.1864 7.3727C23.0495 7.34467 22.9083 7.34552 22.7719 7.3752C22.6354 7.40487 22.5066 7.46273 22.3937 7.54507C22.2808 7.62741 22.1863 7.73244 22.1162 7.85346C21.9918 8.06385 21.9502 8.31328 21.9996 8.55299C22.0489 8.79271 22.1857 9.00547 22.3831 9.14969C23.9487 10.2465 25.168 11.7702 25.8961 13.5398C26.6242 15.3093 26.8306 17.2505 26.4908 19.1328C26.151 21.0151 25.2793 22.7594 23.9791 24.1587C22.679 25.558 21.005 26.5535 19.1559 27.027L20.5253 24.648C20.6577 24.4181 20.6934 24.1449 20.6247 23.8884C20.5559 23.6319 20.3884 23.4131 20.1589 23.2802C19.9293 23.1473 19.6567 23.1112 19.4008 23.1797C19.145 23.2483 18.9269 23.4159 18.7946 23.6458L16.799 27.1124C16.5344 27.5721 16.4629 28.1186 16.6004 28.6316C16.7378 29.1446 17.0729 29.5822 17.532 29.848L20.9935 31.8524C21.223 31.9853 21.4957 32.0214 21.7516 31.9529C22.0074 31.8843 22.2255 31.7167 22.3578 31.4868Z" fill="#676767"/></g><defs><clipPath id="clip0"><rect width="24" height="24" fill="white" transform="matrix(-0.498896 0.866662 -0.865386 -0.501105 32.9998 13)"/></clipPath></defs></svg>
												</span>
											</button>
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cFunction__cControl">
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
										<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon">
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cTitle">
												<span>¿Montos mayores a $5,000.00?</span>
												<svg focusable="false" width="27" height="27" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path></svg>
											</div>
											<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl">
												<input type="text" name="" id="" maxlength="35" placeholder="Cupón de descuento">
												<button type="button" id="">Agregar</button>
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
				<div class="cControlP__cont--containDash--c pt-3rem" id="cont-complete-divise">
					<div class="cControlP__cont--containDash--c--cCdivise">
						<div class="cControlP__cont--containDash--c--cCdivise--cTitle">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="changecurridcli">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="typechangecurridcli">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefixcurridcli">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="quantitycurridcli">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="type_receivedcli">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefix_receivedcli">
							<h2 class="cControlP__cont--containDash--c--cCdivise--cTitle--title">Completa los datos</h2>
							<p class="cControlP__cont--containDash--c--cCdivise--cTitle--desc">Selecciona el banco de envío y la cuenta donde recibes</p>
						</div>
						<form method="POST" class="cControlP__cont--containDash--c--cCdivise--cF">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="valIdUser_sess" value="<?= $idclient; ?>">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl">
								<label for="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--label">¿Desde qué banco nos envía su dinero?</label>
								<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem" id="selListallBanks_CData">
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData" id="selListAllBanks--img_CData">
										<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--placeholder">Selecciona un banco</span>
										<img src="" alt="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--imgbank">
									</div>
									<input type="text" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--inputVal_CData" readonly id="selListallBanks--input_CData">
									<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--icon_CData" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
									<ul class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData" id="listAllsBanks_CData"></ul>
								</div>
								<span id="msgerrorNounSelBankSend_CData"></span>
							</div>
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl">
								<label for="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--label">¿En qué cuenta recibirás tu dinero?</label>
								<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks">
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem" id="selListallaccountsBanks_CData">
										<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--cInputFake_CData" id="selListAllaccountsBanks--img_CData">
											<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--cInputFake_CData--placeholder">Selecciona una de tus cuentas</span>
											<img src="" alt="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--cInputFake_CData--imgbank">
										</div>
										<input type="text" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--inputVal_CData" readonly id="selListallBanks--input_CData">
										<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--icon_CData" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
										<ul class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData" id="listAllsAccountsBanks_CData"></ul>
									</div>
									<span id="msgerrorNounSelAccountBankReceived_CData"></span>
									<button type="button" id="btn-addAccountform" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--caddBanks">
										<span>Agregar cuenta</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
									</a>
								</div>
							</div>
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cBtnsActions">
								<button type="submit" class="cControlP__cont--containDash--c--cCdivise--cF--cBtnsActions--submitConvert" id="btn-cCompleteDiviseCli">Completar cambio
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cBtnsActions--submitConvert--contloader">
										<span class="cControlP__cont--containDash--c--cCdivise--cF--cBtnsActions--submitConvert--contloader--loader"></span>
									</div>
								</button>
								<a href="convert-divise" class="cControlP__cont--containDash--c--cCdivise--cF--cBtnsActions--btnCancel">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
				<?php require_once 'includes/dashboard-contain-footer.php'; ?>
			</section>
			<?php require_once 'includes/dashboard-formaddaccountbank_by_tcurrent.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/convert-divise.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/complete-divise.js"></script>
</body>
</html>