((d) => {
	
	const fDataAdm = d.querySelector("#Login-PInstakash");

	fDataAdm.addEventListener('submit', function(e){
		e.preventDefault();

		let ajax = new XMLHttpRequest();
		let url = "php/process_login-adm.php";
		let data = new FormData(fDataAdm);

		ajax.open("POST", url, true);

		ajax.onreadystatechange = function(){

			if(ajax.readyState == 4 && ajax.status == 200){
				let res = JSON.parse(ajax.responseText);

				if(res.response == "true"){

					d.querySelector("#msgAlertLogin").innerHTML = `<div class="msgAlertLogin--success">
																													<div class="msgAlertLogin--success--loader"></div>
																												</div>
																												`;

					setTimeout(function(){
						window.location.replace("../dashboard");
					}, 500);

				}else{

					d.querySelector("#msgAlertLogin").innerHTML = `<div class="msgAlertLogin--error">
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

					/* CERRAR EL MENSAJE DE ERROR */
					let containermodal = document.querySelector('.msgAlertLogin--error');
					containermodal.addEventListener('click', e => {
						if(e.target === containermodal)	containermodal.classList.add('disabled');
					});

					d.querySelector("#btnCloseErr").addEventListener("click", function(){
						d.querySelector(".msgAlertLogin--error").classList.add("disabled");
					});
				}
			}
		}

		ajax.send(data);

	});	

})(document)