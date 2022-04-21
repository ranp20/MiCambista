const c_statusPointSteps = $("#c_statusPointSteps_validBiom");
var c_statusPointSteps_Items = c_statusPointSteps.find("a");

// ------------ VISUALIZAR LA IMAGEN A CARGAR - FOTO FRONTAL
$("#photo_dni-front").on("change", function(e){
  let readerImg = new FileReader();
  let contUploadView = $("#view-upPhotoDoc_front");
  readerImg.readAsDataURL(e.target.files[0]);
  readerImg.onload = function(){
    contUploadView.attr("src", readerImg.result);
  }
});
// ------------ VISUALIZAR LA IMAGEN A CARGAR - FOTO TRASERA
$("#photo_dni-back").on("change", function(e){
  let readerImg = new FileReader();
  let contUploadView = $("#view-upPhotoDoc_back");
  readerImg.readAsDataURL(e.target.files[0]);
  readerImg.onload = function(){
    contUploadView.attr("src", readerImg.result);
  }
});

$(document).on("click", "#btn_stepNext_validBiom", function(){
	c_statusPointSteps_Items.eq(0).removeClass("active");
	c_statusPointSteps_Items.eq(0).addClass("complete");
	c_statusPointSteps_Items.eq(1).addClass("active");
	$("#c-stepOne_ValBiom").addClass("disabledSlide__toTwo");
	$("#c-stepTwo_ValBiom").addClass("slide-moveLeft__toTwo");
	$("#c-stepTwo_ValBiom").html(`
		<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
			<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">GRABAR VIDEO SELFIE</h2>
			<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">A continuación, lea los números en la pantalla y click en continuar.</p>
		</div>
		<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cVideo">
			<span>Repita estos número en el video: 1..., 2... y 3</span>
			<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cVideo--cVideo">
				<video autoplay playsinline id="c_video-valididentity" width="100" height="100"></video>
			</div>
			<button id="btn-stop_recordbiometric">Parar Video</button>
		</div>
	`);
});

$(document).on("click", "#btn-stop_recordbiometric", function(){
	c_statusPointSteps_Items.eq(1).addClass("active");
	c_statusPointSteps_Items.eq(1).addClass("complete");
	c_statusPointSteps_Items.eq(2).addClass("active");
	$("#c-stepTwo_ValBiom").addClass("disabledSlide__toThree");
	$("#c-stepThree_ValBiom").addClass("slide-moveLeft__toThree");
	$("#c-stepThree_ValBiom").html(`
		<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
			<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">VERIFICACIÓN</h2>
			<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">Felicidades, completaste la verificación biométrica.</p>
		</div>
		<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cVideo">
			<button id="btn-finalVerifyValidBiom">ACEPTAR</button>
		</div>
	`);
});

$(document).on("click", "#btn-finalVerifyValidBiom", function(){
	c_statusPointSteps_Items.eq(2).removeClass("active");
	c_statusPointSteps_Items.eq(2).addClass("complete");
	window.location.replace("my-profile");
});