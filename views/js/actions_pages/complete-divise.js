var idClient = $("#valIdUser_sess").val();
// ------------ FORMATEAR A SOLO DOS DECIMALES
function twodecimals(n) {
  let t = n.toString();
  let regex = /(\d*.\d{0,2})/;
  return t.match(regex)[0];
}
// ------------ LISTAR LOS BANCOS JUNTO AL NOMBRE
$(document).on("click", "#selListallBanks", function(e){
	var btnshow = $("#listAllsBanks");
	$.ajax({
		url: "controllers/c_list-banks.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done( function (res) {
		var template = "";

		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				template += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks">
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listAllsBanks").html(template);
			}else{
				res.forEach((e) => {
					var pathimgbank = "./admin/views/assets/img/banks/"+e.photo;
					template += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item" id="${e.id}">
							<div class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item--cImg">
								<img src="${pathimgbank}" alt="">
							</div>
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item--namebank">${e.name}</span>
						</li>
					`;
				});
				$("#listAllsBanks").html(template);
			}
		}else{
			btnshow.removeClass("show");
			$("#listAllsBanks").html("");
		}
	});
});
// ------------ FIJAR EL BANCO
$(document).on("click", ".cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelBank").text("");
	$.each($(this), function(i, v){
		var getinfobanks = {
			bankid: $(this).attr("id"),
			bankname: $(this).find("span").text(),
			bankimg: $(this).find(".cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item--cImg").find("img").attr("src")
		};
		$("#selListAllBanks--img").find("span").css({"display":"none"});
		$("#selListAllBanks--img").find("img").attr("src", getinfobanks['bankimg']);
		$("#selListallBanks").find("input").attr("idbank", getinfobanks['bankid']);
	});
});
// ------------ LISTAR LOS TIPOS DE CUENTA
$(document).on("click", "#selListallTypeAccouts", function(e){
	var btnshow = $("#listtypesAccount");
	$.ajax({
		url: "controllers/c_list-type-account-bank.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done( function (res) {
		var ttypeaccount = "";

		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				ttypeaccount += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks">
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listtypesAccount").html(ttypeaccount);
			}else{
				res.forEach((e) => {
					ttypeaccount += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListTypeAccounts--item" id="${e.id}">
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListTypeAccounts--item--typeaccount">${e.type}</span>
						</li>
					`;
				});
				$("#listtypesAccount").html(ttypeaccount);
			}
		}else{
			btnshow.removeClass("show");
			$("#listtypesAccount").html("");
		}
	});
});
// ------------ FIJAR EL TIPO DE CUENTA
$(document).on("click", ".cformAddAccountBank--form--cControl--cSelItem--MenuListTypeAccounts--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelTypeAccount").text("")
	$.each($(this), function(i, v){
		var gettypeaccount = {
			typeaccountid: $(this).attr("id"),
			typeaccountname: $(this).find("span").text(),
		};
		$("#newValTypeAccount").find("span").text(gettypeaccount['typeaccountname']);
		$("#selListallTypeAccouts").find("input").attr("idtypeaccount", gettypeaccount['typeaccountid']);
	});
});
// ------------ LISTAR LOS TIPOS DE MONEDA
$(document).on("click", "#selListallCurrencyTypes_by_tcurrent", function(e){
	var btnshow = $("#listcurrencytypes");
	var tipocambio = $("#typechangecurridcli").val();
	$.ajax({
		url: "controllers/c_list-currency-by-typecurrent.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { type_currency : tipocambio}
	}).done( function (res) {
		var tcurrencytype = "";

		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				tcurrencytype += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks">
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listcurrencytypes").html(tcurrencytype);
			}else{
				res.forEach((e) => {
					tcurrencytype += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListCurrencyTypes--item" id="${e.id}">
							<span class="cformAddAccountBank--form--cControl--cSelItem--MenuListCurrencyTypes--item--currencytype">${e.name} (${e.prefix})</span>
						</li>
					`;
				});
				$("#listcurrencytypes").html(tcurrencytype);
			}
		}else{
			btnshow.removeClass("show");
			$("#listcurrencytypes").html("");
		}
	});
});
// ------------ FIJAR EL TIPO DE MONEDA
$(document).on("click", ".cformAddAccountBank--form--cControl--cSelItem--MenuListCurrencyTypes--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelCurrentType").text("");
	$.each($(this), function(i, v){
		var getcurrencytype = {
			currencytypeid: $(this).attr("id"),
			currencytypename: $(this).find("span").text(),
		};
		$("#newValCurrencyType").find("span").text(getcurrencytype['currencytypename']);
		$("#selListallCurrencyTypes_by_tcurrent").find("input").attr("idcurrencytype", getcurrencytype['currencytypeid']);
	});
});
// ------------ VALIDAR SI EL NÚMERO DE CUENTA ESTÁ VACÍO
$(document).on("keyup", "#numaccount-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounNumAccount").text("") : $("#msgerrorNounNumAccount").text("Debes ingresar tu número de cuenta");
});
// ------------ VALIDAR SI EL ALIAS DE LA CUENTA ESTÁ VACÍO
$(document).on("keyup", "#aliasaccount-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounAliasAccount").text("") : $("#msgerrorNounAliasAccount").text("Debes ingresar un alias");
});
// ------------ VALIDAR SI ESTÁ MARCADO EL CHECKBOX
$(document).on("click", "#checkaccount-cli", function(){
	($(this).is(':checked')) ? $("#msgerrorNouncheckedAccount").text("") : $("#msgerrorNouncheckedAccount").text("Debes declarar que es tu cuenta personal");
});
// ------------ AGREGAR CUENTA BANCARIA
$(document).on("click", "#btn-AddAccountBank", function(e){
	e.preventDefault();

	// ------------ AGREGAR MENSAJE EN LOS SPAN
	($("#selListallBanks--input").attr("idbank")) ? $("#msgerrorNounSelBank").text("") : $("#msgerrorNounSelBank").text("Debes seleccionar un banco");
	($("#numaccount-cli").val() != "") ? $("#msgerrorNounNumAccount").text("") : $("#msgerrorNounNumAccount").text("Debes ingresar tu número de cuenta");
	($("#selListtypeAccount--input").attr("idtypeaccount")) ? $("#msgerrorNounSelTypeAccount").text("") : $("#msgerrorNounSelTypeAccount").text("Debes seleccionar un tipo de cuenta");
	($("#selListcurrencyType--input").attr("idcurrencytype")) ? $("#msgerrorNounSelCurrentType").text("") : $("#msgerrorNounSelCurrentType").text("Debes seleccionar una moneda");
	($("#aliasaccount-cli").val() != "") ? $("#msgerrorNounAliasAccount").text("") : $("#msgerrorNounAliasAccount").text("Debes ingresar un alias");
	($("#checkaccount-cli").is(":checked")) ? $("#msgerrorNouncheckedAccount").text("") : $("#msgerrorNouncheckedAccount").text("Debes declarar que es tu cuenta personal");

	if($("#checkaccount-cli").is(":checked")){
		var obj_form = {
			idclient: idClient,
			idbank: $("#selListallBanks--input").attr("idbank"),
			numaccount: $("#numaccount-cli").val(),
			idtypeaccount: $("#selListtypeAccount--input").attr("idtypeaccount"),
			idcurrenttype: $("#selListcurrencyType--input").attr("idcurrencytype"),
			aliasaccount: $("#aliasaccount-cli").val(),
		};

		var formdata = new FormData();

		formdata.append("id_client", obj_form['idclient']);
		formdata.append("id_bank", obj_form['idbank']);
	  formdata.append("numaccount", obj_form['numaccount']);
	  formdata.append("id_typeaccount", obj_form['idtypeaccount']);
	  formdata.append("id_currencytype", obj_form['idcurrenttype']);
	  formdata.append("aliasaccount", obj_form['aliasaccount']);

	  $.ajax({
	    url: "controllers/c_add-account-banks.php",
	    method: "POST",
	    data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
	  }).done((res) => {

	  	if(res = "insertado"){
		  	$(".cformAddAccountBank").removeClass("show");
				$(".cformAddAccountBank--form").removeClass("show");
				listAccountsCDivise();
				// ------------ RESETEAR EL FORMULARIO
	     	$("#selListAllBanks--img").find("span").css({"display":"block"});
	     	$("#selListAllBanks--img").find("img").attr("src", "");
	     	$("#selListallBanks--input").attr("idbank", "");
	     	$("#newValTypeAccount").find("span").text("Selecciona el tipo de cuenta");
	     	$("#selListtypeAccount--input").attr("idtypeaccount", "");
	     	$("#newValCurrencyType").find("span").text("Selecciona la moneda");
	     	$("#selListcurrencyType--input").attr("idcurrencytype", "");
	     	$("#checkaccount-cli").attr("checked", false);
	     	$("#numaccount-cli").val("");
	     	$("#aliasaccount-cli").val("")
	     	$('#form-AddAccountBank')[0].reset();
	      
	     	// ------------ LISTAR LAS CUENTA DEL USUARIO
	      
	  	}else{
	  		console.log('Error, no se insertó');
	  	}
	  });
	}else{
		console.log('No ahy datos');
	}
});

// ------------ LISTAR LOS BANCOS JUNTO AL NOMBRE - FORM COMPLETE DIVISE
$(document).on("click", "#selListallBanks_CData", function(e){
	$("#msgerrorNounSelBankSend_CData").text("");
	var btnshow = $("#listAllsBanks_CData");
	var tipocambio = $("#typechangecurridcli").val();
	$.ajax({
		url: "controllers/c_list-account-platform-byTypeCurrent.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { type_currency : tipocambio}
	}).done((res) => {
		var template = "";

		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				template += `
						<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--itemanybanks">
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listAllsBanks_CData").html(template);
			}else{
				res.forEach((e) => {
					var pathimgbank = "./admin/views/assets/img/transferbanks/"+e.photo;
					template += `
						<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--item" id="${e.id}">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--item--cImg">
								<img src="${pathimgbank}" alt="">
							</div>
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--item--namebank">${e.name}</span>
						</li>
					`;
				});
				$("#listAllsBanks_CData").html(template);
			}
		}else{
			btnshow.removeClass("show");
			$("#listAllsBanks_CData").html("");
		}
	});
});
// ------------ FIJAR EL BANCO
$(document).on("click", ".cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelBank_CData").text("");
	$.each($(this), function(i, v){
		var getinfobanks = {
			bankid: $(this).attr("id"),
			bankname: $(this).find("span").text(),
			bankimg: $(this).find(".cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--item--cImg").find("img").attr("src")
		};
		$("#selListAllBanks--img_CData").find("span").text("");
		$("#selListAllBanks--img_CData").find("img").attr("src", getinfobanks['bankimg']);
		$("#selListallBanks_CData").find("input").attr("idbank", getinfobanks['bankid']);
	});
});
// ------------ LISTAR LAS CUENTAS BANCARIAS
$(document).on("click", "#selListallaccountsBanks_CData", function(e){
	$("#msgerrorNounSelAccountBankReceived_CData").text("");
	var btnshowaccounts = $("#listAllsAccountsBanks_CData");
	var tipocambio = $("#typechangecurridcli").val();
	var exchangeTypeCurrent = "";
	if(tipocambio == "Soles"){
		exchangeTypeCurrent = "Dólares";
	}else{
		exchangeTypeCurrent = "Soles";
	}

	$.ajax({
		url: "controllers/c_list-account-banks_byTypeCurrent.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient, type_currency : exchangeTypeCurrent}
	}).done( function (res) {
		var template = "";
		if(!btnshowaccounts.hasClass("show")){
			btnshowaccounts.addClass("show");
			if(res.length <= 0 || res == []){
				template += `
						<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--itemanybanks_CData">
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--itemanybanks_CData--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listAllsAccountsBanks_CData").html(template);
			}else{
				res.forEach((e) => {

					var cuentabank = e.cuenta;
      		var limitecuenta = (cuentabank.length >= 4) ? cuentabank.replace(cuentabank.substring(0, 10), "*******") : cuentabank;
      		var alias = e.alias;
      		var limitealias = (alias.length >= 15) ? alias.substring(15, 0) + "..." : alias;
					var pathimgbank = "./admin/views/assets/img/banks/"+e.imgbanco;
					template += `
						<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item" id="${e.id}">
							<input type="hidden" accname="${limitealias}" accnum="${limitecuenta}">
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank">
								<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--numaccountbank">${limitecuenta}</span>
								<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--guion">-</span>
								<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--aliasccountbank">${limitealias}</span>
							</div>
							<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cImg">
								<img src="${pathimgbank}" alt="">
							</div>
						</li>
					`;
				});
				$("#listAllsAccountsBanks_CData").html(template);
			}
		}else{
			btnshowaccounts.removeClass("show");
			$("#listAllsAccountsBanks_CData").html("");
		}
	});
});

function listAccountsCDivise(){
	$.ajax({
		url: "controllers/c_list-account-banks.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient }
	}).done( function (res) {
	
		var template = "";

		if(res.length <= 0 || res == []){
			template += `
					<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--itemanybanks">
						<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--itemanybanks--desc">No se encontraron resultados</span>
					</li>
				`;
			$("#listAllsAccountsBanks_CData").html(template);
		}else{
			res.forEach((e) => {

				var cuentabank = e.cuenta;
    		var limitecuenta = (cuentabank.length >= 4) ? cuentabank.replace(cuentabank.substring(0, 10), "*******") : cuentabank;
    		var alias = e.alias;
    		var limitealias = (alias.length >= 15) ? alias.substring(15, 0) + "..." : alias;
				var pathimgbank = "./admin/views/assets/img/banks/"+e.imgbanco;
				template += `
					<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item" id="${e.id}">
						<input type="hidden" accname="${limitealias}" accnum="${limitecuenta}">
						<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank">
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--numaccountbank">${limitecuenta}</span>
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--guion">-</span>
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cInfoBank--aliasccountbank">${limitealias}</span>
						</div>
						<div class="cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cImg">
							<img src="${pathimgbank}" alt="">
						</div>
					</li>
				`;
			});
			$("#listAllsAccountsBanks_CData").html(template);
		}
	});
}

// ------------ FIJAR LA CUENTA BANCARIA
$(document).on("click", ".cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelAccountBank_CData").text("");
	$.each($(this), function(i, v){
		var getinfoaccountbanks = {
			accountid: $(this).attr("id"),
			accountnum: $(this).find("input").attr("accnum"),
			accountimg: $(this).find(".cControlP__cont--containDash--c--cCdivise--cF--cControl--clistaddBanks--cSelItem--MenuListAccountsBanks_CData--item--cImg").find("img").attr("src")
		};
	
		$("#selListAllaccountsBanks--img_CData").find("span").text(getinfoaccountbanks['accountnum']);
		$("#selListAllaccountsBanks--img_CData").find("span").css({"margin-right":".5rem"});
		$("#selListAllaccountsBanks--img_CData").find("img").attr("src", getinfoaccountbanks['accountimg']);
		$("#selListallaccountsBanks_CData").find("input").attr("idaccountbank", getinfoaccountbanks['accountid']);
	});
});
// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE AGREGAR CUENTA BANCARIA
document.querySelector("#btn-addAccountform").addEventListener("click", function(){
	document.querySelector(".cformAddAccountBank").classList.add("show");
	document.querySelector(".cformAddAccountBank--form").classList.add("show");

	$("#selListAllBanks--img_CData").find("span").text("Selecciona un banco");
	$("#selListAllBanks--img_CData").find("img").attr("src", "");
	$("#selListallBanks_CData").find("input").removeAttr("idbank");
	$("#selListAllaccountsBanks--img_CData").find("span").text("Selecciona una de tus cuentas");
	$("#selListAllaccountsBanks--img_CData").find("span").css({"margin-right":"0"});
	$("#selListAllaccountsBanks--img_CData").find("img").attr("src", "");
	$("#selListallaccountsBanks_CData").find("input").removeAttr("idaccountbank");
});
let contformRegAccount = document.querySelector('.cformAddAccountBank');
contformRegAccount.addEventListener('click', e => {
	if(e.target === contformRegAccount)	contformRegAccount.classList.remove('show');
});
// ------------ AGREGAR TRANSACCIÓN
$(document).on("click", "#btn-cCompleteDiviseCli", function(e){
	e.preventDefault();

	($("#selListallBanks_CData").find("input").attr("idbank")) ? $("#msgerrorNounSelBankSend_CData").text("") : $("#msgerrorNounSelBankSend_CData").text("Debes seleccionar el banco donde transferirás");
	($("#selListallaccountsBanks_CData").find("input").attr("idaccountbank")) ? $("#msgerrorNounSelAccountBankReceived_CData").text("") : $("#msgerrorNounSelAccountBankReceived_CData").text("Debes seleccionar tu cuenta para recibir");


	if($("#selListallBanks_CData").find("input").attr("idbank") && $("#selListallaccountsBanks_CData").find("input").attr("idaccountbank")){
		var send = parseFloat($("#quantitycurridcli").val());
		var tasa = parseFloat($("#changecurridcli").val());
		var type = $("#typechangecurridcli").val();
		var cambio;
		if(type == "Soles"){
			cambio = send / tasa;
		}else{
			cambio = send * tasa;
		}

		var getDataTransac = {
			id_client: idClient,
			id_bank: $("#selListallBanks_CData").find("input").attr("idbank"),
			id_account_bank: $("#selListallaccountsBanks_CData").find("input").attr("idaccountbank"),
			type_send: type,
			prefix_send: $("#prefixcurridcli").val(),
			amount_send: send,
			type_received: $("#type_receivedcli").val(),
			prefix_received: $("#prefix_receivedcli").val(),
			amount_received: twodecimals(cambio),
			tasa_change: $("#changecurridcli").val(),
		};

		var formdata = new FormData();

		formdata.append("id_client", getDataTransac['id_client']);
		formdata.append("id_bank", getDataTransac['id_bank']);
		formdata.append("id_account_bank", getDataTransac['id_account_bank']);
		formdata.append("type_send", getDataTransac['type_send']);
		formdata.append("prefix_send", getDataTransac['prefix_send']);
		formdata.append("amount_send", getDataTransac['amount_send']);
		formdata.append("type_received", getDataTransac['type_received']);
		formdata.append("prefix_received", getDataTransac['prefix_received']);
		formdata.append("amount_received", getDataTransac['amount_received']);
		formdata.append("tasa_change", getDataTransac['tasa_change']);

		$.ajax({
	    url: "controllers/c_add-transaction.php",
	    method: "POST",
	    data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
	  }).done((res) => {
	  	
	  	if(res == "true"){
	  		
	  		console.log('Se ha insertado');
	  		$(this).attr("disabled","disabled");
				$(this).addClass("sendShowComplete");
				$(this).find("div").addClass("show");

				setTimeout(function(){
					window.location.replace("complete-exchange");
				}, 2000);
	  	}else{
	  		console.log('No se insertó');
	  	}
	  });
	}else{
		console.log('No se enviaron los datos');
	}
});