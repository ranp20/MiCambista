// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE REGISTRO DE CUENTAS BANCARIAS
const btn_frmOpenAddAccountEnterprise = document.querySelector("#btn-addAccountEnterpriseShow"),
			btn_frmCloseAddAccountEnterprise = document.querySelector("#icon_frmbtnCloseFrmEnterprise"),
			c_totalfrmAddAccountEnterprise = document.querySelector(".cformAddAccountEnterprise"),
			c_containfrmAddAccountEnterprise = document.querySelector("#form-AddAccountEnterprise");
if(btn_frmOpenAddAccountEnterprise != null && btn_frmOpenAddAccountEnterprise != undefined){
	btn_frmOpenAddAccountEnterprise.addEventListener("click", function(){
		c_totalfrmAddAccountEnterprise.classList.add("show");
		c_containfrmAddAccountEnterprise.classList.add("show");
	});
}
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
// ------------ AGREGAR PERFIL DE EMPRESA
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
							<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
								<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
									<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
											<img src='./views/assets/img/svg/male-dark.svg' alt='' width='100' height='100'>
										</span>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
											<span>${r.received[0].name + r.received[0].lastname}</span>
										</span>
									</span>
								</a>
							</div>
							<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
								<span class='cControlP__cont--containDash--c__cBtnsOpts-m--item__cIconClose'>
									<span>
										<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='30px' height='30px' version='1.1' viewBox='0 0 700 700'><g><path d='m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z' fill-rule='evenodd'/></g></svg>
									</span>
								</span>
								<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link' data-id='${r.received[0].id}' token='${r.received[0]._token}'>
									<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
											<img src='./views/assets/img/svg/company-or-enterprise.svg' alt='' width='100' height='100'>
										</span>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
											<span>${r.received[0].name_enterprise}</span>
										</span>
									</span>
								</a>
							</div>
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
// ------------ ELIMINAR PERFILES
var item_multiprofile = $(".cControlP__cont--containDash--c__cBtnsOpts-m--item__cIconClose");
/*
item_multiprofile.on("click", function(e){
});
*/
$(document).on("click", ".cControlP__cont--containDash--c__cBtnsOpts-m--item__cIconClose", function(e){
	e.preventDefault();
	let client_token = $(this).parent().find("a").attr("data-token");
	let idClient = $(this).parent().find("a").attr("data-id");
	let idMulti = $(this).parent().find("a").attr("data-multiid");
	Swal.fire({
	  title: '¿Deseas eliminar este perfil?',
	  html: `<p class='font-w-300'>Los datos serán eliminados y deberás agregarlo de nuevo para poder utilizarlo en otras operaciones.</p>`,
	  showDenyButton: true,
	  confirmButtonColor: '#3085d6',
  	cancelButtonColor: '#d33',
	  confirmButtonText: 'Sí, eliminar',
	  denyButtonText: `No, cancelar`,
	}).then((e) => {
	  if(e.isConfirmed){
	  	var formdata = new FormData();
	  	formdata.append("token", client_token);
	  	formdata.append("id_client", idClient);
	  	formdata.append("id_multiprofile", idMulti);
	  	$.ajax({
				url: "./controllers/c_delete-profile-enterprise.php",
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
		    		if(r.response == "true"){
		    			tmp_profiles += `
							<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
								<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
									<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
											<img src='./views/assets/img/svg/male-dark.svg' alt='' width='100' height='100'>
										</span>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
											<span>${r.received[0].name + r.received[0].lastname}</span>
										</span>
									</span>
								</a>
							</div>
							<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item c-NotBackground'>
								<a href='javascript:void(0);' class='cControlP__cont--containDash--c__cBtnsOpts-m--link' id='btn-addAccountEnterpriseShow'>
									<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
											<img src='./views/assets/img/svg/add-profile.svg' alt='' width='100' height='100' style='width:auto;height:auto;padding:1.75rem;'>
										</span>
										<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
											<span>Agregar empresa</span>
										</span>
									</span>
								</a>
							</div>
		    			`;
		    			c_profiles.html(tmp_profiles);
							Swal.fire({
					      title: 'Perfil Eliminado!',
					      html: `<span class='font-w-300'>El perfil ha sido eliminado correctamente. Deberá seleccionar un nuevo perfil.</span>`,
					      icon: 'success',
					      confirmButtonText: 'Aceptar'
					    });
		    		}else{
		    			Swal.fire({
					      title: 'Error!',
					      html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar su información.</span>`,
					      icon: 'warning',
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
	  }else if (e.isDenied){
	  	console.log('Se canceló la eliminación.');
	  }
	});
});