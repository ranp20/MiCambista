window.onload = function(){
  var element = document.querySelector('#timeoutChangeDivise');
	var minTimeout = 60 * 5;
  startTimer(minTimeout, element);
}
$(() => {
	//listValidationStatus();
});
let inputsAll = document.querySelectorAll("input");
// ------------ PREGUNTAR SI DESEA ABANDONAR LA PÁGINA - INPUTS
inputsAll.forEach(function(e, i){
	e.addEventListener("input", function(){
		window.onbeforeunload = function(event){
		  event.returnValue = "Es posible que no se guarden los cambios que ha hecho";
		};
	});
});
// ------------ VARIABLES GLOBALES PARA CONVERSIÓN
var rates = "";
var namecurr = ['Soles', 'Dólares'];
var prefixs = ['S/.', '$'];

var current_USD = "";
var current_PEN = "";

var result = 0;

const btnconvert = document.querySelector("#convert_divise");
var name_currsend = document.querySelector("#name_current_send");
var name_currreceived = document.querySelector("#name_current_received");
var ipt_amount_send = document.querySelector("#val_amount_send");
var ipt_amount_received = document.querySelector("#val_amount_received");
var currSpanPrefixSend = ipt_amount_send.previousElementSibling.textContent;
var currSpanPrefixReceived =  ipt_amount_received.previousElementSibling.textContent;
var amountMaxReceived = "";

