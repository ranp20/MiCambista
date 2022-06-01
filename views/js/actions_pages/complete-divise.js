$(() => {
	// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE AGREGAR CUENTA BANCARIA
	const btn_frmOpenAddAccount = document.querySelector("#btn-addAccountform");
	const btn_frmCloseAddAccount = document.querySelector("#icon_frmbtnClose");
	const c_totalfrmAddAccount = document.querySelector(".cformAddAccountBank");
	const c_containfrmAddAccount = document.querySelector(".cformAddAccountBank--form");

	if(btn_frmOpenAddAccount != null && btn_frmOpenAddAccount != undefined){
		btn_frmOpenAddAccount.addEventListener("click", function(){
			c_totalfrmAddAccount.classList.add("show");
			c_containfrmAddAccount.classList.add("show");

			$("#selListAllBanks--img_CData").find("span").text("Selecciona un banco");
			$("#selListAllBanks--img_CData").find("img").attr("src", "");
			$("#selListallBanks_CData").find("input").removeAttr("idbank");
			$("#selListAllaccountsBanks--img_CData").find("span").text("Selecciona una de tus cuentas");
			$("#selListAllaccountsBanks--img_CData").find("span").css({"margin-right":"0"});
			$("#selListAllaccountsBanks--img_CData").find("img").attr("src", "");
			$("#selListallaccountsBanks_CData").find("input").removeAttr("idaccountbank");
		});
	}
	c_totalfrmAddAccount.addEventListener('click', e => {
		if(e.target === c_totalfrmAddAccount){
			c_totalfrmAddAccount.classList.remove('show');
		}
	});
	btn_frmCloseAddAccount.addEventListener("click", function(){
		c_totalfrmAddAccount.classList.remove("show");
		c_containfrmAddAccount.classList.remove("show");
	});
});
$(document).on("click", "#btn-addAccountform", function(){
	$(".cformAddAccountBank").add($(".cformAddAccountBank--form")).addClass("show");
});
//var idClient = $("#valIdUser_sess").val();
// ------------ VALIDAR LA INTEGRIDAD DEL INPUT[id-client]
var idClient = document.getElementById("valIdUser_sess");
if(idClient != null && idClient != undefined){
	$("#valIdUser_sess").on("change", function(e){
		if($(this).val() == 0 || $(this).val() == ""){
			window.location.href = "signin";		
		}
	});
}else{
	window.location.href = "signin";
}
//console.log(idClient.value);
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
	if($("#selListallBanks--input").attr("idbank") != "" && $("#selListallBanks--input").attr("idbank") != undefined && 
	$("#numaccount-cli").val() != "" && $("#numaccount-cli").val() != 0 && $("#numaccount-cli").val() != null && 
	$("#selListtypeAccount--input").attr("idtypeaccount") != "" && $("#selListtypeAccount--input").attr("idtypeaccount") != undefined &&
	$("#selListcurrencyType--input").attr("idcurrencytype") != "" && $("#selListcurrencyType--input").attr("idcurrencytype") != undefined &&
	$("#aliasaccount-cli").val() != "" && $("#aliasaccount-cli").val() != 0 && $("#aliasaccount-cli").val() != null &&
	$("#checkaccount-cli").is(":checked")){
		var obj_form = {
			idclient: idClient.value,
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
		Swal.fire({
      title: 'Atención!',
      html: `<span class='font-w-300'>Debe completar toda la información.</span>`,
      icon: 'warning',
      confirmButtonText: 'Aceptar'
    });
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
	}).done((e) => {
		var template = "";
		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(e.length <= 0 || e == []){
				template += `
						<li class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--itemanybanks">
							<span class="cControlP__cont--containDash--c--cCdivise--cF--cControl--cSelItem--MenuListBanks_CData--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listAllsBanks_CData").html(template);
			}else{
				e.forEach((e) => {
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
// ------------ LISTAR LAS CUENTAS BANCARIAS POR TIPO DE MONEDA A CAMBIAR
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
		data: { id_client : idClient.value, type_currency : exchangeTypeCurrent}
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
// ------------ LISTAR LAS CUENTAS BANCARIAS
function listAccountsCDivise(){
	$.ajax({
		url: "controllers/c_list-account-banks.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_client : idClient.value }
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
// ------------ AGREGAR TRANSACCIÓN
$(document).on("click", "#btn-cCompleteDiviseCli", function(e){
	e.preventDefault();
	$("#btn-cCompleteDiviseCli").attr("type","button");
	$("#btn-cCompleteDiviseCli").attr("disabled","disabled");
	$("#btn-cCompleteDiviseCli").removeClass("completeFrm");
	$("#btn-cCompleteDiviseCli").addClass("send_showToConvertStep");
	$("#btn-cCompleteDiviseCli").find("div").addClass("show");

	window.onbeforeunload = null;
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
			id_client: idClient.value,
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
	    beforeSend: function(){
	    	//console.log('Insertando la información');
	    },
	  }).done((e) => {
	  	if(e.length){
		  	var r = JSON.parse(e);
		  	if(r.res == "insert"){
		  		$(this).attr("disabled","disabled");
					$(this).addClass("sendShowComplete");
					$(this).find("div").addClass("show");
					setTimeout(function(){
						$("#cont-complete-divise").addClass("send_showToConvertStep");
						$("#cont-complete-divise").addClass("send_showToConvertStep");
						$("#cont-complete-exchange").addClass("sendShow");
						$("#cont-complete-exchange").addClass("sendShow");
					}, 2000);
					let inputsAll = document.querySelectorAll("input");
					// ------------ PREGUNTAR SI DESEA ABANDONAR LA PÁGINA - INPUTS
					inputsAll.forEach(function(e, i){
						e.addEventListener("input", function(){
							window.onbeforeunload = function(event){
							  event.returnValue = "Es posible que no se guarden los cambios que ha hecho";
							};
						});
					});
					$("#cont-complete-exchange").html(`
						<div class="cControlP__cont--containDash--c--cCFinalDivise">
							<div class="cControlP__cont--containDash--c--cCFinalDivise--cTitle">
								<h2 class="cControlP__cont--containDash--c--cCFinalDivise--cTitle--title">¡Último paso!</h2>
								<div class="cControlP__cont--containDash--c--cCFinalDivise--cTitle--cIcon">
									<img src="./views/assets/img/svg/transfer-complete-exchange.svg" alt="icon-transf-exchange" width="100" height="100">
								</div>
								<input type="hidden" id="vl-idUserSessFinal" class='non-visvalipt h-alternative-shwnon s-fkeynone-step' autocomplete='off' spellcheck='false' value="<?= $idclient; ?>">
								<p class="cControlP__cont--containDash--c--cCFinalDivise--cTitle--textdesc">Transfiere desde tu banca por internet el monto de:</p>
								<h3 class="cControlP__cont--containDash--c--cCFinalDivise--cTitle--textvalchange">
									<span id="vl-mountTotalToSend"></span>
									<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
								</h3>
							</div>
							<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo">
								<h3 class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--subtitle">Banco a transferir:</h3>
								<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo b-shadow-light">
									<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo--cImg">
										<img src="" alt="" id="vl-imgbankTotalToSend">
									</div>
									<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo--cinfo">
										<p class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo--cinfo--top">
											Cuenta <span id="vl-typeaccountTotalToSend"></span> en <span id="vl-typecurrTotalToSend"></span>
										</p>
										<p class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo--cinfo--bottom">
											<span id="vl-numaccountTotalToSend"></span>
											<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
										</p>
									</div>
								</div>
								<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo b-shadow-light">
									<h3 class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cTopbankMiCambistainfo--ruc">MiCambista SAC - RUC&nbsp; <span id="vl-rucaccountTotalToSend"></span></h3>
									<svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
								</div>
								<p class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--infoStepInit">Una vez realizado coloque el número de operación <b>emitido por su banco</b> dentro del casillero mostrado debajo darle a enviar.</p>
								<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--showTitleinfo">
									<a href="javascript:void(0);" data-showModalHov="transfer_numOpBankExample">
										<span>¿Dónde lo encuentro?</span>
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
										</span>
									</a>
									<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--showTitleinfo__cModalNumOpBankExample">
										
									</div>
								</div>
								<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac">
									<form method="POST" class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form">
										<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form--cinputNumOp">
											<input type="text" autocomplete="off" spellcheck="false" class="" placeholder="Ingresa el nro. de operación" id="v-validNumOperationTransc" maxlength="8">
											<span></span>
										</div>
										<h3 class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form--Step">SOLO POSEES 15 MINUTOS PARA ENVIARNOS EL NRO. DE TU OPERACIÓN.</h3>
										<div class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form--cBtns">
											<button type="submit" class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form--cBtns--btnTransac">Enviar</button>
											<a href="javascript:void(0);" class="cControlP__cont--containDash--c--cCFinalDivise--cContInfo--cFormSendtransac--form--cBtns--cancelLink" id="ipt_tOperCancel">
												<span>Cancelar</span>
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					`);

		  	}else{
		  		Swal.fire({
			      title: 'Error!',
			      html: `<span class='font-w-300'>Lo sentimos, hubo un error al insertar la información.</span>`,
			      icon: 'error',
			      confirmButtonText: 'Aceptar'
			    });
		  	}
	  	}else{
	  		Swal.fire({
		      title: 'Error!',
		      html: `<span class='font-w-300'>Lo sentimos, hubo un error al insertar la información.</span>`,
		      icon: 'error',
		      confirmButtonText: 'Aceptar'
		    });
	  	}
	  });
	}else{
		$("#btn-cCompleteDiviseCli").attr("type","submit");
		$("#btn-cCompleteDiviseCli").attr("disabled",false);
		$("#btn-cCompleteDiviseCli").removeClass("completeFrm");
		$("#btn-cCompleteDiviseCli").removeClass("send_showToConvertStep");
		$("#btn-cCompleteDiviseCli").find("div").removeClass("show");
		$("#cont-complete-divise").removeClass("hidd_toNextStepTrans");
		Swal.fire({
      title: 'Atención!',
      html: `<span class='font-w-300'>Debe completar toda la información.</span>`,
      icon: 'warning',
      confirmButtonText: 'Aceptar'
    });
	}
});