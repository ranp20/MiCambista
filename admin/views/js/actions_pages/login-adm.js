$(document).on("submit", "#Login-PInstakash", function(e){
	e.preventDefault();
	var form = $(this).serializeArray();
	$.ajax({
    url: "php/process_login-adm.php",
    method: "POST",
    dataType: 'JSON',
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: form
  }).done((e) => {
  	if(e.response == "true"){
			$("#msgAlertLogin").html(`<div class="msgAlertLogin--success">
																											<div class="msgAlertLogin--success--loader"></div>
																										</div>
																										`);

			setTimeout(function(){
				window.location.replace("../dashboard");
			}, 500);
		}else if(e.response == "error_email"){
			$("#msgAlertLogin").html(`<div class="msgAlertLogin--error">
																											<div class="msgAlertLogin--error--c">
																												<span class="msgAlertLogin--error--c--close" id="btnCloseErr"></span>
																												<h3 class="msgAlertLogin--error--c--title">¡Correo Inválido!</h3>
																												<p class="msgAlertLogin--error--c--desc">El correo electrónico ingresado no es válido.</p>
																											</div>
																										</div>
																										`);
		
			setTimeout(function(){
				document.querySelector('.msgAlertLogin--error').classList.add('disabled');
			}, 4500);
			// ------------ CERRAR EL MENSAJE DE ERROR
			let containermodal = document.querySelector('.msgAlertLogin--error');
			containermodal.addEventListener('click', e => {
				if(e.target === containermodal)	containermodal.classList.add('disabled');
			});
			document.querySelector("#btnCloseErr").addEventListener("click", function(){
				document.querySelector(".msgAlertLogin--error").classList.add("disabled");
			});
		}else{
			document.querySelector("#msgAlertLogin").innerHTML = `<div class="msgAlertLogin--error">
																											<div class="msgAlertLogin--error--c">
																												<span class="msgAlertLogin--error--c--close" id="btnCloseErr"></span>
																												<h3 class="msgAlertLogin--error--c--title">¡Error!</h3>
																												<p class="msgAlertLogin--error--c--desc">Lo sentimos, los datos no son correctos o no existen</p>
																											</div>
																										</div>
																										`;
		
			setTimeout(function(){
				document.querySelector('.msgAlertLogin--error').classList.add('disabled');
			}, 4500);
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
});