var idClient_current = $("#input-idClientVal").val();
// LISTAR LAS TARIFAS PARA LA CONVERSIÓN
$.ajax({
  url: "./controllers/c_list-rates-convert-divise.php",
  method: "POST",
  datatype: "JSON",
  contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
}).done((e) => {
  var res = JSON.parse(e);
  var val_buy_at = res[0].buy_at;
  var val_sell_at = res[0].sell_at;
  amountMaxReceived = res[0].mxaammountcv;
   
  // SETEO DE VARIABLES
  rates = [val_buy_at, val_sell_at];
	current_USD = rates[0];
	current_PEN = rates[1];

	// COLOCAR CONVERSIÓN DE EJEMPLO AL INICIO
	var valinit_example = "10000.00";
	var descomp_valinitexample = valinit_example.toString().split('.');
	var descomp_valinitexample_final = "";
	if(descomp_valinitexample[1] == undefined || descomp_valinitexample[1] == 'undefined' || descomp_valinitexample[1] == ""){
		descomp_valinitexample_final = descomp_valinitexample[0]+'.00';
	}else	if(descomp_valinitexample[1].length < 2){
		descomp_valinitexample_final = descomp_valinitexample[0]+"."+descomp_valinitexample[1]+'0';
	}else{
		descomp_valinitexample_final = descomp_valinitexample[0]+"."+descomp_valinitexample[1];
	}
	document.querySelector("#val_amount_send").value = descomp_valinitexample_final.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	var ipt_amount_received = document.querySelector("#val_amount_received");
	var currSpanPrefixSend = ipt_amount_send.previousElementSibling.textContent;
	var currSpanPrefixReceived =  ipt_amount_received.previousElementSibling.textContent;
	var first_calcreceived = convert(valinit_example, currSpanPrefixSend, currSpanPrefixReceived);
	var second_formatreceived = first_calcreceived.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	ipt_amount_received.value = second_formatreceived;

	// COLOCAR VALOR DEL TARIFARIO
  if(res.length == 0){
  	console.log("No hay datos");
  }else{
  	$("#refval_buy_at").html(`<span>S/. </span><span id='v-refRateBuyCurrent'>${val_buy_at}</span>`);
  	$("#refval_sell_at").html(`<span>S/. </span><span id='v-refRateSellCurrent'>${val_sell_at}</span>`);
  }
});
// ------------ FUNCTION - CONVERT DIVISE
function convert(amount, prefixFrom, prefixtTo){
	if(prefixFrom == "$" && prefixtTo == "S/."){
		result = amount * current_USD;
	}else if(prefixFrom == "S/." && prefixtTo == "$"){
		result = amount / current_PEN;
	}else{
		alert("Valor inválido");
	}
	return result;
}
// ------------ BOTÓN - CONVERSIÓN DE DIVISA
btnconvert.addEventListener("click", function(e){
	e.preventDefault();
	this.classList.toggle("active");
	if(this.classList.contains("active")){
		name_currsend.children[0].textContent = namecurr[1];
		name_currreceived.children[0].textContent = namecurr[0];
		ipt_amount_send.previousElementSibling.textContent = prefixs[1];
		ipt_amount_received.previousElementSibling.textContent = prefixs[0];
		//ipt_amount_send.value = ipt_amount_received.value;
		// QUITAR COMAS PARA EL CÁLCULO
		var val = ipt_amount_send.value;
		let val_split = "";
		let val_formatfinal = "";
		var valwithoutcomas = val.replace(/,/g,'');
		//var amountcalc_received = convert(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
		var amountcalc_received = convert(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
		var amountformat_received = amountcalc_received.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		val_split = amountformat_received.toString().split(".");
		if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
			val_formatfinal = val_split[0]+'.00';
		}else	if(val_split[1].length < 2){
			val_formatfinal = val_split[0]+"."+val_split[1]+'0';
		}else{
			val_formatfinal = val_split[0]+"."+val_split[1];
		}
		ipt_amount_received.value = val_formatfinal;
		//console.log(val_formatfinal);
	}else{
		name_currsend.children[0].textContent = namecurr[0];
		name_currreceived.children[0].textContent = namecurr[1];
		ipt_amount_send.previousElementSibling.textContent = prefixs[0];
		ipt_amount_received.previousElementSibling.textContent = prefixs[1];
		//ipt_amount_received.value = ipt_amount_send.value;
		// QUITAR COMAS PARA EL CÁLCULO

		var val = ipt_amount_send.value;
		let val_split = "";
		let val_formatfinal = "";
		var valwithoutcomas = val.replace(/,/g,'');
		//var amountcalc_send = convert(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
		var amountcalc_send = convert(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
		var amountformat_send = amountcalc_send.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		//ipt_amount_send.value = amountformat_send;
		val_split = amountformat_send.toString().split(".");
		if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
			val_formatfinal = val_split[0]+'.00';
		}else	if(val_split[1].length < 2){
			val_formatfinal = val_split[0]+"."+val_split[1]+'0';
		}else{
			val_formatfinal = val_split[0]+"."+val_split[1];
		}
		ipt_amount_received.value = amountformat_send;
		//console.log(amountformat_send);
	}
});
// ------------ ESCRIBIR EN EL INPUT DE MONTO DE ENVÍO
ipt_amount_send.addEventListener("keyup", function(e){
	var currSpanPrefixSend = ipt_amount_send.previousElementSibling.textContent;
	var currSpanPrefixReceived =  ipt_amount_received.previousElementSibling.textContent;
	if (e.which >= 37 && e.which <= 40) return;
	var val = e.target.value;
	var target = e.target;
  var position = target.selectionStart;
  this.value = val.replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	// QUITAR COMAS PARA EL CÁLCULO
	var valwithoutcomas = val.replace(/,/g,'');
	//console.log(valwithoutcomas);
	var amountcalc_received = convert(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
	// console.log("De: "+currSpanPrefixSend+" a: "+currSpanPrefixReceived);
	// console.log(amountcalc_received);
	var amountformat_received = amountcalc_received.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");

	target.selectionEnd = position;
	var val_split = "";
	var val_formatfinal = "";
	val_split = amountformat_received.toString().split(".");
	
	if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
		val_formatfinal = val_split[0]+'.00';
	}else	if(val_split[1].length < 2){
		val_formatfinal = val_split[0]+"."+val_split[1]+'0';
	}else{
		val_formatfinal = val_split[0]+"."+val_split[1];
	}
	ipt_amount_received.value = val_formatfinal;

	if(val != "" && val != 0 && val != 0.00 && val != null && ipt_amount_received.value != "" && ipt_amount_received.value != 0 && ipt_amount_received.value != 0.00 && ipt_amount_received.value != null){
		$("#btn-initConvertPlatform").attr("type", "submit");
		$("#btn-initConvertPlatform").removeAttr("disabled");
		$("#btn-initConvertPlatform").addClass("completeFrm");
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
	}
});
// ------------ ESCRIBIR EN EL INPUT DE MONTO RECIBIR (SE ESTA HACIENDO EL CÁLCULO "MANUALMENTE", ES DECIR SIN USAR ALGUNA FUNCIÓN)
ipt_amount_received.addEventListener("keyup", function(e){
	let result_calc = "";
	var currSpanPrefixSend = ipt_amount_send.previousElementSibling.textContent;
	var currSpanPrefixReceived =  ipt_amount_received.previousElementSibling.textContent;
	if (e.which >= 37 && e.which <= 40) return;
	var val = e.target.value;
	var target = e.target;
  var position = target.selectionStart;
  this.value = val.replace(/[^\d.]/g, "")	.replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	// QUITAR COMAS PARA EL CÁLCULO
	var valwithoutcomas = val.replace(/,/g,'');
	var amountcalc_send = "";
	//VALIDAR POR EL TIPO DE PREFIJO
	if(currSpanPrefixReceived == "$" && currSpanPrefixSend == "S/."){
		amountcalc_send = valwithoutcomas * current_PEN;
	}else if(currSpanPrefixReceived == "S/." && currSpanPrefixSend == "$"){
		amountcalc_send = valwithoutcomas / current_USD;
	}else{
		alert("Valor inválido");
	}
	//console.log(amountcalc_send);
	//var amountcalc_send = convert(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
	//result_calc = valwithoutcomas * current_PEN;
	//console.log(result_calc);
	// console.log("De: "+currSpanPrefixReceived+" a: "+currSpanPrefixSend);
	// console.log(amountcalc_send);
	var amountformat_send = amountcalc_send.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	target.selectionEnd = position;
	let val_split = "";
	let val_formatfinal = "";
	val_split = amountformat_send.toString().split(".");
	if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
		val_formatfinal = val_split[0]+'.00';
	}else	if(val_split[1].length < 2){
		val_formatfinal = val_split[0]+"."+val_split[1]+'0';
	}else{
		val_formatfinal = val_split[0]+"."+val_split[1];
	}
	ipt_amount_send.value = val_formatfinal;
	
	if(val != "" && val != 0 && val != 0.00 && val != null && ipt_amount_send.value != "" && ipt_amount_send.value != 0 && ipt_amount_send.value != 0.00 && ipt_amount_send.value != null){
		$("#btn-initConvertPlatform").attr("type", "submit");
		$("#btn-initConvertPlatform").removeAttr("disabled");
		$("#btn-initConvertPlatform").addClass("completeFrm");
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
	}
});
// ------------ CONVESIÓN DE CAMBIO - HACIA EL PASO 2
$(document).on("submit", "#frm-iConvDivi", function(e){
	e.preventDefault();
	$("#btn-initConvertPlatform").attr("disabled","disabled");
	$("#btn-initConvertPlatform").removeClass("completeFrm");
	$("#btn-initConvertPlatform").addClass("sendShowComplete");
	$("#btn-initConvertPlatform").find("div").addClass("show");
	$("#cont-convert-divise").addClass("hidd_toNextStepTrans");

	let amountMax_rece = amountMaxReceived;
	let amount_rece_one = $("#val_amount_received").val();
	let amount_rece_two = amount_rece_one.toString().split(",");
	let amount_rece_three = parseFloat(amount_rece_two[0] + amount_rece_two[1]);
	let ammountMax_format = amountMax_rece.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");

	if($("#val_amount_send").val() != "" && $("#val_amount_send").val() != 0 && $("#val_amount_send").val() != 0.00 && $("#val_amount_received").val() != "" && $("#val_amount_received").val() != 0 && $("#val_amount_received").val() != 0.00){

		var typeCURR = $(this).find("#txtDivise-one").text();
		var quantityCURR = $("#val_amount_send").val().replace(/[$,]/g,'');
		var prefixCURR = $(this).find("#spanprefix-one").text();
		var type_received = $(this).find("#txtDivise-two").text();
		var prefix_received = $(this).find("#spanprefix-two").text();
		
		var valcambiocurr;
		if(typeCURR == "Soles"){
			valcambiocurr = current_USD;
		}else{
			valcambiocurr = current_PEN;
		}
		
		var formData = new FormData();
		formData.append("cambioval", valcambiocurr);
		formData.append("prefix", prefixCURR);
		formData.append("val_type", typeCURR);
		formData.append("val_send", quantityCURR);
		formData.append("type_received", type_received);
		formData.append("prefix_received", prefix_received);
		formData.append("ammount_send", amount_rece_three);

		$.ajax({
			url: "php/process_convert-divise.php",
			method: "POST",
			dataType: "JSON",
			data: formData,
	    contentType: false,
	    cache: false,
	    processData: false,
		}).done(function(e){
			if(e != ""){
				if(e.res == "st-accepted"){
					$("#changecurridcli").val(e.received.cambioval);
					$("#typechangecurridcli").val(e.received.divise);
					$("#prefixcurridcli").val(e.received.prefix);
					$("#quantitycurridcli").val(e.received.quantity);
					$("#type_receivedcli").val(e.received.type_received);
					$("#prefix_receivedcli").val(e.received.prefix_received);
					setTimeout(function(){
						$("#cont-convert-divise").addClass("sendShow");
						$("#cont-complete-divise").addClass("sendShow");
					}, 2000);
					$("#cont-complete-divise").html(`
						<div class="cControlP__cont--containDash--c--cCdivise">
						<div class="cControlP__cont--containDash--c--cCdivise--cTitle">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="ipt-profile-type" value="${e.received.profile_type}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="ipt-profile-name" value="${e.received.profile_name}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="changecurridcli" value="${e.received.cambioval}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="typechangecurridcli" value="${e.received.divise}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefixcurridcli" value="${e.received.prefix}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="quantitycurridcli" value="${e.received.quantity}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="type_receivedcli" value="${e.received.type_received}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefix_receivedcli" value="${e.received.prefix_received}">
							<h2 class="cControlP__cont--containDash--c--cCdivise--cTitle--title">Completa los datos</h2>
							<p class="cControlP__cont--containDash--c--cCdivise--cTitle--desc">Selecciona el banco de envío y la cuenta donde recibes</p>
						</div>
						<form method="POST" class="cControlP__cont--containDash--c--cCdivise--cF">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl">
								<label for="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--label">¿Desde qué banco nos envía su dinero?</label>
								<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem" id="selListallBanks_CData">
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData" id="selListAllBanks--img_CData">
										<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--placeholder">Selecciona un banco</span>
										<img src="" alt="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--imgbank">
									</div>
									<input type="text" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--inputVal_CData" readonly id="selListallBanks--input_CData">
									<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--icon_CData" src="./views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
										<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--icon_CData" src="./views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
					</div>`);
				}else if(e.res == "st-in_review"){
					$("#btn-initConvertPlatform").attr("type", "button");
					$("#btn-initConvertPlatform").attr("disabled", "disabled");
					$("#btn-initConvertPlatform").removeClass("completeFrm");
					$("#btn-initConvertPlatform").removeClass("sendShowComplete");
					$("#btn-initConvertPlatform").find("div").removeClass("show");
					$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
					
					Swal.fire({
					  title: '',
					  html: `<div class="alertSwal txt-center">
						  			<div class="alertSwal__cTitle">
						  				<h3>Datos En revisión</h3>
						  			</div>
					  				<div class="alertSwal__cText">
					  					<p>En estos momentos el sistema esta validanco su información.</p>
											<p>Por favor vuelva en cuanto se actualice el estado de validación o continue con el cambio con <strong class="bold-pricolor">monto menores a $ ${ammountMax_format}</strong></p>
										</div>
										<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
									</div>`,
					  icon: '',
					  showCancelButton: false,
					  showConfirmButton: false,
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Aceptar',
					  allowOutsideClick: false,
					  allowEscapeKey:false,
					  allowEnterKey:true
					});
					$(document).on('click', '.SwalBtn1', function() {
				    swal.clickConfirm();
				    $("#btn-initConvertPlatform").attr("type", "submit");
						$("#btn-initConvertPlatform").attr("disabled", false);
						$("#btn-initConvertPlatform").removeClass("completeFrm");
						$("#btn-initConvertPlatform").removeClass("sendShowComplete");
						$("#btn-initConvertPlatform").find("div").removeClass("show");
						$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
				  });
				}else if(e.res == "st-rejected"){
					$("#btn-initConvertPlatform").attr("type", "button");
					$("#btn-initConvertPlatform").attr("disabled", "disabled");
					$("#btn-initConvertPlatform").removeClass("completeFrm");
					$("#btn-initConvertPlatform").removeClass("sendShowComplete");
					$("#btn-initConvertPlatform").find("div").removeClass("show");
					$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
					
					Swal.fire({
					  title: '',
					  html: `<div class="alertSwal txt-center">
						  			<div class="alertSwal__cTitle">
						  				<h3>Datos Denegados</h3>
						  			</div>
					  				<div class="alertSwal__cText">
					  					<p>El sistema encontró que los datos no coinciden con ud.</p>
											<p>Por favor vuelva a subir unos nuevos para poder acceder a cambios mayores a <strong class="bold-pricolor">$ ${ammountMax_format}</strong> o continue el cambio con <strong class="bold-pricolor">montos menores</strong> a este.</p>
										</div>
					  				<div class="alertSwal__cText">
						  		 		<p>Haz click en <strong class="bold-pricolor">validación biométrica</strong> para agregar nuevamente tus datos.</p>
										</div>
										<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
									</div>`,
					  icon: '',
					  showCancelButton: false,
					  showConfirmButton: false,
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Aceptar',
					  allowOutsideClick: false,
					  allowEscapeKey:false,
					  allowEnterKey:true
					});
					$(document).on('click', '.SwalBtn1', function() {
				    swal.clickConfirm();
				    $("#btn-initConvertPlatform").attr("type", "submit");
						$("#btn-initConvertPlatform").attr("disabled", false);
						$("#btn-initConvertPlatform").removeClass("completeFrm");
						$("#btn-initConvertPlatform").removeClass("sendShowComplete");
						$("#btn-initConvertPlatform").find("div").removeClass("show");
						$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
				  });
				}else if(e.res == "st-limit_change"){
					$("#btn-initConvertPlatform").attr("type", "button");
					$("#btn-initConvertPlatform").attr("disabled", "disabled");
					$("#btn-initConvertPlatform").removeClass("completeFrm");
					$("#btn-initConvertPlatform").removeClass("sendShowComplete");
					$("#btn-initConvertPlatform").find("div").removeClass("show");
					$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
					
					Swal.fire({
					  title: '',
					  html: `<div class="alertSwal txt-center">
						  			<div class="alertSwal__cTitle">
						  				<h3>Completar perfil</h3>
						  			</div>
					  				<div class="alertSwal__cText">
					  					<p>Para realizar operaciones mayores a <strong class="bold-pricolor">$ ${ammountMax_format}</strong> deberás:</p>
										</div>
										<ul class="alertSwal__cM">
											<li>Completar tu <strong class="bold-pricolor">información de perfil</strong> al 100%.</li>
											<li>Verificar tu identidad.</li>
										</ul>
					  				<div class="alertSwal__cText">
						  		 		<p>Haz click en <strong class="bold-pricolor">validación biométrica</strong> para agregar tus datos.</p>
										</div>
										<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
									</div>`,
					  icon: '',
					  showCancelButton: false,
					  showConfirmButton: false,
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Aceptar',
					  allowOutsideClick: false,
					  allowEscapeKey:false,
					  allowEnterKey:true
					});
					$(document).on('click', '.SwalBtn1', function() {
				    swal.clickConfirm();
				    $("#btn-initConvertPlatform").attr("type", "submit");
						$("#btn-initConvertPlatform").attr("disabled", false);
						$("#btn-initConvertPlatform").removeClass("completeFrm");
						$("#btn-initConvertPlatform").removeClass("sendShowComplete");
						$("#btn-initConvertPlatform").find("div").removeClass("show");
						$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
				  });
				}else if(e.res == "st-less_limit"){
					$("#changecurridcli").val(e.received.cambioval);
					$("#typechangecurridcli").val(e.received.divise);
					$("#prefixcurridcli").val(e.received.prefix);
					$("#quantitycurridcli").val(e.received.quantity);
					$("#type_receivedcli").val(e.received.type_received);
					$("#prefix_receivedcli").val(e.received.prefix_received);
					setTimeout(function(){
						$("#cont-convert-divise").addClass("sendShow");
						$("#cont-complete-divise").addClass("sendShow");
					}, 2000);
					$("#cont-complete-divise").html(`
						<div class="cControlP__cont--containDash--c--cCdivise">
						<div class="cControlP__cont--containDash--c--cCdivise--cTitle">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="ipt-profile-type" value="${e.received.profile_type}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="ipt-profile-name" value="${e.received.profile_name}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="changecurridcli" value="${e.received.cambioval}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="typechangecurridcli" value="${e.received.divise}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefixcurridcli" value="${e.received.prefix}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="quantitycurridcli" value="${e.received.quantity}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="type_receivedcli" value="${e.received.type_received}">
							<input type="hidden" autocomplete="off" spellcheck="false" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" readonly id="prefix_receivedcli" value="${e.received.prefix_received}">
							<h2 class="cControlP__cont--containDash--c--cCdivise--cTitle--title">Completa los datos</h2>
							<p class="cControlP__cont--containDash--c--cCdivise--cTitle--desc">Selecciona el banco de envío y la cuenta donde recibes</p>
						</div>
						<form method="POST" class="cControlP__cont--containDash--c--cCdivise--cF">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl">
								<label for="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--label">¿Desde qué banco nos envía su dinero?</label>
								<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem" id="selListallBanks_CData">
									<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData" id="selListAllBanks--img_CData">
										<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--placeholder">Selecciona un banco</span>
										<img src="" alt="" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--cInputFake_CData--imgbank">
									</div>
									<input type="text" class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--inputVal_CData" readonly id="selListallBanks--input_CData">
									<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--icon_CData" src="./views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
										<img class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--icon_CData" src="./views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
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
					</div>`);
				}else{
					console.log('Lo sentimos, hubo un error al procesar la información.');
				}
			}else{
				console.log('No se envió la respuesta');
			}
		});
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
		$("#btn-initConvertPlatform").removeClass("sendShowComplete");
		$("#btn-initConvertPlatform").find("div").removeClass("show");
		$("#cont-convert-divise").removeClass("hidd_toNextStepTrans");
	}
});
// ------------ CERRAR EL MODAL DE VALIDACIÓN
$(document).on("click", "#icon-closeModalVAccBiometric", function(){$("#mssg-messageAlertMaxAmount").removeClass("show");});
let contValidationBio = document.querySelector("#mssg-messageAlertMaxAmount");
contValidationBio.addEventListener("click", e => {
	if(e.target === contValidationBio){contValidationBio.classList.remove("show");}
});

