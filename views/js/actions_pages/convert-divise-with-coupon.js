// ------------ VARIABLES GLOBALES PARA CONVERSIÓN
var rates_two = "";
var namecurr_two = ['Soles', 'Dólares'];
var prefixs_two = ['S/.', '$'];

var current_USD_two = "";
var current_PEN_two = "";

var result_two = 0;

//const btnconvert = document.querySelector("#convert_divise");
var name_currsend = document.querySelector("#name_current_send");
var name_currreceived = document.querySelector("#name_current_received");
//var ipt_amount_send_two = document.querySelector("#val_amount_send");
//var ipt_amount_received_two = document.querySelector("#val_amount_received");
//var currSpanPrefixSend = ipt_amount_send_two.previousElementSibling.textContent;
//var currSpanPrefixReceived =  ipt_amount_received_two.previousElementSibling.textContent;
var amountMaxReceived = "1000.00";

// ------------ CUPÓN DE DESCUENTO
$(document).on("click", "#btn-coDescRatePercent", function(e){
	e.preventDefault();
	let frmValidCoupon = $("#v-frmCouponDescStrValid").val();
	let vl_valuesRatesAll = $("#vl-valuesRatesAll");
	let cnt_ValidCouponConvert = $("#cnt-ValidCouponConvert");
	let cnt_InputCouponcontrol = $(".c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl");

	if(frmValidCoupon != "" && frmValidCoupon != null && frmValidCoupon != "null" && frmValidCoupon != undefined){
		if (frmValidCoupon != 0 && frmValidCoupon != "0"){
		
		let formData = new FormData();
		formData.append("codecoupon", frmValidCoupon);
		$.ajax({
			url: "controllers/c_list_check_coupon.php",
			method: "POST",
			data: formData,
	    contentType: false,
	    cache: false,
	    processData: false,
		}).done(function(e){
			if(e == "[]"){
				Swal.fire({
	        title: 'Error!',
	        html: `<span class='font-w-300'>El cupón ingresado no es válido.</span>`,
	        icon: 'error',
	        confirmButtonText: 'Aceptar'
	      });
			}else{
				var r = JSON.parse(e);
				var coupon = (r[0].cupon).toUpperCase();
				var val_buy_at = r[0].buy_price;
				var val_sell_at = r[0].sell_price;
				
				// SETEO DE VARIABLES
			  rates_two = [val_buy_at, val_sell_at];
				current_USD_two = rates_two[0];
				current_PEN_two = rates_two[1];


				// ------------ CAMBIAR EL NOMBRE DE LOS IDS DE CONVERSIÓN
				$("#convert_divise").attr("id", "convert_divise_coupon"); // BUTTON ROTATE
				$("#val_amount_send").attr("id", "val_amount_send_coupon"); // INPUT SEND
				$("#val_amount_received").attr("id", "val_amount_received_coupon"); // INPUT RECEIVED

				var ipt_amount_send_two = document.querySelector("#val_amount_send_coupon");
				var ipt_amount_received_two = document.querySelector("#val_amount_received_coupon");

				// ------------ REMOVER EL INPUT "AGREGAR" CUPÓN
				cnt_InputCouponcontrol.remove();
				// ------------ MOSTRAR - TARIFA ANTERIOR
				vl_valuesRatesAll.prepend(`
					<div class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesBeforeRates">
						<p class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesBeforeRates__vRateVariable">
							<span>Antes: </span>
							<span>${current_USD}</span>
						</p>
						<p class="c-convert__cFrmConvert__mxFrmC__cValRatesAll__cValuesBeforeRates__vRateVariable">
							<span>Antes: </span>
							<span>${current_PEN}</span>
						</p>
					</div>
				`);
				// ------------ MOSTRAR EL NOMBRE DEL CUPÓN
				cnt_ValidCouponConvert.append(`
					<div id="c_valYValidCouponIpt">
						<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cMessageTitle">
							<span>¡Genial! Has activado el cupón</span>
						</div>
						<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cNameOfValidCoupon">
							<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cNameOfValidCoupon__cFkInputCoupon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m594.88 229.38c6.9062 0 12.508-5.6016 12.508-12.508l-0.003907-91.949c0-6.9062-5.6016-12.508-12.508-12.508h-489.75c-6.9062 0-12.508 5.6016-12.508 12.508v91.949c0 6.9062 5.6016 12.508 12.508 12.508 27.914 0 50.621 22.711 50.621 50.621 0 27.914-22.711 50.621-50.621 50.621-6.9062 0-12.508 5.6016-12.508 12.508v91.949c0 6.9062 5.6016 12.508 12.508 12.508h165.09 0.011718 0.011719 324.65c6.9062 0 12.508-5.6016 12.508-12.508v-91.957c0-6.9062-5.6016-12.508-12.508-12.508-27.914 0-50.621-22.711-50.621-50.621 0-27.91 22.703-50.613 50.617-50.613zm-12.504 125.22v67.977h-299.65v-23.898c0-6.9062-5.6016-12.508-12.508-12.508s-12.508 5.6016-12.508 12.508v23.898h-140.08v-67.977c35.773-5.9805 63.125-37.152 63.125-74.598s-27.352-68.617-63.125-74.598v-67.977h140.09v23.898c0 6.9062 5.6016 12.508 12.508 12.508s12.508-5.6016 12.508-12.508v-23.898h299.65v67.977c-35.781 5.9805-63.133 37.152-63.133 74.598s27.352 68.617 63.125 74.598zm-299.65-47.176v36.398c0 6.9062-5.6016 12.508-12.508 12.508s-12.508-5.6016-12.508-12.508v-36.398c0-6.9062 5.6016-12.508 12.508-12.508 6.9102 0 12.508 5.6016 12.508 12.508zm0-91.25v36.398c0 6.9062-5.6016 12.508-12.508 12.508s-12.508-5.6016-12.508-12.508v-36.398c0-6.9062 5.6016-12.508 12.508-12.508 6.9102 0 12.508 5.6016 12.508 12.508z"/></g></svg>
								<span>${coupon}</span>
								<svg xmlns="http://www.w3.org/2000/svg" id="btn-closeFkIptValidCoupon" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg">
							  <path d="m412.72 282.8 179.76 179.76c16.801 16.801 16.801 43.121 0 59.922s-43.121 16.801-59.922 0l-179.76-179.77-179.76 179.76c-16.801 16.801-43.121 16.801-59.922 0-16.801-16.801-16.801-43.121 0-59.922l179.76-179.76-179.76-179.76c-16.801-16.801-16.801-43.121 0-59.922 16.801-16.801 43.121-16.801 59.922 0l179.76 179.76 179.75-179.76c16.801-16.801 43.121-16.801 59.922 0 16.801 16.801 16.801 43.121 0 59.922z" fill-rule="evenodd"/></g></svg>
							</div>
							<span class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cNameOfValidCoupon__cMssgValidRangCoupon">Solo aplicable para montos mayores a $ 5000.00</span>
						</div>
					</div>
				`);

				// COLOCAR CONVERSIÓN DE EJEMPLO AL INICIO
				var iptvalsend_example_one = $("#val_amount_send_coupon").val();
				var iptvalsend_example_two = iptvalsend_example_one.toString().split(",");
				var valinit_example = iptvalsend_example_two[0]+iptvalsend_example_two[1];

				var descomp_valinitexample = valinit_example.toString().split('.');
				var descomp_valinitexample_final = "";
				if(descomp_valinitexample[1] == undefined || descomp_valinitexample[1] == 'undefined' || descomp_valinitexample[1] == ""){
					descomp_valinitexample_final = descomp_valinitexample[0]+'.00';
				}else	if(descomp_valinitexample[1].length < 2){
					descomp_valinitexample_final = descomp_valinitexample[0]+"."+descomp_valinitexample[1]+'0';
				}else{
					descomp_valinitexample_final = descomp_valinitexample[0]+"."+descomp_valinitexample[1];
				}
				document.querySelector("#val_amount_send_coupon").value = descomp_valinitexample_final.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				var ipt_amount_received_two = document.querySelector("#val_amount_received_coupon");
				var currSpanPrefixSend = ipt_amount_send_two.previousElementSibling.textContent;
				var currSpanPrefixReceived =  ipt_amount_received_two.previousElementSibling.textContent;
				var first_calcreceived = convert_coupon(valinit_example, currSpanPrefixSend, currSpanPrefixReceived);
				var second_formatreceived = first_calcreceived.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				var thirty_formatreceived = second_formatreceived.toString().split(".");
				var thirty_formatreceived_final = "";
				if(thirty_formatreceived[1] == undefined || thirty_formatreceived[1] == 'undefined' || thirty_formatreceived[1] == ""){
					thirty_formatreceived_final = thirty_formatreceived[0]+'.00';
				}else	if(thirty_formatreceived[1].length < 2){
					thirty_formatreceived_final = thirty_formatreceived[0]+"."+thirty_formatreceived[1]+'0';
				}else{
					thirty_formatreceived_final = thirty_formatreceived[0]+"."+thirty_formatreceived[1];
				}
				ipt_amount_received_two.value = thirty_formatreceived_final;

				// COLOCAR VALOR DEL TARIFARIO
		  	$("#refval_buy_at").html(`<span>S/. </span><span id='v-refRateBuyCurrent'>${val_buy_at}</span>`);
		  	$("#refval_sell_at").html(`<span>S/. </span><span id='v-refRateSellCurrent'>${val_sell_at}</span>`);
			}
		});
		}else{
			$("#m-couponMessageErr").text("El formato de cupón no es válido *");	
		}
	}else{
		$("#m-couponMessageErr").text("El campo no debe estar vacío *");
	}
});
// ------------ REMOVER EL CUPÓN DE DESCUENTO
$(document).on("click", "#btn-closeFkIptValidCoupon", function(e){
	e.preventDefault();
	window.onbeforeunload = null;
  window.location.href = "convert-divise";
/*
	let cnt_ValidCouponConvert = $("#cnt-ValidCouponConvert");
	let cnt_InputCouponcontrol = $(".c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl");
	let vl_valuesRatesAll = $("#vl-valuesRatesAll");
	vl_valuesRatesAll.children("div")[0].remove();
	$("#c_valYValidCouponIpt").remove();
	// ------------ MOSTRAR EL INPUT PARA AGREGAR CUPÓN
	cnt_ValidCouponConvert.after(function(){
		cnt_InputCouponcontrol.remove();
		return `
			<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl">
				<div class="c-convert__cFrmConvert__mxFrmC__cFrm__cValidCoupon__cControl__iptRsltCoupon">
					<input type="text" name="v-frmCouponDescStrValid" id="v-frmCouponDescStrValid" maxlength="35" placeholder="Ingrese su cupón aquí">
					<button type="button" id="btn-coDescRatePercent">Agregar</button>
				</div>
				<span id="m-couponMessageErr"></span>
			</div>
		`;
	});
	*/
});

