/*
// ------------ DEVOLVER LOS VALORES DECIMALES SIN REDONDEO
function twodecimals(n) {
  let t = n.toString();
  let regex = /(\d*.\d{0,2})/;
  return t.match(regex)[0];
}
function filter(__val__){
  var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
  if(preg.test(__val__) === true){
      return true;
  }else{
     return false;
  } 
}
// ------------ VALIDAR QUE SE INGRESEN SOLO NUMEROS
// $("#inputval-one").on({
//     "focus": function (event) {
//         $(event.target).select();
//     },
//     "keyup": function (event) {
//         $(event.target).val(function (index, value ) {
//             return value.replace(/\D/g, "")
//                         //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
//                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
//         });
//     }
// });
// $("#inputval-two").on({
//     "focus": function (event) {
//         $(event.target).select();
//     },
//     "keyup": function (event) {
//         $(event.target).val(function (index, value ) {
//             return value.replace(/\D/g, "")
//                         //.replace(/([0-9])([0-9]{2})$/, '$1.$2')
//                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
//         });
//     }
// });

$("#inputval-one").on("keyup", function(){
	var convertDollar = new Intl.NumberFormat('en-US').format($(this).val());
	$("#inputval-two").val(convertDollar);
});

// $("#inputval-one").on("keypress", function(evt){
// 	var key = window.Event ? evt.which : evt.keyCode;    
//   var chark = String.fromCharCode(key);
//   var tempValue = $(this).val()+chark;
//   if(key >= 48 && key <= 57){
//     if(filter(tempValue)=== false){
//       return false;
//     }else{       
//       return true;
//     }
//   }else{
//     if(key == 8 || key == 13 || key == 0) {     
//       return true;              
//     }else if(key == 46){
//       if(filter(tempValue)=== false){
//           return false;
//       }else{       
//           return true;
//       }
//     }else{
//       return false;
//     }
//   }	
// });
// $("#inputval-two").on("keypress", function(evt){
// 	var key = window.Event ? evt.which : evt.keyCode;    
//   var chark = String.fromCharCode(key);
//   var tempValue = $(this).val()+chark;
//   if(key >= 48 && key <= 57){
//     if(filter(tempValue)=== false){
//       return false;
//     }else{       
//       return true;
//     }
//   }else{
//     if(key == 8 || key == 13 || key == 0) {     
//       return true;              
//     }else if(key == 46){
//       if(filter(tempValue)=== false){
//           return false;
//       }else{       
//           return true;
//       }
//     }else{
//       return false;
//     }
//   }
// });

// ------------ VALOR DE INICIO DE LA CONVERSIÓN
monto = parseFloat($("#refer_solesdivise").text()).toFixed(3);
//montoformat = monto.replace(/[$.]/g,'');
$("#inputval-one").val(monto);
// ------------ VALORES DE CONVERSIÓN (INICIO)
let diviseDollar = parseFloat($("#refer_solesdivise").text());
let diviseSoles = parseFloat($("#refer_dollardivise").text());
// ------------ CONTROLES DE VISTA 
let inputOne = parseFloat($("#inputval-one").val());
// ------------ IMPRESIÓN 
let valresDollar = inputOne / diviseDollar;
let valresSoles = inputOne * diviseSoles;
// ------------ CON O SIN DECIMALES 
$("#inputval-two").val(valresDollar.toFixed(3));
// ------------ VALORES DE CONVERSIÓN (FIN)
let convertSoles = valresSoles.toFixed(0);

// ------------ JUEGO DE CAMBIO DE DIVISAS(TEXTOS Y VALORES)
$("#btn-Changecurr").on("click", function(){
	
	var typeCurr = $(this).parent().find("#cont-DiviseOne").find("#txtDivise-one").text();

	if(!$(this).hasClass("active")){

		$(this).addClass("active");

		// ------------ DE DÓLARES A SOLES
		if(typeCurr != "Dólares"){

			$("#inputval-two").val(convertSoles);

			$("#txtDivise-one").text("Dólares");
			$("#txtDivise-two").text("Soles");
			
			$("#spanprefix-one").text("$");
			$("#spanprefix-two").text("S/.");

		// ------------ DE SOLES A DÓLARES
		}else{

			$("#inputval-two").val(valresDollar);

			$(this).removeClass("active");
			$("#txtDivise-one").text("Soles");
			$("#txtDivise-two").text("Dólares");

			$("#spanprefix-one").text("S/.");
			$("#spanprefix-two").text("$");
		}		
	}else{
		
		$(this).removeClass("active");
		
		if(typeCurr != "Dólares"){
			let valresSoles = inputOne * diviseSoles;
			let convertSoles = valresSoles.toFixed(0);
			$("#inputval-two").val(convertSoles);
			
			$("#txtDivise-one").text("Dólares");
			$("#txtDivise-two").text("Soles");
			
			$("#spanprefix-one").text("$");
			$("#spanprefix-two").text("S/.");
		}else{

			$("#inputval-two").val(valresDollar);

			$("#txtDivise-one").text("Soles");
			$("#txtDivise-two").text("Dólares");

			$("#spanprefix-one").text("S/.");
			$("#spanprefix-two").text("$");
		}		
	}
});

// ------------ CONVERTIR-ENVIAR SIEMPRE EL PRIMER VALOR - PRIMER INPUT
$("#inputval-one").on("keyup input change", function(e){
	var typecurrency = $(this).parent().parent().find("#txtDivise-one").text();
	var valueDollar = parseFloat($("#refer_solesdivise").text());
	var valueSoles = parseFloat($("#refer_dollardivise").text());
	var firstinput = parseFloat($(this).val());

	// ------------ CONVERTIR A FORMATO DE MONEDA - DÓLARES
	var formatDollar = new Intl.NumberFormat('en-US').format($(this).val());
	var changeDollar = formatDollar / valueDollar;
	var changeSoles = firstinput * valueSoles;
	
	if(typecurrency == "Soles"){
		$("#inputval-two").val(changeDollar);
	}else{
		$("#inputval-two").val(changeSoles);
	}

	// ------------ VALIDAR SI ESTÁ VACÍO EL INPUT
	if($(this).val() == ""){
		$("#inputval-two").val(0);
	}else{
		e.target.value;
	}

});
// ------------ CONVERTIR EL SEGUNDO VALOR
$("#inputval-two").on("keyup input change", function(){
	var typecurrency = $(this).parent().parent().find("#txtDivise-two").text();
	var valueDollar = parseFloat($("#refer_solesdivise").text());
	var valueSoles = parseFloat($("#refer_dollardivise").text());
	var secondinput = parseFloat($(this).val());

	var changeDollar = secondinput / valueSoles;
	var changeSoles = secondinput * valueDollar;
	if(typecurrency == "Dólares"){
		$("#inputval-one").val(changeSoles);
	}else{
		$("#inputval-one").val(changeDollar);
	}

	// ------------ VALIDAR SI ESTÁ VACÍO EL INPUT
	if($(this).val() == ""){
		$("#inputval-one").val(0);
	}else{
		e.target.value;
	}
});
// ------------ CONVESIÓN DE CAMBIO - JQUERY
$(document).on("click", "#btn-initConvertPlatform", function(e){
	e.preventDefault();
	$(this).attr("disabled","disabled");
	$(this).addClass("sendShowComplete");
	$(this).find("div").addClass("show");

	var typeCURR = $(this).parent().parent().find("#txtDivise-one").text();
	var quantityCURR = parseFloat($("#inputval-one").val());
	var prefixCURR = $(this).parent().parent().find("#spanprefix-one").text();
	var type_received = $(this).parent().parent().find("#txtDivise-two").text();
	var prefix_received = $(this).parent().parent().find("#spanprefix-two").text();
	
	var valcambiocurr;
	if(typeCURR == "Soles"){
		valcambiocurr = $("#refer_solesdivise").text();
	}else{
		valcambiocurr = $("#refer_dollardivise").text();
	}

	var formData = new FormData();

	formData.append("cambioval", valcambiocurr);
	formData.append("prefix", prefixCURR);
	formData.append("val_type", typeCURR);
	formData.append("val_send", quantityCURR.toFixed(2));
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
	}).done(function(res){
		if(res != ""){
			$("#changecurridcli").val(res.cambioval);
			$("#prefixcurridcli").val(res.prefix);
			$("#typechangecurridcli").val(res.divise);
			$("#quantitycurridcli").val(res.quantity);
			$("#type_receivedcli").val(res.type_received);
			$("#prefix_receivedcli").val(res.prefix_received);
			setTimeout(function(){
				$("#cont-convert-divise").addClass("sendShow");
				$("#cont-complete-divise").addClass("sendShow");
			}, 2000);
		}else{
			console.log('No se envió la respuesta');
		}
	});
});
*/
/*
(function() {

  // ------------ Obtenemos la definicion de la funcion original
  let prop = Object.getOwnPropertyDescriptor(Intl.NumberFormat.prototype, 'format');

  // ------------ Sobrescribimos el método "format"
  Object.defineProperty(Intl.NumberFormat.prototype, 'format', {
    get: function() {
      return function(value) {
        let fn = prop.get.call(this), // Recuperamos la funcion "formateadora" original 
          opts = this.resolvedOptions(); // Obtenemos las opciones de "formateo"
        
        // Solo cambiamos el formateo cuando es moneda en español y el numero es >= 1.000 o menor a 10.000
        if (opts.style == 'currency' && opts.locale.substr(0, 2) == 'es' && opts.numberingSystem == 'latn' && value >= 1000 && value < 10000) {
          let num = fn(10000), // -> [pre]10[sep]000[sub]
            pre = num.substr(0, num.indexOf('10')),
            sep = num.substr(num.indexOf('10') + 2, 1),
            sub = num.substr(num.indexOf('000') + 3);
          num = value.toString();
          return pre + num.slice(0, 1) + sep + num.slice(1) + sub;
        }
        // Sino devolvemos el número formateado normalmente
        return fn(value);
      };
    },
  });
})();
*/
/*
let formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD'
});
// ------------ ESCRIBIR EN EL INPUT DE ENVÍO
$(document).on("keyup", "#val-amount_send", function(e){
	var valformat = 12400;
	const valformat = formatter.formatToParts(232).filter((p) => p.type !== 'currency').map((p) => p.value).join('').trim();
	console.log(valformat);
	//$(this).val(formatter.format(valformat).replace(/ [$]/g,''));
	//console.log(formatter.format(valformat).replace(/ [$]/g,''));
	//return pre + e.target.value.slice(0, 1) + sep + e.target.value.slice(1).replace(".", ",") + sub;
});
*/
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
    var convert_sell_at = putThousandsSeparators(res[0].sell_at);
    var tmp_rates = "";
    if(res.length == 0){
    	console.log("No hay datos");
    }else{
    	$("#refval_buy_at").text("S/. " + val_buy_at);
    	$("#refval_sell_at").text("S/. " + val_sell_at);
    	$("#val-amount_send").val(convert_sell_at);
    }
  });
}
// ------------ BOTÓN - CONVERSIÓN DE DIVISA
$(document).on("click", "#btn-ChangeRotaeDivise", function(e){
	e.preventDefault();
	const btnRotateDivise = $(this);
	btnRotateDivise.toggleClass("active");
});
// ------------ ESCRIBIR EN EL INPUT DE ENVÍO
$(document).on("keyup", "#val-amount_send", function(e){
	var thisval = e.target.value;
	console.log(thisval);
});
// ------------ CONVESIÓN DE CAMBIO - HACIA EL PASO 2
$(document).on("click", "#btn-initConvertPlatform", function(e){
	e.preventDefault();
	$(this).attr("disabled","disabled");
	$(this).addClass("sendShowComplete");
	$(this).find("div").addClass("show");

	var typeCURR = $(this).parent().parent().find("#txtDivise-one").text();
	var quantityCURR = parseFloat($("#inputval-one").val());
	var prefixCURR = $(this).parent().parent().find("#spanprefix-one").text();
	var type_received = $(this).parent().parent().find("#txtDivise-two").text();
	var prefix_received = $(this).parent().parent().find("#spanprefix-two").text();
	
	var valcambiocurr;
	if(typeCURR == "Soles"){
		valcambiocurr = $("#refer_solesdivise").text();
	}else{
		valcambiocurr = $("#refer_dollardivise").text();
	}

	var formData = new FormData();

	formData.append("cambioval", valcambiocurr);
	formData.append("prefix", prefixCURR);
	formData.append("val_type", typeCURR);
	formData.append("val_send", quantityCURR.toFixed(2));
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
	}).done(function(res){
		if(res != ""){
			$("#changecurridcli").val(res.cambioval);
			$("#prefixcurridcli").val(res.prefix);
			$("#typechangecurridcli").val(res.divise);
			$("#quantitycurridcli").val(res.quantity);
			$("#type_receivedcli").val(res.type_received);
			$("#prefix_receivedcli").val(res.prefix_received);
			setTimeout(function(){
				$("#cont-convert-divise").addClass("sendShow");
				$("#cont-complete-divise").addClass("sendShow");
			}, 2000);
		}else{
			console.log('No se envió la respuesta');
		}
	});
});