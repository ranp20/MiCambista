$(function(){
	listTransactionsByIdClient_tablero();
})
var idClient = $("#input-idClientValListTransac").val();
// ------------ TROZO DE VANILLA JS
((d) => {
	// ------------ CERRAR LA VENTANA - DETALLE DE TRANSACCIÓN
	d.querySelector("#btnCloseTransacRight").addEventListener("click", function(){
		d.querySelector(".cListDetailsTransactions").classList.remove("show");
		d.querySelector(".cListDetailsTransactions--contDetails").classList.remove("show");
	});
	let contsidebarRight = document.querySelector('.cListDetailsTransactions');
	contsidebarRight.addEventListener('click', e => {
		if(e.target === contsidebarRight)	contsidebarRight.classList.remove('show');
	});
})(document);
// ------------ LISTADO DE TRANSACCIONES
function listTransactionsByIdClient_tablero(){
	$.ajax({
		url: "controllers/c_list-all-transactions-byIdClient-tablero.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient }
	}).done((e) => {
		var template = "";
		if(e.length <= 0 || e == []){ 
			template += ` <li class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--itemanybanks">
											<span	class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--itemanybanks--desc">No se encontraron resultados</span> 
											</li> `; 
		
			$("#c-listAlls_Transacs").html(template); 
		}else{
			//var countItems = e.length + 1;
			$.each(e, function(i,v){
				//countItems--;
				var statusSend = "";
				if(v.estado == "Pending"){
					statusSend = `<span class="process"></span>`;
				}else if(v.estado == "Completed"){
					statusSend = `<span class="complete"></span>`;
				}else if(v.estado == "Cancel"){
					statusSend = `<span class="cancel"></span>`;
				}else{
					statusSend = `<span class="cancel"></span>`;
				}

				let valOriginal = v.solicitado;
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

				template += `
					<li class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item" id="${v.id}">
						<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft">
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft--status">
								${statusSend}
							</div>
							<div class="cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--cLeft--codemount">
								<p>${v.codigo}</p>
								<p>${v.prefijorequest} ${valFormat}</p>
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
// ------------ LISTADO DE DETALLES DE LA TRANSACCIÓN - SIDEBARLEFT
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
	}).done((e) => {
		if(e.length != "" && e.length > 0){
			var tmpDetailTrans = "";
			$.each(e, function(i,v){
				var estado;
				var cuentarequest = v.cuentarequest;
				var limitecuenta = (cuentarequest.length >= 4) ? cuentarequest.replace(cuentarequest.substring(0, 10), "*******") : cuentarequest;
				var pathimgbank = "./admin/views/assets/img/banks/"+v.imgbanksolicitado;
				var pathimgtransferbank = "./admin/views/assets/img/transferbanks/"+v.imgbankplatform;
				// VALOR - SOLICITADO
				let valOriginal = v.solicitado;
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
      	// VALOR - TRANSFERIDO
				let valOriginal_trans = v.transferido;
      	let valOriginal_transsplit = valOriginal_trans.split(".");
      	let valOriginal_transFinal = "";
				let valFormat_trans = "";
				if(valOriginal_transsplit[1] == undefined || valOriginal_transsplit[1] == 'undefined' || valOriginal_transsplit[1] == ""){
					valOriginal_transFinal = valOriginal_transsplit[0]+'.00';
				}else	if(valOriginal_transsplit[1].length < 2){
					valOriginal_transFinal = valOriginal_transsplit[0]+"."+valOriginal_transsplit[1]+'0';
				}else{
					valOriginal_transFinal = valOriginal_transsplit[0]+"."+valOriginal_transsplit[1];
				}
      	valFormat_trans = valOriginal_transFinal.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");

				if(v.estado == "Pending"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus process">
											<span id="t-statusTransCli">espera de pago</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="cListDetailsTransactions--contDetails--c--CompleteOP">
							<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cTitle">
								<h3>Completa tu operación</h3>
								<input type="hidden" id="t-idTransferBank" value="${v.id_transferbank}">
							</div>
							<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item">
										<p>Cuenta a transferir:</p>
										<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank">
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<img src="${pathimgtransferbank}" alt="" id="t-imgbankPlatformtransfer">
												<p>
													<span id="t-numbankPlatformtransfer">${v.naccplatform}</span>
													<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
												</p>
											</div>
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<p>Mi Cambista S.A.C - RUC <span id="t-rucbankPlatformtransfer">${v.rucplatform}</span></p>
											</div>
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<p>Monto a enviar:</p>
												<p>
													<span id="t-transferedTransCli">${v.prefijosend+" "+valFormat_trans}</span>
													<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
												</p>
											</div>
										</div>
									</li>
								</ul>
								<form method="POST" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form">
									<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control">
										<input type="text" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control--input" placeholder="Número de transferencia">
										<button type="submit" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control--btnCTransac">Agregar</button>
									</div>
								</form>
							</div>
						</div>
					`;

				}else if(v.estado == "Cancel"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus cancel">
											<span id="t-statusTransCli">cancelada</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					`;
				}else if(v.estado == "Completed"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus complete">
											<span id="t-statusTransCli">finalizada</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat_trans}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					`;
				}else{
					estado = "ERROR!";
					tmpDetailTrans = ``;
				}
				/*
				$("#t-statusTransCli").text(estado);
				$("#t-codigoTransCli").text(v.codigo);
				$("#t-solicitedTransCli").text(v.prefijorequest+" "+v.solicitado);
				$("#t-tasaTransCli").text(v.tasa);
				$("#t-naccountTransCli").text(limitecuenta);
				$("#t-transferedTransCli").text(v.prefijosend+" "+v.transferido);
				$("#t-imgbankTransCli").attr("src", pathimgbank);
				$("#t-idTransferBank").val(v.id_transferbank);
				$("#t-imgbankPlatformtransfer").attr("src", pathimgtransferbank);
				$("#t-numbankPlatformtransfer").text(v.naccplatform);
				$("#t-rucbankPlatformtransfer").text(v.rucplatform);
				*/
			});

			$("#c-detailTransacCli").html(tmpDetailTrans);
		}else{
			console.log('No se envió la respuesta');
		}
	});
});