// ------------ FUNCTION - CONVERT DIVISE
function convert_coupon(amount, prefixFrom, prefixtTo){
	if(prefixFrom == "$" && prefixtTo == "S/."){
		result_two = amount * current_USD_two;
	}else if(prefixFrom == "S/." && prefixtTo == "$"){
		result_two = amount / current_PEN_two;
	}else{
		alert("Valor inválido");
	}
	return result_two;
}
// ------------ BOTÓN - CONVERSIÓN DE DIVISA
$(document).on("click", "#convert_divise_coupon", function(e){
	e.preventDefault();
	var ipt_amount_send_two = document.querySelector("#val_amount_send_coupon");
	var ipt_amount_received_two = document.querySelector("#val_amount_received_coupon");
	//$(this).toggleClass("active");
	if($(this).hasClass("active")){
		name_currsend.children[0].textContent = namecurr_two[1];
		name_currreceived.children[0].textContent = namecurr_two[0];
		ipt_amount_send_two.previousElementSibling.textContent = prefixs_two[1];
		ipt_amount_received_two.previousElementSibling.textContent = prefixs_two[0];
		//ipt_amount_send_two.value = ipt_amount_received_two.value;
		// QUITAR COMAS PARA EL CÁLCULO
		var val = ipt_amount_send_two.value;
		let val_split = "";
		let val_formatfinal = "";
		var valwithoutcomas = val.replace(/,/g,'');
		//var amountcalc_received = convert_coupon(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
		var amountcalc_received = convert_coupon(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
		var amountformat_received = amountcalc_received.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		val_split = amountformat_received.toString().split(".");
		if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
			val_formatfinal = val_split[0]+'.00';
		}else	if(val_split[1].length < 2){
			val_formatfinal = val_split[0]+"."+val_split[1]+'0';
		}else{
			val_formatfinal = val_split[0]+"."+val_split[1];
		}
		ipt_amount_received_two.value = val_formatfinal;
		//console.log(val_formatfinal);
	}else{
		name_currsend.children[0].textContent = namecurr_two[0];
		name_currreceived.children[0].textContent = namecurr_two[1];
		ipt_amount_send_two.previousElementSibling.textContent = prefixs_two[0];
		ipt_amount_received_two.previousElementSibling.textContent = prefixs_two[1];
		//ipt_amount_received_two.value = ipt_amount_send_two.value;
		// QUITAR COMAS PARA EL CÁLCULO

		var val = ipt_amount_send_two.value;
		let val_split = "";
		let val_formatfinal = "";
		var valwithoutcomas = val.replace(/,/g,'');
		//var amountcalc_send = convert_coupon(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
		var amountcalc_send = convert_coupon(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
		var amountformat_send = amountcalc_send.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		//ipt_amount_send_two.value = amountformat_send;
		val_split = amountformat_send.toString().split(".");
		if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
			val_formatfinal = val_split[0]+'.00';
		}else	if(val_split[1].length < 2){
			val_formatfinal = val_split[0]+"."+val_split[1]+'0';
		}else{
			val_formatfinal = val_split[0]+"."+val_split[1];
		}
		ipt_amount_received_two.value = amountformat_send;
		//console.log(amountformat_send);
	}
});
// btnconvert.addEventListener("click", function(e){
// });
// ------------ ESCRIBIR EN EL INPUT DE MONTO DE ENVÍO
$(document).on("keyup", "#val_amount_send_coupon", function(e){
	var ipt_amount_send_two = document.querySelector("#val_amount_send_coupon");
	var ipt_amount_received_two = document.querySelector("#val_amount_received_coupon");
	var currSpanPrefixSend = ipt_amount_send_two.previousElementSibling.textContent;
	var currSpanPrefixReceived =  ipt_amount_received_two.previousElementSibling.textContent;
	if (e.which >= 37 && e.which <= 40) return;
	var val = e.target.value;
	var target = e.target;
  var position = target.selectionStart;
  this.value = val.replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	// QUITAR COMAS PARA EL CÁLCULO
	var valwithoutcomas = val.replace(/,/g,'');
	//console.log(valwithoutcomas);
	var amountcalc_received = convert_coupon(valwithoutcomas, currSpanPrefixSend, currSpanPrefixReceived);
	// console.log("De: "+currSpanPrefixSend+" a: "+currSpanPrefixReceived);
	// console.log(amountcalc_received);
	var amountformat_received = amountcalc_received.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	target.selectionEnd = position;
	let val_split = "";
	let val_formatfinal = "";
	val_split = amountformat_received.toString().split(".");
	if(val_split[1] == undefined || val_split[1] == 'undefined' || val_split[1] == ""){
		val_formatfinal = val_split[0]+'.00';
	}else	if(val_split[1].length < 2){
		val_formatfinal = val_split[0]+"."+val_split[1]+'0';
	}else{
		val_formatfinal = val_split[0]+"."+val_split[1];
	}
	ipt_amount_received_two.value = val_formatfinal;

	if(val != "" && val != 0 && val != 0.00 && val != null && ipt_amount_received_two.value != "" && ipt_amount_received_two.value != 0 && ipt_amount_received_two.value != 0.00 && ipt_amount_received_two.value != null){
		$("#btn-initConvertPlatform").attr("type", "submit");
		$("#btn-initConvertPlatform").removeAttr("disabled");
		$("#btn-initConvertPlatform").addClass("completeFrm");
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
	}
});
/*ipt_amount_send_two.addEventListener("keyup", function(e){
});*/
// ------------ ESCRIBIR EN EL INPUT DE MONTO RECIBIR (SE ESTA HACIENDO EL CÁLCULO "MANUALMENTE", ES DECIR SIN USAR ALGUNA FUNCIÓN)
$(document).on("click", "#val_amount_received_coupon", function(e){
	var ipt_amount_send_two = document.querySelector("#val_amount_send_coupon");
	var ipt_amount_received_two = document.querySelector("#val_amount_received_coupon");
	let result_calc = "";
	var currSpanPrefixSend = ipt_amount_send_two.previousElementSibling.textContent;
	var currSpanPrefixReceived =  ipt_amount_received_two.previousElementSibling.textContent;
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
		amountcalc_send = valwithoutcomas * current_PEN_two;
	}else if(currSpanPrefixReceived == "S/." && currSpanPrefixSend == "$"){
		amountcalc_send = valwithoutcomas / current_USD_two;
	}else{
		alert("Valor inválido");
	}
	//console.log(amountcalc_send);
	//var amountcalc_send = convert_coupon(valwithoutcomas, currSpanPrefixReceived, currSpanPrefixSend);
	//result_calc = valwithoutcomas * current_PEN_two;
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
	ipt_amount_send_two.value = val_formatfinal;
	
	if(val != "" && val != 0 && val != 0.00 && val != null && ipt_amount_send_two.value != "" && ipt_amount_send_two.value != 0 && ipt_amount_send_two.value != 0.00 && ipt_amount_send_two.value != null){
		$("#btn-initConvertPlatform").attr("type", "submit");
		$("#btn-initConvertPlatform").removeAttr("disabled");
		$("#btn-initConvertPlatform").addClass("completeFrm");
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
	}
});
/*ipt_amount_received_two.addEventListener("keyup", function(e){
});*/