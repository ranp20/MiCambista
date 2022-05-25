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
			url: "./php/process_add_profile-enterprise.php",
			method: "POST",
			data: formdata,
			contentType: false,
	    cache: false,
	    processData: false,
	    beforeSend: function(){
	    	//console.log('Insertando la información');
	    },
	    success: function(e){
	    	let c_profiles = $("#c_listTypeProfileOfUser");
	    	let tmp_profiles = "";
	    	if(e != ""){
	    		let r = JSON.parse(e);
		    	if(r.response == "true" || r.response == true){
		    		
		    		tmp_profiles += `
		    			<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
								<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__cIcon">
									<img src='./views/assets/img/svg/user-male.svg' alt='' width="100" height="100">
								</span>
								<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__ctext">
									<span>${r.received[0].name + r.received[0].lastname}</span>
								</span>
							</a>
							<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
								<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__cIcon" data-id-enterprise="${r.received[0].id_enterprise}">
									<img src='./views/assets/img/svg/company-or-enterprise.svg' alt='' width="100" height="100">
								</span>
								<span class="cControlP__cont--containDash--c__cBtnsOpts-m--item__ctext">
									<span>${r.received[0].name_enterprise}</span>
								</span>
							</a>
		    		`;
		    		c_profiles.html(tmp_profiles);
		    		Swal.fire({
				      title: 'Éxito!',
				      html: `<span class='font-w-300'>La empresa se agregó correctamente.</span>`,
				      icon: 'success',
				      confirmButtonText: 'Aceptar'
				    });
				    c_totalfrmAddAccountEnterprise.classList.remove('show');
						c_containfrmAddAccountEnterprise.classList.remove("show");
		    	}else if(r.response == "limit_profiles"){
		    		Swal.fire({
				      title: 'Atención!',
				      html: `<span class='font-w-300'>Se ha alcanzado el límite máximo de perfiles para empresa.</span>`,
				      icon: 'warning',
				      confirmButtonText: 'Aceptar'
				    });
		    	}else{
		    		Swal.fire({
				      title: 'Error!',
				      html: `<span class='font-w-300'>La empresa <strong>NO</strong> se agregó correctamente.</span>`,
				      icon: 'error',
				      confirmButtonText: 'Aceptar'
				    });
		    	}
	    	}else{
	    		Swal.fire({
			      title: 'Error!',
			      html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar su información.</span>`,
			      icon: 'warning',
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