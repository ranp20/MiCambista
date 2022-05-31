var cItemsBtnsValid = $(".cDash-adm--containRight--cContain__cBody__cardBodyInfo__cCardBody__contCol__cGrpBtnsValidOpts__c__btn");
if(cItemsBtnsValid != null && cItemsBtnsValid != undefined){
	$.each(cItemsBtnsValid, function(i,v){
		$(this).on("click", function(e){
			let arg_valid = $(this).attr("data-valid");
			let idClient = $("#val-id_client").val();
			let type_updsend = "";
			if(arg_valid == "confirm"){
				type_updsend = "confirmar";
			}else{
				type_updsend = "denegar";
			}
			Swal.fire({
			  title: `¿Desea ${type_updsend} la validación biométrica en este perfil?`,
			  html: `<p class='font-w-300'>Los datos serán eliminados y deberás agregarlo de nuevo para poder utilizarlo en otras operaciones.</p>`,
			  showDenyButton: true,
			  confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
			  confirmButtonText: `Sí, ${type_updsend}`,
			  denyButtonText: `No, cancelar`,
			}).then((e) => {
			  if(e.isConfirmed){
					var formdata = new FormData();
					formdata.append("type_update", arg_valid);
					formdata.append("id_client", idClient);
					$.ajax({
						url: "../controllers/c_update-validation-biometric.php",
						method: "POST",
						data: formdata,
						contentType: false,
					  cache: false,
					  processData: false,
					  beforeSend: function(){
					  	//console.log('Insertando la información');
					  },
					  success: function(e){
					  	if(e != ""){
					  		let r = JSON.parse(e);
					  		if(r.res == "update_confirm"){
					  			Swal.fire({
							      title: 'Validación aceptada!',
							      html: `<span class='font-w-300'>Ahora el cliente puede acceder a cambios con montos mayores.</span>`,
							      icon: 'success',
							      confirmButtonText: 'Aceptar'
							    });
					  		}else if(r.res == "update_canceled"){
					  			$("#c-imgFrontValidDoc").html(`<span>No se subió imagen</span>`);
					  			$("#c-imgBackValidDoc").html(`<span>No se subió imagen</span>`);
					  			$("#c-btnActionsToMultimediaDocs").html(``);
					  			Swal.fire({
							      title: 'CANCELADA!',
							      html: `<span class='font-w-300'>El cliente deberá subir nuevamente su información biométrica.</span>`,
							      icon: 'success',
							      confirmButtonText: 'Aceptar'
							    });
					  		}else{
					  			window.location.href = "../clientes";
					  		}
					  	}else{

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
			  }else if(e.isDenied){
			  	//console.log("se canceló la operación.");
			  }
			});
			
		});
	});
}