// ------------ FUNCIÓN - CUENTA REGRESIVA
function startTimer(minTimeout, element) {
  var timer = minTimeout, minutes, seconds;
  const timerUpdate = setInterval(function () {
    minutes = parseInt(timer / 60, 10)
    seconds = parseInt(timer % 60, 10);
    minutes = minutes < 10 ? "" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    element.textContent = minutes + ":" + seconds;
    if (--timer < 0){
      timer = minTimeout;
      element.textContent = "0:00";
    	Swal.fire({
			  title: '',
			  html: `<div class="alertSwal__cIcon">
			  				<svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" version="1.1" viewBox="0 0 700 700">
								 <path d="m350 46.668c128.87 0 233.33 104.46 233.33 233.33s-104.46 233.33-233.33 233.33-233.33-104.46-233.33-233.33 104.46-233.33 233.33-233.33zm0 46.664c-103.09 0-186.67 83.574-186.67 186.67s83.574 186.67 186.67 186.67 186.67-83.574 186.67-186.67-83.574-186.67-186.67-186.67zm0 70c11.965 0 21.828 9.0078 23.176 20.613l0.15625 2.7227v83.16l63.234 63.738c8.375 8.4453 8.9688 21.684 1.8164 30.809l-1.9492 2.1914c-8.4453 8.375-21.684 8.9688-30.809 1.8164l-2.1914-1.9492-70-70.562c-3.6133-3.6406-5.9023-8.3516-6.5664-13.383l-0.19922-3.0508v-92.77c0-12.887 10.445-23.336 23.332-23.336z"/>
								</svg>
			  			</div>
			  			<div class="alertSwal__cTitle">
			  				<h3>¡Se acabó el tiempo!</h3>
			  			</div>
			  			<div class="alertSwal__cText">
				  		 	<p>Los 5 minutos de cambio garantizado han finalizado.</p>
							 	<p>El tipo de cambio se actualizará y puede haber variado.</p>
							</div>
							<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>`,
			  icon: '',
			  showCancelButton: false,
			  showConfirmButton: false,
			  confirmButtonColor: '#3085d6',
			  confirmButtonText: 'Aceptar',
			  allowOutsideClick: false,
			  allowEscapeKey:false,
			  allowEnterKey:true
			});
			$(document).on('click', '.SwalBtn1', function() {
		    swal.clickConfirm();
	      window.onbeforeunload = null;
	      window.location.href = "convert-divise";
		  });
    }
  }, 1000);
}