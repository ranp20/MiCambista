// ------------  MOSTRAR/OCULTAR LA CONTRASEÑA DEL INPUT DE PASSWORD 2
$(document).on("click", "#icon-loginPassControl", function(){
	var inploginPass = $(this).parent().find("input").attr("type");
	if(inploginPass == "password" && $(this).parent().find("input").val() != ""){
		$(this).parent().find("input").attr("type", "text");
		$(this).html(`
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cLogin__cont--fLogin--form--controls--cIcon--pass"><path d="M19.604 2.562l-3.346 3.137c-1.27-.428-2.686-.699-4.243-.699-7.569 0-12.015 6.551-12.015 6.551s1.928 2.951 5.146 5.138l-2.911 2.909 1.414 1.414 17.37-17.035-1.415-1.415zm-6.016 5.779c-3.288-1.453-6.681 1.908-5.265 5.206l-1.726 1.707c-1.814-1.16-3.225-2.65-4.06-3.66 1.493-1.648 4.817-4.594 9.478-4.594.927 0 1.796.119 2.61.315l-1.037 1.026zm-2.883 7.431l5.09-4.993c1.017 3.111-2.003 6.067-5.09 4.993zm13.295-4.221s-4.252 7.449-11.985 7.449c-1.379 0-2.662-.291-3.851-.737l1.614-1.583c.715.193 1.458.32 2.237.32 4.791 0 8.104-3.527 9.504-5.364-.729-.822-1.956-1.99-3.587-2.952l1.489-1.46c2.982 1.9 4.579 4.327 4.579 4.327z"/></svg>
		`);
	}else{
		$(this).parent().find("input").attr("type", "password");
		$(this).html(`
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        class="cLogin__cont--fLogin--form--controls--cIcon--pass">
        <path
            d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z" />
    	</svg>
		`);
	}
});
// ------------ LOGIN DE CLIENTE
$(document).on("submit", "#Login-PInstakash", function(e){
	e.preventDefault();
	var form = $(this).serializeArray();
  $.ajax({
    url: "./php/process_login-client.php",
    method: "POST",
    dataType: 'JSON',
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: form
  }).done((e) => {
  	//$('#Login-PInstakash')[0].reset();
  	if(e.response == "reg_incomplete"){
  		$("#msgAlertLogin").html(`<div class="msgAlertLogin--success">
																	<div class="msgAlertLogin--success--loader"></div>
																</div>
															`);

			setTimeout(function(){
				window.location.replace("complete-register");
			}, 500);
  	}else if(e.response == "reg_complete"){
  		$("#msgAlertLogin").html(`<div class="msgAlertLogin--success">
																	<div class="msgAlertLogin--success--loader"></div>
																</div>
															`);

			setTimeout(function(){
				window.location.replace("welcome");
			}, 500);
  	}else{
  		$("#msgAlertLogin").html(`<div class="msgAlertLogin--error">
																	<div class="msgAlertLogin--error--c">
																		<span class="msgAlertLogin--error--c--close" id="btnCloseErr"></span>
																		<h3 class="msgAlertLogin--error--c--title">¡Error!</h3>
																		<p class="msgAlertLogin--error--c--desc">Lo sentimos, los datos no son correctos o no existen</p>
																	</div>
																</div>
																`);
				
			setTimeout(function(){
				$('.msgAlertLogin--error').addClass('disabled');
			}, 4500);
			// ------------  CERRAR EL MENSAJE DE ERROR
			let containermodal = document.querySelector('.msgAlertLogin--error');
			containermodal.addEventListener('click', e => {
				if(e.target === containermodal)	containermodal.classList.add('disabled');
			});
			$("#btnCloseErr").on("click", function(){
				$(".msgAlertLogin--error").addClass("disabled");
			});
  	}
  });
});
// ------------  REGISTRO CON GOOGLE
// 	const btnLogwithGoogle = d.querySelector("#btnLognWithGoogleAuth");

// 	btnLogwithGoogle.addEventListener("click", function(e){
// 		e.preventDefault();

// 		var param = '{ "action" : "loginwithgoogle"}';

// 		var ajaxG = new XMLHttpRequest();
// 		var urlG = 'php/process_loginwithGoogle.php';
// 		var dataG = param;

// 		ajaxG.open('POST', urlG, true);
// 		ajaxG.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

// 		ajaxG.onreadystatechange = function () {
// 			if (ajaxG.readyState == 4 && ajaxG.status == 200) {
// 				var res = JSON.parse(ajaxG.responseText);
// 				console.log(res);
// 			}
// 		};

// 		ajaxG.send(dataG);
// 	});	
// })(document);