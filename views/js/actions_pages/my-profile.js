$(() => {
	//listInfoGeneralUser();
});
// ------------ MOSTRAR EL MODAL DE VALIDACIÓN
$(document).on("click", "#link-SValidModalAccBiometric", function(){
	$("#box-ModalValidAccBiometric").addClass("show");
	$("#box-ModalValidAccBiometric").html(`
		<div class="box-ModalValidAccBiometric--c">
			<span class="box-ModalValidAccBiometric--c--close" id="icon-closeModalVAccBiometric"></span>
			<h2 class="box-ModalValidAccBiometric--c--title">VERIFICACIÓN ID</h2>
			<p class="box-ModalValidAccBiometric--c--desc">Si vas a realizar operaciones que superen los <b>USD 5000 dólares</b> en menos de un mes, debemos <b>cuidar tu identidad</b> de riesgo de fraude o suplantación, ten a la mano tu <b>documento de identidad</b>. Además, accede a mejores beneficios y <b>promociones</b></p>
			<a href="validation-biometric" class="box-ModalValidAccBiometric--c--btnNextStep">VERIFICAR</a>
		</div>
	`);
});
// ------------ CERRAR EL MODAL DE VALIDACIÓN
$(document).on("click", "#icon-closeModalVAccBiometric", function(){$("#box-ModalValidAccBiometric").removeClass("show");});
let contValidationBio = document.querySelector("#box-ModalValidAccBiometric");
contValidationBio.addEventListener("click", e => {
	if(e.target === contValidationBio){contValidationBio.classList.remove("show");}
})
/*
function listInfoGeneralUser(){
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
    	console.log(e);
    },
	 	statusCode: {
	    404: function(){
	      console.log('Error 404: La página de consulta no fue encontrada.');
	    }
	  },
	  error:function(x,xs,xt){
	    console.log(JSON.stringify(x));
	  }
	});
}
*/