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
// ------------ ESCRIBIR EN EL INPUT DE MONTO RECIBIR
// VALOR - RECEIVED (SE ESTA HACIENDO EL CÁLCULO "MANUALMENTE", ES DECIR SIN USAR ALGUNA FUNCIÓN)
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