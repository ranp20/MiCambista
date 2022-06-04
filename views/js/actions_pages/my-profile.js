$(() => {
	listInfoGeneralUser();
});
var dataUser_item = [];
// ------------ MOSTRAR EL MODAL DE VALIDACIÓN
$(document).on("click", "#link-SValidModalAccBiometric", function(){
	$("#box-ModalValidAccBiometric").addClass("show");
	$("#box-ModalValidAccBiometric").html(`
		<div class="box-ModalValidAccBiometric--c">
			<span class="box-ModalValidAccBiometric--c--close" id="icon-closeModalVAccBiometric">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" version="1.1" viewBox="0 0 700 700"><g><path d="m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z" fill-rule="evenodd"/></g></svg>
			</span>
			<h2 class="box-ModalValidAccBiometric--c--title">VERIFICACIÓN ID</h2>
			<p class="box-ModalValidAccBiometric--c--desc">Si vas a realizar operaciones que superen los <strong class="bold-pricolor">USD 5000 dólares</strong> en menos de un mes, debemos <strong class="bold-pricolor">cuidar tu identidad</strong> de riesgo de fraude o suplantación, ten a la mano tu <strong class="bold-pricolor">documento de identidad</strong>. Además, accede a mejores beneficios y <strong class="bold-pricolor">promociones</strong></p>
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

function listInfoGeneralUser(){
	var idClient = $("#ipt-idCliValUpdateMyProfile").val();
	var formdata = new FormData();
	formdata.append("id_client", idClient);
	$.ajax({
		url: "./controllers/c_list-info-general.php",
		method: "POST",
		data: formdata,
		contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
    	//console.log('Insertando la información');
    },
    success: function(e){
    	let tmp_dataInfoClient = "";
    	let c_dataInfoClientUpdate = $("#c__userData-iptsProfile");
    	if(e != ""){
    		var r = JSON.parse(e);
    		dataUser_item[0] = r[0].name;
    		dataUser_item[1] = r[0].lastname;
    		dataUser_item[2] = r[0].type+" "+r[0].n_document;
    		dataUser_item[3] = r[0].telephone;
    		dataUser_item[4] = r[0].email;
    		dataUser_item[5] = (r[0].occupation != undefined && r[0].occupation != "") ? r[0].occupation : "No especificada";
    		dataUser_item[6] = (r[0].nationality != undefined && r[0].nationality != "") ? r[0].nationality : "No especificada";
    		dataUser_item[7] = (r[0].politically_exposed != undefined && r[0].politically_exposed != "") ? r[0].politically_exposed : "NO";
    		
    		tmp_dataInfoClient += `
				<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item">
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Nombres</label>
						<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--input">${dataUser_item[0]}</p>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Apellidos</label>
						<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--input">${dataUser_item[1]}</p>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Documento</label>
						<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--input">
							<span>${dataUser_item[2]}</span>
						</p>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Teléfono</label>
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData">
							<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[3]}</p>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
								</div>
							</div>
						</div>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Correo</label>
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData">
							<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[4]}</p>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
								</div>
							</div>
						</div>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Ocupación</label>
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData">
							<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[5]}</p>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
								</div>
							</div>
						</div>
					</div>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-tab-2">
						<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">Nacionalidad</label>
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData">
							<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[6]}</p>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
								</div>
							</div>
						</div>
					</div>
				</div>    			
    		`;

    		if(dataUser_item[7] == "YES"){
    			tmp_dataInfoClient += `
    			<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item">
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-desk-1">
							<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">¿Es usted una persona políticamente expuesta?</label>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData">
								<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont">
									<input type="checkbox" checked id="chck_politically_exposed" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont__input">
									<label for="chck_politically_exposed" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont__label"></label>
								</div>
							</div>
						</div>
					</div>
    			`;
    		}else{
    			tmp_dataInfoClient += `
    			<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item">
						<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control col-desk-1">
							<label for="" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--label">¿Es usted una persona políticamente expuesta?</label>
							<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData">
								<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont">
									<input type="checkbox" id="chck_politically_exposed" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont__input">
									<label for="chck_politically_exposed" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptOnlyOneData__chckCont__label"></label>
								</div>
							</div>
						</div>
					</div>
    			`;
    		}
    		c_dataInfoClientUpdate.html(tmp_dataInfoClient);
    	}else{
    		console.log('No hay datos del usuario');
    	}
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
$(document).on("click", ".cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon", function(){
	let t_eqItem = $(this).parent().parent();
	$.each(t_eqItem, function(i,v){
		let thisItem = $(this).eq(i);
		let thisItem_cUpdate = thisItem.find(".cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData");
		let indexItem = $(this).index();
		if(indexItem == 3){
			thisItem_cUpdate.html(`<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus">
				<input type="text" maxlength="12" name="p_telephone" value="${dataUser_item[3]}">
				<button type="submit" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-confirm">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
				</button>
				<button type="button" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
				</button>
			</div>`);
		}else if(indexItem == 4){
			thisItem_cUpdate.html(`<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus">
				<input type="text" name="p_email" value="${dataUser_item[4]}">
				<button type="submit" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-confirm">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
				</button>
				<button type="button" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
				</button>
			</div>`);
		}else if(indexItem == 5){
			thisItem_cUpdate.html(`<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus">
				<input type="text" name="p_occupation" value="${dataUser_item[5]}">
				<button type="submit" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-confirm">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
				</button>
				<button type="button" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
				</button>
			</div>`);
		}else if(indexItem == 6){
			thisItem_cUpdate.html(`<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus">
				<input type="text" name="p_nationality" value="${dataUser_item[6]}">
				<button type="submit" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-confirm">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='28px' height='28px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m124.28 346.64c-18.781-18.781-18.781-49.242 0-68.008 18.781-18.781 49.242-18.781 68.023 0l92.234 92.234 219.34-283.7c16.18-20.965 46.301-24.832 67.27-8.6523 20.965 16.18 24.832 46.301 8.6523 67.27l-250.47 323.97c-1.7812 2.7031-3.8633 5.2734-6.2344 7.6602-18.781 18.781-49.242 18.781-68.023 0l-130.77-130.77z'/></g></svg>
				</button>
				<button type="button" class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel">
					<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='27px' height='27px' version='1.1' viewBox='0 0 700 700'><g xmlns='http://www.w3.org/2000/svg'><path d='m414.4 280 174.16-174.16c17.922-17.922 17.922-46.48 0-64.398-17.922-17.922-46.48-17.922-64.398 0l-174.16 174.16-174.16-174.16c-17.922-17.922-46.48-17.922-64.398 0-17.922 17.922-17.922 46.48 0 64.398l174.16 174.16-174.16 174.16c-17.922 17.922-17.922 46.48 0 64.398 8.957 8.9609 20.16 13.441 31.918 13.441 11.762 0 23.52-4.4805 31.922-13.441l174.72-174.16 174.16 174.16c8.9609 8.9609 20.719 13.441 31.922 13.441 11.762 0 23.52-4.4805 31.922-13.441 17.922-17.922 17.922-46.48 0-64.398z'/></g></svg>
				</button>
			</div>`);
		}else{
			console.log("Elemento no editable");
		}
		let btnCancelUpdate = $(".cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel");
		if(btnCancelUpdate != undefined && btnCancelUpdate != null){
			$(".cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--dtUpdFocus__btn-cancel").on("click", function(){
				let cThisItemNonUpdate = $(this).parent().parent().parent();
				let cThisItemNonUpdate_cupdate = $(this).parent().parent();
				let cThisItemNonUpdate_index = cThisItemNonUpdate.index();
				if(cThisItemNonUpdate_index == 3){
					cThisItemNonUpdate_cupdate.html(`<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[3]}</p>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
						</div>
					</div>`);
				}else if(cThisItemNonUpdate_index == 4){
					cThisItemNonUpdate_cupdate.html(`<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[4]}</p>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
						</div>
					</div>`);
				}else if(cThisItemNonUpdate_index == 5){
					cThisItemNonUpdate_cupdate.html(`<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[5]}</p>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
						</div>
					</div>`);
				}else if(cThisItemNonUpdate_index == 6){
					cThisItemNonUpdate_cupdate.html(`<p class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--txt">${dataUser_item[6]}</p>
					<div class="cControlP__cont--containDash--c--myProfile--cDataUser--item--control--cUptData--cIcon">
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="28px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m442.01 113.75h-258.37c-28.996 0-52.5 23.504-52.5 52.5v280c0 28.996 23.504 52.5 52.5 52.5h280c28.988 0 52.5-23.504 52.5-52.5v-258.13l49.832-49.84c7.3828-7.3867 11.531-17.395 11.531-27.844 0-10.438-4.1484-20.457-11.531-27.844l-18.559-18.559c-7.3867-7.3828-17.406-11.531-27.844-11.531-10.449 0-20.457 4.1484-27.844 11.531zm-35 35h-223.37c-9.668 0-17.5 7.832-17.5 17.5v280c0 9.668 7.832 17.5 17.5 17.5h280c9.6602 0 17.5-7.832 17.5-17.5v-223.13l-148.69 148.69c-5.5039 5.4961-12.504 9.2422-20.125 10.762l-55.379 11.078c-5.7344 1.1484-11.664-0.64844-15.805-4.7852-4.1367-4.1406-5.9336-10.07-4.7852-15.805l11.078-55.379c1.5195-7.6211 5.2656-14.621 10.762-20.125zm63.059-13.562 24.746 24.746-187.12 187.12c-0.61328 0.61328-1.3828 1.0312-2.2344 1.1992l-29.633 5.9219 5.9219-29.633c0.16797-0.85156 0.58594-1.6211 1.1992-2.2344zm49.5 0-24.754-24.754 21.656-21.656c0.82422-0.8125 1.9336-1.2773 3.0977-1.2773 1.1562 0 2.2656 0.46484 3.0898 1.2773l18.566 18.566c0.8125 0.82422 1.2773 1.9336 1.2773 3.0898 0 1.1641-0.46484 2.2734-1.2773 3.0977z" fill-rule="evenodd"/></g></svg>
						</div>
					</div>`);
				}else{
					console.log("Elemento no encontrado");
				}
			});
		}
	});
});
// ---------------- GUARDAR LA INFORMACIÓN ACTUALIZADA
$(document).on("submit", "#form-dataUserGenerals", function(e){
	e.preventDefault();
	var formdata = $(this).serializeArray();
	$.ajax({
		url: "./php/process_update-data-my-profile.php",
		method: 'POST',
		dataType: 'JSON',
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: formdata,
    beforeSend: function(){
    	//console.log('Insertando la información');
    },
    success: function(e){
    	if(e.response == "true"){
    		listInfoGeneralUser();
    		Swal.fire({
		      title: 'Éxito!',
		      html: `<span class='font-w-300'>El/Los datos se actualizaron correctamente.</span>`,
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
});
// -------------- ACTUALIZAR - PERSONA POLÍTICAMENTE EXPUESTA
$(document).on("click", "#chck_politically_exposed", function(){
	let idclient_exp = $("#ipt-idCliValUpdateMyProfile").val();
	let st_politically_exposed = "";
	if($(this).is(":checked")){
		st_politically_exposed = "YES";
	}else{
		st_politically_exposed = "NO";
	}
	let formdata = new FormData();
	formdata.append("politically_exposed", st_politically_exposed);
	formdata.append("id_client", idclient_exp);
	$.ajax({
		url: "./php/process_update-politically_exposed.php",
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
    		if(r.response == "true"){
	    		listInfoGeneralUser();
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
	      console.log('Error 404: La página de consulta no fue encontrada.');
	    }
	  },
	  error:function(x,xs,xt){
	    console.log(JSON.stringify(x));
	  }
	});
});