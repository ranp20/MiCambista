$(() => {
	list_rates_convert_divise();
});
// ------------ SEPARADOR DECIMAL DE MILLAR
var putThousandsSeparators;
putThousandsSeparators = function(value, sep) {
  if (sep == null) {
    sep = ',';
  }
  // check if it needs formatting
  if (value.toString() === value.toLocaleString()) {
    // split decimals
    var parts = value.toString().split('.')
    // format whole numbers
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, sep);
    // put them back together
    value = parts[1] ? parts.join('.') : parts[0];
  } else {
    value = value.toLocaleString();
  }
  return value;
};
// ------------ FUNCIÓN - CUENTA REGRESIVA
function startTimer(minTimeout, element) {
  var timer = minTimeout, minutes, seconds;
  const timerUpdate = setInterval(function () {
    minutes = parseInt(timer / 60, 10)
    seconds = parseInt(timer % 60, 10);
    minutes = minutes < 10 ? "" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    element.textContent = minutes + ":" + seconds;
    if (--timer < 0) {
      timer = minTimeout;
      window.location.href = "convert-divise";
    }
  }, 1000);
}
// ------------ LISTADO DE TARIFARIO
function list_rates_convert_divise(){
	var minTimeout = 60 * 5;
  var element = document.querySelector('#countdownRates');
  startTimer(minTimeout, element);

	$.ajax({
    url: "./controllers/c_list-rates-convert-divise.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done((e) => {
    var res = JSON.parse(e);
    var val_buy_at = res[0].buy_at;
    var val_sell_at = res[0].sell_at;
    var c_sell_at_one = putThousandsSeparators(res[0].sell_at);
    var c_sell_at_two = c_sell_at_one.toString().split('.');
    var c_sell_at_three = "";
    if(c_sell_at_two[1].length > 3){
    	c_sell_at_three = c_sell_at_two[0] + "," + c_sell_at_two[1].slice(0, 3) + "." + c_sell_at_two[1].slice(-1);
    }
    var tmp_rates = "";
    if(res.length == 0){
    	console.log("No hay datos");
    }else{
    	$("#refval_buy_at").html(`<span>S/. </span><span id='v-refRateBuyCurrent'>${val_buy_at}</span>`);
    	$("#refval_sell_at").html(`<span>S/. </span><span id='v-refRateSellCurrent'>${val_sell_at}</span>`);
    	$("#val-amount_send").val(c_sell_at_three);
    	$("#val-amount_received").val(c_sell_at_three);
    }
  });
}
// ------------ BOTÓN - CONVERSIÓN DE DIVISA
$(document).on("click", "#btn-ChangeRotaeDivise", function(e){
	e.preventDefault();
	const btnRotateDivise = $(this);
	btnRotateDivise.toggleClass("active");
});
// ------------ ESCRIBIR EN EL INPUT DE MONTO DE ENVÍO
$(document).on("keyup", "#val-amount_send", function(e){
	var thisval = e.target.value;
	var valreceived = $("#val-amount_received").val();
	//console.log(thisval);
	if(thisval != "" && thisval != 0 && thisval != 0.00 && thisval != null && valreceived != "" && valreceived != 0 && valreceived != 0.00 && valreceived != null){
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
$(document).on("keyup", "#val-amount_received", function(e){
	var thisval = e.target.value;
	var valsend = $("#val-amount_send").val();
	//console.log(thisval);
	if(thisval != "" && thisval != 0 && thisval != 0.00 && thisval != null && valsend != "" && valsend != 0 && valsend != 0.00 && valsend != null){
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

	if($("#val-amount_send").val() != "" && $("#val-amount_send").val() != 0 && $("#val-amount_send").val() != 0.00 &&
		 $("#val-amount_received").val() != "" && $("#val-amount_received").val() != 0 && $("#val-amount_received").val() != 0.00){

		var typeCURR = $(this).parent().parent().find("#txtDivise-one").text();
		var quantityCURR = $("#val-amount_send").val().replace(/[$,]/g,'');
		var prefixCURR = $(this).parent().parent().find("#spanprefix-one").text();
		var type_received = $(this).parent().parent().find("#txtDivise-two").text();
		var prefix_received = $(this).parent().parent().find("#spanprefix-two").text();
		
		var valcambiocurr;
		if(typeCURR == "Soles"){
			valcambiocurr = $("#v-refRateBuyCurrent").text();
		}else{
			valcambiocurr = $("#v-refRateSellCurrent").text();
		}
		var formData = new FormData();

		formData.append("cambioval", valcambiocurr);
		formData.append("prefix", prefixCURR);
		formData.append("val_type", typeCURR);
		formData.append("val_send", quantityCURR);
		formData.append("type_received", type_received);
		formData.append("prefix_received", prefix_received);

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
				$("#changecurridcli").val(e.cambioval);
				$("#prefixcurridcli").val(e.prefix);
				$("#typechangecurridcli").val(e.divise);
				$("#quantitycurridcli").val(e.quantity);
				$("#type_receivedcli").val(e.type_received);
				$("#prefix_receivedcli").val(e.prefix_received);
				setTimeout(function(){
					$("#cont-convert-divise").addClass("sendShow");
					$("#cont-complete-divise").addClass("sendShow");
				}, 2000);
			}else{
				console.log('No se envió la respuesta');
			}
		});
	}else{
		$("#btn-initConvertPlatform").attr("type", "button");
		$("#btn-initConvertPlatform").attr("disabled", "disabled");
		$("#btn-initConvertPlatform").removeClass("completeFrm");
	}
});
/*
function convertDivise(amount, convertFrom, convertTo){

}
*/