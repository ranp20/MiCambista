var idClient = $("#input-idClientValEnterprise").val();
// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE REGISTRO DE EMPRESAS 
document.querySelector("#btn-addAccountEnterpriseShow").addEventListener("click", function(){
	document.querySelector(".cformAddAccountEnterprise").classList.add("show");
	document.querySelector(".cformAddAccountEnterprise--form").classList.add("show");
});
let contformRegEnterprise = document.querySelector('.cformAddAccountEnterprise');
contformRegEnterprise.addEventListener('click', e => {
	if(e.target === contformRegEnterprise)	contformRegEnterprise.classList.remove('show');
});
// ------------ LIMITAR EL MÁXIMO DE NÚMEROS EN RUC 
$("#rucenpterprise-cli").on('keyup keypress blur change', function(e) {
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
// ------------ VALIDAR SI EL NOMBRE DE EMPRESA ESTÁ VACÍO 
$(document).on("keyup", "#nameenpterprise-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounNameEnterprise").text("") : $("#msgerrorNounNameEnterprise").text("Debes ingresar el nombre de tu empresa");
});
// ------------ VALIDAR SI EL RUC DE EMPRESA ESTÁ VACÍO 
$(document).on("keyup", "#rucenpterprise-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounRUCEnterprise").text("") : $("#msgerrorNounRUCEnterprise").text("Debes ingresar el RUC de tu empresa");
});
// ------------ VALIDAR SI LA DIRECCIÓN DE LA EMPRESA ESTÁ VACÍO 
$(document).on("keyup", "#addressenpterprise-cli", function(){
	($(this).val() != 0) ? $("#msgerrorNounAddressEnterprise").text("") : $("#msgerrorNounAddressEnterprise").text("Debes colocar la dirección fiscal");
});
// ------------ VALIDAR SI ESTÁ MARCADO EL CHECKBOX 
$(document).on("click", "#checkenterprise-cli", function(){
	($(this).is(':checked')) ? $("#msgerrorNouncheckedEnterprise").text("") : $("#msgerrorNouncheckedEnterprise").text("Debes aceptar que eres el representante legal");
});
// ------------ AGREGAR CUENTA BANCARIA 
$(document).on("click", "#btn-addAccountEnterprise", function(e){
	e.preventDefault();
	// ------------ AGREGAR MENSAJE EN LOS SPAN 
	($("#nameenpterprise-cli").val() != "") ? $("#msgerrorNounNameEnterprise").text("") : $("#msgerrorNounNameEnterprise").text("Debes ingresar el nombre de tu empresa");
	($("#rucenpterprise-cli").val() != "") ? $("#msgerrorNounRUCEnterprise").text("") : $("#msgerrorNounRUCEnterprise").text("Debes ingresar el RUC de tu empresa");
	($("#addressenpterprise-cli").val() != "") ? $("#msgerrorNounAddressEnterprise").text("") : $("#msgerrorNounAddressEnterprise").text("Debes colocar la dirección fiscal");
	($("#checkenterprise-cli").is(":checked")) ? $("#msgerrorNouncheckedEnterprise").text("") : $("#msgerrorNouncheckedEnterprise").text("Debes aceptar que eres el representante legal");

	if($("#nameenpterprise-cli").val() != "" && $("#rucenpterprise-cli").val() != "" && $("#addressenpterprise-cli").val() != "" && $("#checkenterprise-cli").is(":checked")){
		var obj_form = {
			nameenterprise: $("#nameenpterprise-cli").val(),
			rucenterprise: $("#rucenpterprise-cli").val(),
			addressenterprise: $("#addressenpterprise-cli").val(),
			idclient: idClient,
		};

		var formdata = new FormData();
		formdata.append("name", obj_form['nameenterprise']);
		formdata.append("ruc", obj_form['rucenterprise']);
		formdata.append("address", obj_form['addressenterprise']);
		formdata.append("id_client", obj_form['idclient']);

	  $.ajax({
	    url: "controllers/c_add-account-enterprise.php",
	    method: "POST",
	    data: formdata,
	    contentType: false,
	    cache: false,
	    processData: false,
	  }).done((e) => {
	  	console.log(e);
	  	/*
	  	if(res == "true"){		  	
	     	// ------------ LIMPIAR FORMULARIO 
		  	$(".cformAddAccountEnterprise").removeClass("show");
				$(".cformAddAccountEnterprise--form").removeClass("show");
	     	$('#form-AddAccountEnterprise')[0].reset();
				// ------------ ALERTA 
				$("#msgAlertLogin").html(`
  			<div class='message-success'>
					<div class='message-success__content'>
						<div class='message-success__content--btnclosed' id='btnclosed'></div>
						<h2 class='message-success__content--title'>Agregado!</h2>
						<p class='message-success__content--text'>Se agregó la empresa correctamente.</p>
					</div>
				</div>
	  		`);
				setTimeout(function(){
					location.replace("control-panel");
				}, 500);
	  	}else{
	  		console.log('Error, no se insertó');
	  	}
	  	*/
	  });
	}else{
		console.log('No hay datos');
	}
});