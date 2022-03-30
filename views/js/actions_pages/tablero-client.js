$(function(){
	listTransactions();
})
var idClient = $("#input-idClientValListTransac").val();
/************************** TROZO DE VANILLA JS **************************/
((d) => {
	/************************** CERRAR LA VENTANA - DETALLE DE TRANSACCIÓN **************************/
	d.querySelector("#btnCloseTransacRight").addEventListener("click", function(){
		d.querySelector(".cListDetailsTransactions").classList.remove("show");
		d.querySelector(".cListDetailsTransactions--contDetails").classList.remove("show");
	});
	let contsidebarRight = document.querySelector('.cListDetailsTransactions');
	contsidebarRight.addEventListener('click', e => {
		if(e.target === contsidebarRight)	contsidebarRight.classList.remove('show');
	});
})(document);
/************************** LISTADO DE TRANSACCIONES **************************/
function listTransactions(){
	$.ajax({
		url: "controllers/c_list-all-transactions.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient }
	}).done( function (res) {
		var template = "";

		if(res.length <= 0 || res == []){ 
			template += ` <li class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--itemanybanks">
											<span	class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--itemanybanks--desc">No se encontraron resultados</span> 
											</li> `; 
		
		$("#c-listAlls_Transacs").html(template); 
	}else{ 
		res.forEach((e) => {

				template += `
					<li class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item" id="${e.id}">
						<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft">
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft--status"></div>
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft--codemount">
								<p>${e.codigo}</p>
								<p>${e.prefijorequest} ${e.solicitado}</p>
							</div>
						</div>
						<a href="#" class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--showDetail">Ver más</a>
					</li>
				`;
			});
			$("#c-listAlls_Transacs").html(template);
		}
	});
}
/************************** LISTADO DE DETALLES DE LA TRANSACCIÓN - SIDEBARLEFT **************************/
$(document).on("click", ".cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--showDetail", function(e){
	e.preventDefault();
	$(".cListDetailsTransactions").addClass("show");
	$(".cListDetailsTransactions--contDetails").addClass("show");

	var idTransac = $(this).parent().attr("id");

	$.ajax({
		url: "controllers/c_list-details-transac-byIdTrans.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_transaction : idTransac }
	}).done(function(res){

		console.log(res);
		if(res != ""){
			res.forEach( (e) => {

				var estado;
				if(e.estado == "PENDIENTE"){
					estado = "espera de pago";
				}else if(e.estado == "CANCELADA"){
					estado = "cancelada";
				}else{
					estado = "finalizada";
				}
				var cuentarequest = e.cuentarequest;
				var limitecuenta = (cuentarequest.length >= 4) ? cuentarequest.replace(cuentarequest.substring(0, 10), "*******") : cuentarequest;
				var pathimgbank = "./admin/assets/img/banks/"+e.imgbanksolicitado;
				var pathimgtransferbank = "./admin/assets/img/transferbanks/"+e.imgbankplatform;

				$("#t-statusTransCli").text(estado);
				$("#t-codigoTransCli").text(e.codigo);
				$("#t-solicitedTransCli").text(e.prefijorequest+" "+e.solicitado);
				$("#t-tasaTransCli").text(e.tasa);
				$("#t-naccountTransCli").text(limitecuenta);
				$("#t-transferedTransCli").text(e.prefijosend+" "+e.transferido);
				$("#t-imgbankTransCli").attr("src", pathimgbank);
				$("#t-idTransferBank").val(e.id_transferbank);
				$("#t-imgbankPlatformtransfer").attr("src", pathimgtransferbank);
				$("#t-numbankPlatformtransfer").text(e.naccplatform);
				$("#t-rucbankPlatformtransfer").text(e.rucplatform);

			});

		}else{
			console.log('No se envió la respuesta');
		}

	});
});