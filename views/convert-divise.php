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
				<!-- CONTENIDO DE LA CALCULADORA-->
				<div class="cControlP__cont--containDash--c" id="cont-convert-divise">
					<div class="cControlP__cont--containDash--c--cConvertDivise">
						<div class="cControlP__cont--containDash--c--cConvertDivise--cF">
							<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cT">
								<h3 class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--title">¡Gana cambiando con Mi Cambista!</h3>
								<p class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--desc">Mejores tasas, mayor ahorro</p>
								<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--cValDivise">
									<ul class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--cValDivise--m">
										<li class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--cValDivise--m--item">
											<p>Compramos a</p>
											<p>S/. <span id="refer_dollardivise">3.976</span></p>
										</li>
										<li class="cControlP__cont--containDash--c--cConvertDivise--cF--cT--cValDivise--m--item">
											<p>Vendemos a</p>
											<p>S/. <span id="refer_solesdivise">3.990</span></p>
										</li>
									</ul>
								</div>
							</div>
							<form method="POST" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform">
								<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--cTimeChangeDivise">
									<p>Se actualizará el tipo de cambio en:</p>
									<p>
										<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
										<span>4:31</span>
									</p>
								</div>
								<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc">
									<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls" id="cont-DiviseOne">
										<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--ChangeVal" id="txtDivise-one">Soles</div>
										<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues">
											<label for="inputval-one" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues--label">Envías</label>
											<input type="text" name="inputval-one" id="inputval-one" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues--input" min="0" maxlength="21">
											<span id="spanprefix-one">S/.</span>
										</div>
									</div>
									<button type="button" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--btnChangeCurrency" id="btn-Changecurr">
										<img src="./assets/img/svg/circleArrows.svg" alt="">
									</button>
									<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls">
										<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--ChangeVal" id="txtDivise-two">Dólares</div>
										<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues">
											<label for="inputval-two" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues--label">Recibes</label>
											<input type="text" name="inputval-two" id="inputval-two" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--Cc--controls--cValues--input" min="0" maxlength="21">
											<span id="spanprefix-two">$</span>
										</div>
									</div>
								</div>
								<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--cCoupon">
									<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--cCoupon--cTitle">
										<span>¿Montos mayores a $ 5,000.00?</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
									</div>
									<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--cCoupon--control">
										<input type="text" maxlength="20" placeholder="Cupón de descuento">
										<button type="button">Agregar</button>
									</div>
								</div>
								<button type="submit" class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--btnSendConvert" id="btn-initConvertPlatform">
									Comenzar cambio
									<div class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--btnSendConvert--contloader">
										<span class="cControlP__cont--containDash--c--cConvertDivise--cF--cform--btnSendConvert--contloader--loader"></span>
									</div>
								</button>
							</form>
						</div>
					</div>
				</div>
				<!-- CONTENIDO DEL FORMULARIO DE COMPLETADO DE CAMBIO -->
				<div class="cControlP__cont--containDash--c" id="cont-complete-divise">
					<div class="cControlP__cont--containDash--c--cCdivise">
						<div class="cControlP__cont--containDash--c--cCdivise--cTitle">
							<input type="hidden" readonly id="changecurridcli">
							<input type="hidden" readonly id="typechangecurridcli">
							<input type="hidden" readonly id="prefixcurridcli">
							<input type="hidden" readonly id="quantitycurridcli">
							<input type="hidden" readonly id="type_receivedcli">
							<input type="hidden" readonly id="prefix_receivedcli">
							<h2 class="cControlP__cont--containDash--c--cCdivise--cTitle--title">Completa los datos</h2>
							<p class="cControlP__cont--containDash--c--cCdivise--cTitle--desc">Selecciona el banco de envío y la cuenta donde recibes</p>
						</div>
						<form method="POST" class="cControlP__cont--containDash--c--cCdivise--cF">
							<input type="hidden" id="valIdUser_sess" value="<?= $idclient; ?>">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl">
								<label for="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--label">¿Desde qué banco nos envía su dinero?</label>


								<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem" id="selListallBanks_CData">
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData" id="selListAllBanks--img_CData">
										<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--placeholder">Selecciona un banco</span>
										<img src="" alt="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--imgbank">
									</div>
									<input type="text" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--inputVal_CData" readonly id="selListallBanks--input_CData">
									<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--icon_CData" src="./assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
										<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--icon_CData" src="./assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
			<?php require_once 'includes/dashboard-formaddaccountbank.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>js/actions_pages/convert-divise.js"></script>
	<script src="<?= $url ?>js/actions_pages/complete-divise.js"></script>
</body>
</html>