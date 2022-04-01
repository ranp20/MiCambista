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
/* CONTROLES DE VISTA */
let inputOne = parseFloat($("#inputval-one").val());
/* IMPRESIÓN */
let valresDollar = inputOne / diviseDollar;
let valresSoles = inputOne * diviseSoles;
/* CON O SIN DECIMALES */
$("#inputval-two").val(valresDollar.toFixed(3));
// ------------ VALORES DE CONVERSIÓN (FIN)
let convertSoles = valresSoles.toFixed(0);

// ------------ JUEGO DE CAMBIO DE DIVISAS(TEXTOS Y VALORES)
$("#btn-Changecurr").on("click", function(){
	
	var typeCurr = $(this).parent().find("#cont-DiviseOne").find("#txtDivise-one").text();

	if(!$(this).hasClass("active")){

		$(this).addClass("active");

		/* DE DÓLARES A SOLES */
		if(typeCurr != "Dólares"){

			$("#inputval-two").val(convertSoles);

			$("#txtDivise-one").text("Dólares");
			$("#txtDivise-two").text("Soles");
			
			$("#spanprefix-one").text("$");
			$("#spanprefix-two").text("S/.");

		/* DE SOLES A DÓLARES */
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