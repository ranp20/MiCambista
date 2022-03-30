$(function(){
	listCompleteExchange();
});
var idClient = $("#vl-idUserSessFinal").val();

/************************** CONVERTIR A MAYÚSCULA LA PRIMERA LETRA DE UN STRING **************************/
function PrimeraMayuscula(string){
 return string.charAt(0).toUpperCase() + string.slice(1); 
}
/************************** MONTO A ENVIAR Y CUENTA DE TRANSACCIÓN DE MI CAMBISTA, EN BASE A LA OPCIÓN SELECCIONADA **************************/
function listCompleteExchange(){
	$.ajax({
		url: "controllers/c_list-transaction-final.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient }
	}).done( function (res) {
		res.forEach((e) => {

			var pathbank = "./admin/assets/img/transferbanks/"+e.imgbank;
			var typeacc = e.tipocuenta;
			var minustype = typeacc.toLowerCase();
			var typecurr = e.tipomoneda;
			var minuscurr = PrimeraMayuscula(typecurr.toLowerCase());

			$("#vl-mountTotalToSend").text(e.prefijo+" "+e.transferido);
			$("#vl-imgbankTotalToSend").attr("src", pathbank);
			$("#vl-typeaccountTotalToSend").text(minustype);
			$("#vl-typecurrTotalToSend").text(minuscurr);
			$("#vl-numaccountTotalToSend").text(e.cuentaplatform);
			$("#vl-rucaccountTotalToSend").text(e.ruc);
		});
	});
}