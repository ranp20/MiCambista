// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE REGISTRO DE CUENTAS BANCARIAS
const btn_frmOpenAddAccountEnterprise = document.querySelector("#btn-addAccountEnterpriseShow"),
			btn_frmCloseAddAccountEnterprise = document.querySelector("#icon_frmbtnCloseFrmEnterprise"),
			c_totalfrmAddAccountEnterprise = document.querySelector(".cformAddAccountEnterprise"),
			c_containfrmAddAccountEnterprise = document.querySelector("#form-AddAccountEnterprise");
btn_frmOpenAddAccountEnterprise.addEventListener("click", function(){
	c_totalfrmAddAccountEnterprise.classList.add("show");
	c_containfrmAddAccountEnterprise.classList.add("show");
});
btn_frmCloseAddAccountEnterprise.addEventListener("click", function(){
	c_totalfrmAddAccountEnterprise.classList.remove("show");
	c_containfrmAddAccountEnterprise.classList.remove("show");
});
c_totalfrmAddAccountEnterprise.addEventListener('click', e => {
	if(e.target === c_totalfrmAddAccountEnterprise){
		c_totalfrmAddAccountEnterprise.classList.remove('show');
		c_containfrmAddAccountEnterprise.classList.remove("show");
	}
});
// ------------ EVENTO KEYPRESS - INPUT DE NÚMERO DE RUC
$(document).on("keypress", "#rucenpterprise-cli", function(e){
	var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)){
    $(this).addClass("non-validval");
    $(this).next().text("Solo se permiten números en este campo *");
    return false;
  }else{
  	$(this).removeClass("non-validval");
  	$(this).next().text("");
  	return true;
  }
});
$(document).on("submit", "#form-AddAccountEnterprise", function(e){
	e.preventDefault();
	if($("#input-idClientValEnterprise").val() != "" && $("#input-idClientValEnterprise").val() != 0 && 
		$("#nameenpterprise-cli").val() != "" && $("#nameenpterprise-cli").val() != 0 &&
		$("#rucenpterprise-cli").val() != "" && $("#rucenpterprise-cli").val() != 0 &&
		$("#addressenpterprise-cli").val() != "" && $("#addressenpterprise-clii").val() != 0 &&
		$("#checkenterprise-cli").is(":checked")){
		
		let formdata = new FormData();
		formdata.append("ruc", $("#rucenpterprise-cli").val());
		formdata.append("name", $("#nameenpterprise-cli").val());
		formdata.append("address", $("#addressenpterprise-cli").val());
		formdata.append("id_client", $("#input-idClientValEnterprise").val());

		$.ajax({
			url: "./controllers/c_add-profile-enterprise.php",
			method: "POST",
			data: formdata,
			contentType: false,
	    cache: false,
	    processData: false,
	    beforeSend: function(){
	    	//console.log('Insertando la información');
	    },
	    success: function(e){
	    	if(e == "true" || e == true){
	    		Swal.fire({
			      title: 'Éxito!',
			      html: `<span class='font-w-300'>La empresa se agregó correctamente.</span>`,
			      icon: 'success',
			      confirmButtonText: 'Aceptar'
			    });
			    c_totalfrmAddAccountEnterprise.classList.remove('show');
					c_containfrmAddAccountEnterprise.classList.remove("show");
	    	}else{
	    		Swal.fire({
			      title: 'Error!',
			      html: `<span class='font-w-300'>La empresa <strong>NO</strong> se agregó correctamente.</span>`,
			      icon: 'error',
			      confirmButtonText: 'Aceptar'
			    });
	    	}
	    },
		 	statusCode: {
		    404: function(){
		      console.log('Error 404: La página de consulta no fue encotrada.');
		    }
		  },
		  error:function(x,xs,xt){
		    console.log(JSON.stringify(x));
		  }
		});
	}else{
		Swal.fire({
      title: 'Atención!',
      html: `<span class='font-w-300'>Debes completar toda la información para continuar.</span>`,
      icon: 'warning',
      confirmButtonText: 'Aceptar'
    });
	}
});