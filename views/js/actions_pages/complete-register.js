var idClientInitial = $("#val-cliid_session").val();
// ------------ LISTAR LOS TIPOS DE DOCUMENTOS
$(document).on("click", "#selListallTypeDocuments", function(e){
	var btnshow = $("#listtypesDocuments");
	$.ajax({
		url: "controllers/c_list-type-documents.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done((res) => {
		var ttypeaccount = "";
		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				ttypeaccount += `
						<li class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments--itemanybanks">
							<span class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listtypesDocuments").html(ttypeaccount);
			}else{
				res.forEach((e) => {
					ttypeaccount += `
						<li class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments--item" id="${e.id}">
							<span class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments--item--typedocument">${e.type}</span>
						</li>
					`;
				});
				$("#listtypesDocuments").html(ttypeaccount);
			}
		}else{
			btnshow.removeClass("show");
			$("#listtypesDocuments").html("");
		}
	});
});
// ------------ FIJAR EL TIPO DE DOCUMENTO 
$(document).on("click", ".cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments--item", function(e){
	e.preventDefault();
	//$("#msgerrorNounSelBank").text("");
	$.each($(this), function(i, v){
		var gettypedocument = {
			typedocumentid: $(this).attr("id"),
			typedocumenttype: $(this).find("span").text(),
		};
		$("#selListallTypeDocuments--img").find("span").css({"display":"none"});
		$("#newValTypeDocument").find("span").text(gettypedocument['typedocumenttype']);
		$("#selListtypeDocument--input").attr("idtypedocument", gettypedocument['typedocumentid']);
	});
});
// ------------ LISTAR LOS TIPOS DE SEXO 
$(document).on("click", "#selListallTypeSex", function(e){
	var btnshow = $("#listtypesSex");
	$.ajax({
		url: "controllers/c_list-type-sex.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	}).done((res) => {
		var ttypesex = "";
		if(!btnshow.hasClass("show")){
			btnshow.addClass("show");
			if(res.length <= 0 || res == []){
				ttypesex += `
						<li class="cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex--itemanybanks">
							<span class="cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex--itemanybanks--desc">No se encontraron resultados</span>
						</li>
					`;
				$("#listtypesSex").html(ttypesex);
			}else{
				res.forEach((e) => {
					ttypesex += `
						<li class="cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex--item" id="${e.id}">
							<span class="cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex--item--typesex" preftypesex="${e.prefix}">${e.sex}</span>
						</li>
					`;
				});
				$("#listtypesSex").html(ttypesex);
			}
		}else{
			btnshow.removeClass("show");
			$("#listtypesSex").html("");
		}
	});
});
// ------------ FIJAR EL TIPO DE DOCUMENTO 
$(document).on("click", ".cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex--item", function(e){
	e.preventDefault();
	$("#msgerrorNounSelTypeSex").text("");
	$.each($(this), function(i, v){
		var gettypesex = {
			typesexid: $(this).attr("id"),
			typesextype: $(this).find("span").text(),
			typesexprefix: $(this).find("span").attr("preftypesex"),
		};
		$("#selListallTypeSex--img").find("span").css({"display":"none"});
		$("#newValTypeSex").find("span").text(gettypesex['typesextype']);
		$("#selListtypeSex--input").attr("idtypesex", gettypesex['typesexid']);
		$("#selListtypeSex--input").attr("typesexprefix", gettypesex['typesexprefix']);
	});
});
// ------------ VALIDAR SI EL CAMPO DE NOMBRES ESTÁ VACÍO 
$(document).on("keyup", "#names-micambista", function(){
	($(this).val() != 0) ? $("#msgerrorNounNamesCli").text("") : $("#msgerrorNounNamesCli").text("Debes colocar un nombre");
});
// ------------ VALIDAR SI EL CAMPO DE APELLIDOS ESTÁ VACÍO 
$(document).on("keyup", "#lastnames-micambista", function(){
	($(this).val() != 0) ? $("#msgerrorNounLastnamesCli").text("") : $("#msgerrorNounLastnamesCli").text("Debes colocar un apellido");
});
// ------------ VALIDAR SI EL CAMPO DE NÚMERO DE DOCUMENTO ESTÁ VACÍO 
$(document).on("keyup", "#nrodocument-micambista", function(){
	($(this).val() != 0) ? $("#msgerrorNounNroDocumentCli").text("") : $("#msgerrorNounNroDocumentCli").text("Debes colocar tu nro. de documento");
});
$(document).on("click", "#btn-CompleteRegister", function(e){
	e.preventDefault();
	($("#names-micambista").val() != "") ? $("#msgerrorNounNamesCli").text("") : $("#msgerrorNounNamesCli").text("Debes colocar un nombre");
	($("#lastnames-micambista").val() != "") ? $("#msgerrorNounLastnamesCli").text("") : $("#msgerrorNounLastnamesCli").text("Debes colocar un apellido");
	($("#nrodocument-micambista").val() != "") ? $("#msgerrorNounNroDocumentCli").text("") : $("#msgerrorNounNroDocumentCli").text("Debes colocar tu nro. de documento");
	($("#selListtypeSex--input").attr("idtypesex")) ? $("#msgerrorNounSelTypeSex").text("") : $("#msgerrorNounSelTypeSex").text("Debes seleccionar una opción");

	if($("#selListtypeSex--input").attr("idtypesex")){
		var obj_cClient = {
			namescli: $("#names-micambista").val(),
			lastnamescli: $("#lastnames-micambista").val(),
			typedocumentcli: ($("#selListtypeDocument--input").attr("idtypedocument") == undefined || $("#selListtypeDocument--input").attr("idtypedocument").length <= 0) ? "1" : $("#selListtypeDocument--input").attr("idtypedocument"),
			num_documentcli: $("#nrodocument-micambista").val(),
			typesexcli: $("#selListtypeSex--input").attr("idtypesex"),
			prefixtypesex: $("#selListtypeSex--input").attr("typesexprefix"),
		};
		var formdata = new FormData();
		formdata.append("name", obj_cClient['namescli']);
		formdata.append("lastname", obj_cClient['lastnamescli']);
	  formdata.append("n_document", obj_cClient['num_documentcli']);
	  formdata.append("sex", obj_cClient['prefixtypesex']);
	  formdata.append("id_type_document", obj_cClient['typedocumentcli']);
	  formdata.append("id_type_sex", obj_cClient['typesexcli']);
	  formdata.append("id_client", idClientInitial);

	  $.ajax({
	    url: "controllers/c_add-complete-register.php",
	    method: "POST",
	    data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
	  }).done((e) => {
	  	if(e == "true"){
	  		$("#msgAlertLogin").html(`
	  			<div class='message-success'>
						<div class='message-success__content'>
							<div class='message-success__content--btnclosed' id='btnclosed'></div>
							<h2 class='message-success__content--title'>Registro Completo!</h2>
							<p class='message-success__content--text'>Felicidades, has completado el registro correctamente!</p>
						</div>
					</div>
	  		`);
				setTimeout(function(){
					location.replace("control-panel");
				}, 500);
	  	}else{
	  		$("#msgAlertLogin").html(`
  			<div class="msgAlertLogin--error">
					<div class="msgAlertLogin--error--c">
						<span class="msgAlertLogin--error--c--close" id="btnCloseErr"></span>
						<h3 class="msgAlertLogin--error--c--title">¡Error!</h3>
						<p class="msgAlertLogin--error--c--desc">Lo sentimos, hubo un error al completar el regitro.</p>
					</div>
				</div>
	  		`);
	  		setTimeout(function(){
					$('.msgAlertLogin--error').addClass('disabled');
				}, 5500);
				// ------------ CERRAR EL MENSAJE DE ERROR 
				let containermodal = document.querySelector('.msgAlertLogin--error');
				containermodal.addEventListener('click', e => {
					if(e.target === containermodal)	containermodal.classList.add('disabled');
				});
				document.querySelector("#btnCloseErr").addEventListener("click", function(){
					document.querySelector(".msgAlertLogin--error").classList.add("disabled");
				});
	  	}
		});
	}else{
		console.log('Error, no hay datos.');
	}
});