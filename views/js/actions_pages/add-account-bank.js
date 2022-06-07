$(function(){
	listAccountsUser();
	// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE REGISTRO DE CUENTAS BANCARIAS
	const btn_frmOpenAddAccount = document.querySelector("#btn-addAccountform"),
				btn_frmCloseAddAccount = document.querySelector("#icon_frmbtnClose"),
				c_totalfrmAddAccount = document.querySelector(".cformAddAccountBank"),
				c_containfrmAddAccount = document.querySelector(".cformAddAccountBank--form"),
				contformUpdAccount = document.querySelector('.cformDetailsAccount'),
				contformUpdAccount_frm = document.querySelector(".cformDetailsAccount--contDetails"),
				btn_frmDetailsAccClose = document.querySelector('#icon_frmbtnCloseDetailsAcc');
	btn_frmOpenAddAccount.addEventListener("click", function(){
		c_totalfrmAddAccount.classList.add("show");
		c_containfrmAddAccount.classList.add("show");
	});
	btn_frmCloseAddAccount.addEventListener("click", function(){
		c_totalfrmAddAccount.classList.remove("show");
		c_containfrmAddAccount.classList.remove("show");
	});
	c_totalfrmAddAccount.addEventListener('click', e => {
		if(e.target === c_totalfrmAddAccount){
			c_totalfrmAddAccount.classList.remove('show');
			c_containfrmAddAccount.classList.remove("show");	
		}
	});
	contformUpdAccount.addEventListener('click', e => {
		if(e.target === contformUpdAccount){
			contformUpdAccount.classList.remove('show');
		}
	});
	if(btn_frmDetailsAccClose != undefined && btn_frmDetailsAccClose != null){
		btn_frmDetailsAccClose.addEventListener("click", function(){
			contformUpdAccount.classList.remove("show");
			contformUpdAccount_frm.classList.remove("show");
		});
	}
});
var idClient = $("#input-idClientVal").val();
/*
// ------------ DESPLEGAR LAS CUENTAS DEL USUARIO
$(".cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--cTitle").on("click", function(){
	$(this).toggleClass("active");
	$(this).next().slideToggle();
});
*/
// ------------ LISTAR LOS BANCOS JUNTO AL NOMBRE
$(document).on("click", "#selListallBanks", function(e){
	var btnshow = $("#listAllsBanks");
	$.ajax({
		url: "./controllers/c_list-banks.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done((res) => {
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
				$.each(res, function(i,e){
					var pathimgbank = "./admin/views/assets/img/banks/"+e.photo;
					template += `
						<li class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item" id="${e.id}">
							<div class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks--item--cImg">
								<img src="${pathimgbank}" alt="img_bank-${i}">
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
		url: "./controllers/c_list-type-account-bank.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done((res) => {
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
				$.each(res, function(i,e){
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
$(document).on("click", "#selListallCurrencyTypes", function(e){
	var btnshow = $("#listcurrencytypes");
	$.ajax({
		url: "./controllers/c_list-currency.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done((res) => {
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
				$.each(res, function(i,e){
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
		$("#selListallCurrencyTypes").find("input").attr("idcurrencytype", getcurrencytype['currencytypeid']);
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
	    url: "./php/process_add-bank-accounts.php",
	    method: "POST",
	    data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
	  }).done((e) => {
	  	if(e != "" && e.length > 0){
	  		var r = JSON.parse(e);
		  	if(r.res == "soles_limit"){
		  		Swal.fire({
		        title: 'Agotado!',
		        html: `<span class='font-w-300'>Se ha llegado al límite de cuentas en <strong>Soles</strong>.</span>`,
		        icon: 'warning',
		        confirmButtonText: 'Aceptar'
		      });
		  	}else if(r.res == "dollar_limit"){
		  		Swal.fire({
		        title: 'Agotado!',
		        html: `<span class='font-w-300'>Se ha llegado al límite de cuentas en <strong>Dólares</strong>.</span>`,
		        icon: 'warning',
		        confirmButtonText: 'Aceptar'
		      });
		  	}else if(r.res == "accounts_limit"){
		  		Swal.fire({
		        title: 'CUENTAS AGOTADAS',
		        text: 'Has llegado al límite máximo de cuentas creadas en ambas monedas.',
		        icon: 'warning',
		        confirmButtonText: 'Aceptar',
		        timer: 3500
		      });
		  	}else if(r.res == "true"){
		  		Swal.fire({
		        title: 'Éxito!',
		        text: 'Se ha agregado la cuenta.',
		        icon: 'success',
		        confirmButtonText: 'Aceptar',
		        timer: 3500
		      });

			  	$(".cformAddAccountBank").removeClass("show");
					$(".cformAddAccountBank--form").removeClass("show");
		     	// ------------ LISTAR LAS CUENTAS 
		     	listAccountsUser();
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
		  		Swal.fire({
		        title: 'Error!',
		        text: 'Lo sentimos, hubo un error al guardar la cuenta.',
		        icon: 'error',
		        confirmButtonText: 'Aceptar'
		      });
		  	}
	  	}else{
	  		Swal.fire({
	        title: 'Error!',
	        text: 'Lo sentimos, hubo un error al guardar la cuenta.',
	        icon: 'error',
	        confirmButtonText: 'Aceptar'
	      });
	  	}
	  });
	}else{
		Swal.fire({
      title: 'Atención!',
      text: 'Por favor, rellene los campos para crear una nueva cuenta.',
      icon: 'warning',
      confirmButtonText: 'Aceptar'
    });
		console.log('No hay datos');
	}
});
function listAccountsUser(){
	$.ajax({
    url: "./controllers/c_list-account-banks.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { id_client : idClient}
  }).done((res) => {
    var response = JSON.parse(res);
    var templateGeneral = "";
    var tempSoles = "";
    var tempDolares = "";
    if(res.length == 0){
      // template = `
      //   <tr>
      //     <td colspan="7">
      //       <div class="msg-non-results-res">
      //         <img src="admin/views/assets/img/icons/icon-sad-face.svg" alt="" class="msg-non-results-res__icon">
      //         <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
      //       </div>
      //     </td>
      //   </tr>
      // `;
      // $("#tbl_countries").html(template);
      console.log('No hay registros de cuentas');
    }else{
    	$.each(response, function(i,e){
      	var cuentabank = e.cuenta;
      	var limitecuenta = (cuentabank.length >= 4) ? cuentabank.replace(cuentabank.substring(0, 10), "*******") : cuentabank;
      	var img_route = "admin/views/assets/img/banks/"+e.imgbanco;
	    	if(e.moneda == "Soles"){
		      tempSoles += `
		        <li class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item" id="${e.id}">
							<div class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item--cIconLink">
								<img src="${img_route}" alt="">
								<a href="#" class="btn-ShowDetailsAccount">Ver más</a>
							</div>
							<div class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item--cAliasNumb">
								<p>
									<span>${e.alias}</span>
									<span>${limitecuenta}</span>
								</p>
							</div>
						</li>
		        `;
	    	}else{
	    		tempDolares += `
	    			<li class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item" id="${e.id}">
							<div class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item--cIconLink">
								<img src="${img_route}" alt="">
								<a href="#" class="btn-ShowDetailsAccount">Ver más</a>
							</div>
							<div class="cControlP__cont--containDash--c--myAccounts--cAddAccountList--cListAccounts--m--item--cAliasNumb">
								<p>
									<span>${e.alias}</span>
									<span>${limitecuenta}</span>
								</p>
							</div>
						</li>
	    		`;
	    	}	
    	});
      $("#accounts-DollarsList").html(tempDolares);
      $("#accounts-SolesList").html(tempSoles);
    }
		// ------------ MOSTRAR Y OCULAR EL DETALLE DE LA CUENTA BANCARIA 
		$(document).on("click", ".btn-ShowDetailsAccount", function(){
			$("#val-idaccountdetail").val($(this).parent().parent().attr("id"));
			$(".cformDetailsAccount").addClass("show");
			$(".cformDetailsAccount--contDetails").addClass("show");
			listAccountDetails();
		});
  });
}
// ------------ LISTAR EL DETALLE DE LA CUENTA 
function listAccountDetails(){
	var idaccountdetail = $("#val-idaccountdetail").val();
	$.ajax({
	  url: "./controllers/c_list-details-account-bank.php",
	  method: "POST",
	  datatype: "JSON",
	  contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	  data: { id_client : idClient, id_account : idaccountdetail}
	}).done( function (res){
		var response = JSON.parse(res);
		response.forEach( e => {
			var pathimgbanco = "./admin/views/assets/img/banks/"+e.imgbanco;
			$("#imgbank-accountdetail").attr("src", pathimgbanco);
			$("#namebank-accountdetail").text(e.banco);
			$("#typeaccount-accountdetail").text(e.tipo);
			$("#typecurrency-accountdetail").text(e.moneda+" "+"("+e.prefijo+")");
			$("#numaccount-accountdetail").text(e.numero);
			$("#aliasaccount-accountdetail").text(e.alias);
			$("#numaccountupdate-cli").val(e.numero);
			$("#aliasacccountupdate-cli").val(e.alias);
		});
	});
}
// ------------ MOSTRAR FORMULARIO DE EDITAR CUENTA 
$(document).on("click", "#btn-ShowUpdateAccount", function(){
	$("#menuListUpdateAccount").addClass("hidden");
	$("#formListUpdateAccount").addClass("show");
});
// ------------ CANCELAR LA ACTUALIZACIÓN DE LA CUENTA 
$(document).on("click", "#btn-HiddenupdateDetailsAccount", function(){
	$("#menuListUpdateAccount").removeClass("hidden");
	$("#formListUpdateAccount").removeClass("show");
	listAccountDetails();
});
// ------------ LIMITAR EL MÁXIMO DE NÚMEROS EN NÚMERO DE CUENTA 
$("#numaccountupdate-cli").on('keyup keypress blur change', function(e) {
  //return false if not 0-9
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
  }else{
    //limit length but allow backspace so that you can still delete the numbers.
    if( $(this).val().length >= parseInt($(this).attr('maxlength')) && (e.which != 8 && e.which != 0)){
        return false;
    }
  }
});
// ------------ VALIDAR SI SE HA ESCRITO EN NÚMERO DE CUENTA 
$(document).on("keyup", "#numaccountupdate-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounNumbDetailAccount").text("") : $("#msgerrorNounNumbDetailAccount").text("Debes colocar un numero de cuenta");
});
// ------------ VALIDAR SI SE HA ESCRITO EN ALIAS DE CUENTA 
$(document).on("keyup", "#aliasacccountupdate-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounAliasDetailAccount").text("") : $("#msgerrorNounAliasDetailAccount").text("Debes colocar un numero de cuenta");
});
// ------------ FORMULARIO DE ACTUALIZACIÓN DE DETALLE DE CUENTA 
$(document).on("click", "#btn-updateDetailsAccount", function(e){
	e.preventDefault();
	($("#numaccountupdate-cli").val() != "") ? $("#msgerrorNounNumbDetailAccount").text("") : $("#msgerrorNounNumbDetailAccount").text("Debes colocar un numero de cuenta");
	($("#aliasacccountupdate-cli").val() != "") ? $("#msgerrorNounAliasDetailAccount").text("") : $("#msgerrorNounAliasDetailAccount").text("Debes colocar un alias");
	if($("#numaccountupdate-cli").val() != "" && $("#aliasacccountupdate-cli").val() != ""){
		var formdata = new FormData();
		formdata.append("n_account", $("#numaccountupdate-cli").val());
		formdata.append("a_account", $("#aliasacccountupdate-cli").val());
	  formdata.append("id_client", idClient);
	  formdata.append("id_account", $("#val-idaccountdetail").val());
		$.ajax({
		  url: "./controllers/c_update-account-bank.php",
		  method: "POST",
		  data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
		}).done((e) => {
			if(e != ""){
				if(e == "true"){
					$("#menuListUpdateAccount").removeClass("hidden");
					$("#formListUpdateAccount").removeClass("show");
					listAccountDetails();
					listAccountsUser();
					Swal.fire({
		        title: 'Éxito!',
		        text: 'Se actualizó la cuenta.',
		        icon: 'success',
		        confirmButtonText: 'Aceptar'
		      });
				}else{
					Swal.fire({
		        title: 'Error!',
		        text: 'No se actualizó la cuenta.',
		        icon: 'error',
		        confirmButtonText: 'Aceptar'
		      });
				}
			}else{
				Swal.fire({
	        title: 'Error!',
	        text: 'No se actualizó la cuenta.',
	        icon: 'error',
	        confirmButtonText: 'Aceptar'
	      });
			}
		});
	}else{
		console.log('No hay registros que actualizar');
	}
});
// ------------ MOSTRAR LA ALERTA DE ELIMINAR CUENTA 
$(document).on("click", "#btn-ShowDeleteAccount", function(e){
	e.preventDefault();
	var aliasaccountdetail = $("#aliasacccountupdate-cli").val();
	$("#aliasAccount-delete").text('"'+aliasaccountdetail+'"');
	$(".alert-DeleteAccount").addClass("show");
	$(".alert-DeleteAccount--c").addClass("show");	
});
// ------------ CERRAR LA ALERTA DE ELIMINACIÓN 
$(document).on("click", "#btn-cancelDeleteAccount", function(){
	$(".alert-DeleteAccount").removeClass("show");
	$(".alert-DeleteAccount--c").removeClass("show");
});
let contformDelAccount = document.querySelector('.alert-DeleteAccount');
contformDelAccount.addEventListener('click', e => {
	if(e.target === contformDelAccount){
		contformDelAccount.classList.remove('show');
	}
});
// ------------ ELIMINAR UNA CUENTA 
$(document).on("click", "#btn-AceptDeleteAccount", function(e){
	e.preventDefault();
	var idaccountdetail = $("#val-idaccountdetail").val();
	$.ajax({
	  url: "./controllers/c_delete-account-bank.php",
	  method: "POST",
	  datatype: "JSON",
	  contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	  data: { id_client : idClient, id_account : idaccountdetail}
	}).done((e) => {
		if(e != ""){
			if(e == "true"){
				$(".alert-DeleteAccount").removeClass("show");
				$(".alert-DeleteAccount--c").removeClass("show");
				$(".cformDetailsAccount").removeClass("show");
				$(".cformDetailsAccount--contDetails").removeClass("show");
				listAccountDetails();
				listAccountsUser();
				Swal.fire({
	        title: 'Éxito!',
	        text: 'Se eliminó la cuenta.',
	        icon: 'success',
	        confirmButtonText: 'Aceptar'
	      });
			}else{
				Swal.fire({
	        title: 'Error!',
	        text: 'Lo sentimos, hubo un error al procesar la información.',
	        icon: 'error',
	        confirmButtonText: 'Aceptar'
	      });
			}
		}else{
			Swal.fire({
        title: 'Error!',
        text: 'Lo sentimos, hubo un error al procesar la información.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
		}
	});
});