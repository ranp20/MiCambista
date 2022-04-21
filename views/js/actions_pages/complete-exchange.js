$(() => {
	listCompleteExchange();
});
var idClient = $("#vl-idUserSessFinal").val();
// ------------ CONVERTIR A MAYÚSCULA LA PRIMERA LETRA DE UN STRING
function firstLetterMayus(string){
 return string.charAt(0).toUpperCase() + string.slice(1); 
}
// ------------ SOLO Y ÚNICAMENTE NÚMEROS
function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)){
    return false;
  }else{
  	return true;
  }
}
// ------------ MONTO A ENVIAR Y CUENTA DE TRANSACCIÓN DE MI CAMBISTA, EN BASE A LA OPCIÓN SELECCIONADA
function listCompleteExchange(){
	$.ajax({
		url: "controllers/c_list-transaction-final.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient }
	}).done((e) => {
		if(e.length != 0 && e.length != null){
			$.each(e, function(i,v){
				var pathbank = "./admin/views/assets/img/transferbanks/"+v.imgbank;
				var typeacc = v.tipocuenta;
				var minustype = typeacc.toLowerCase();
				var typecurr = v.tipomoneda;
				var minuscurr = firstLetterMayus(typecurr.toLowerCase());
				let valOriginal = v.transferido;
      	let valOriginalsplit = valOriginal.split(".");
      	let valOriginalFinal = "";
				let valFormat = "";
				if(valOriginalsplit[1] == undefined || valOriginalsplit[1] == 'undefined' || valOriginalsplit[1] == ""){
					valOriginalFinal = valOriginalsplit[0]+'.00';
				}else	if(valOriginalsplit[1].length < 2){
					valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1]+'0';
				}else{
					valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1];
				}
      	valFormat = valOriginalFinal.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");

				$("#vl-mountTotalToSend").text(v.prefijo+" "+valFormat);
				$("#vl-imgbankTotalToSend").attr("src", pathbank);
				$("#vl-typeaccountTotalToSend").text(minustype);
				$("#vl-typecurrTotalToSend").text(minuscurr);
				$("#vl-numaccountTotalToSend").text(v.cuentaplatform);
				$("#vl-rucaccountTotalToSend").text(v.ruc);
			});
		}else{
			console.log("No hay datos que mostrar");
		}
	});
}
// ------------ EVENTO KEYPRESS - INPUT DE NÚMERO DE OPERACIÓN
$(document).on("keypress", "#v-validNumOperationTransc", function(e){
	var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)){
    $(this).addClass("non-validval");
    $(this).next().text("Solo se permiten números en este control *");
    return false;
  }else{
  	$(this).removeClass("non-validval");
  	$(this).next().text("");
  	return true;
  }
});
// ------------ HOVER EN EL SVG - EJEMPLO DE NÚMERO DE OPERACIÓN
$("svg[data-showModalHov='transfer_numOpBankExample']").hover(function(e){
	e.preventDefault();
  var element = $(this);
  var modalContent = element.next();

  timeout = setTimeout(function() {
		modalContent.html(`
			<img src="views/assets/img/bank/examples/bank_transfer-interbank.png" alt="example-modal-bankoperation" width="100" height="100">
		`);
  }, 200);

}, function(){
  clearTimeout(timeout);
  $(this).next().html("");
});