((d) => {
	// ------------ TOGGLE HEADERTOP 
	function showHeader(){
		let headerTop = d.querySelector('#headerTop-info');
		let scrollTop = d.documentElement.scrollTop;
		let heroImageClass = d.querySelector('#heroimage-info');
		let logotype = d.querySelector(".cMain__cont--infTop--hTop--citem--cLogo--logo");
		let heightHeroImage = heroImageClass.offsetTop;

		if(heightHeroImage - 78 < scrollTop ){
			headerTop.classList.add("reduxheight");
			logotype.classList.add("sizeadd");
		}else{
			headerTop.classList.remove("reduxheight");
			logotype.classList.remove("sizeadd");
		}
	}
	d.addEventListener('scroll', showHeader);
	// ------------ TOGGLE MENU INTO HEADERTOP
	d.querySelector("#m-show-hpage").addEventListener("click", function(){
		d.querySelector("#main-m-htop").classList.toggle("show");
	});
})(document);
// ------------ TROZO JQUERY 
function twodecimals(n) {
  let t = n.toString();
  let regex = /(\d*.\d{0,2})/;
  return t.match(regex)[0];
}
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}
// ------------ VALIDAR QUE SE INGRESEN SOLO NUMEROS
document.querySelector("#inputval-oneindex").addEventListener("keypress", soloNumeros, false);
document.querySelector("#inputval-twoindex").addEventListener("keypress", soloNumeros, false);

$("#inputval-oneindex").val(1000);
// ------------ VALORES DE CONVERSIÓN 
let diviseDollar = parseFloat($("#refer_solesdiviseindex").text());
let diviseSoles = parseFloat($("#refer_dollardiviseindex").text());
/* CONTROLES DE VISTA */
let inputOne = parseFloat($("#inputval-oneindex").val());
/* IMPRESIÓN */
let valresDollar = inputOne / diviseDollar;
let valresSoles = inputOne * diviseSoles;
/* CON O SIN DECIMALES */
$("#inputval-twoindex").val(twodecimals(valresDollar));
let convertSoles = valresSoles.toFixed(0);

// ------------ JUEGO DE CAMBIO DE DIVISAS(TEXTOS Y VALORES)
$("#btn-Changecurr").on("click", function(){
	
	var typeCurr = $(this).parent().find("#cont-DiviseOneindex").find("#txtDivise-oneindex").text();

	if(!$(this).hasClass("active")){

		$(this).addClass("active");

		/* DE DÓLARES A SOLES */
		if(typeCurr != "Dólares"){
			$("#inputval-twoindex").val(convertSoles);

			$("#txtDivise-oneindex").text("Dólares");
			$("#txtDivise-twoindex").text("Soles");
			
			$("#spanprefix-oneindex").text("$");
			$("#spanprefix-twoindex").text("S/.");

		/* DE SOLES A DÓLARES */
		}else{

			$("#inputval-twoindex").val(twodecimals(valresDollar));

			$(this).removeClass("active");
			$("#txtDivise-oneindex").text("Soles");
			$("#txtDivise-twoindex").text("Dólares");

			$("#spanprefix-oneindex").text("S/.");
			$("#spanprefix-twoindex").text("$");
		}		
	}else{
		
		$(this).removeClass("active");
		
		if(typeCurr != "Dólares"){
			$("#inputval-twoindex").val(convertSoles);
			
			$("#txtDivise-oneindex").text("Dólares");
			$("#txtDivise-twoindex").text("Soles");
			
			$("#spanprefix-oneindex").text("$");
			$("#spanprefix-twoindex").text("S/.");
		}else{

			$("#inputval-twoindex").val(twodecimals(valresDollar));

			$("#txtDivise-oneindex").text("Soles");
			$("#txtDivise-twoindex").text("Dólares");

			$("#spanprefix-oneindex").text("S/.");
			$("#spanprefix-twoindex").text("$");
		}		
	}
});

// ------------ CONVERTIR-ENVIAR SIEMPRE EL PRIMER VALOR - PRIMER INPUT
$("#inputval-oneindex").on("input change", function(){
	var typecurrency = $(this).parent().parent().find("#txtDivise-oneindex").text();
	var valueDollar = parseFloat($("#refer_solesdiviseindex").text());
	var valueSoles = parseFloat($("#refer_dollardiviseindex").text());
	var firstinput = parseFloat($(this).val());

	var changeDollar = firstinput / valueDollar;
	var changeSoles = firstinput * valueSoles;
	if(typecurrency == "Soles"){
		$("#inputval-twoindex").val(twodecimals(changeDollar));
	}else{
		$("#inputval-twoindex").val(changeSoles);
	}
});
// ------------ CONVERTIR-ENVIAR SIEMPRE EL PRIMER VALOR - SEGUNDO INPUT
$("#inputval-twoindex").on("input change", function(){
	var typecurrency = $(this).parent().parent().find("#txtDivise-twoindex").text();
	var valueDollar = parseFloat($("#refer_solesdiviseindex").text());
	var valueSoles = parseFloat($("#refer_dollardiviseindex").text());
	var firstinput = parseFloat($(this).val());

	var changeDollar = firstinput / valueDollar;
	var changeSoles = firstinput * valueSoles;
	if(typecurrency == "Dólares"){
		$("#inputval-oneindex").val(changeSoles);
	}else{
		$("#inputval-oneindex").val(twodecimals(changeDollar));
	}
});