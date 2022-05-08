$(function(){
  // ------------ MOSTRAR/OCULTAR EL FORMULARIO DE VALIDACIÓN BIOMÉTRICA
  const btn_frmOpenModal = document.querySelector("#btn-stop_recordbiometric");
  const btn_frmCloseModal = document.querySelector("#icon_frmbtnClose");
  const c_totalfrmModal = document.querySelector(".cformValidMediaBiometric");
  const c_containfrmModal = document.querySelector(".cformValidMediaBiometric--form");
  btn_frmOpenModal.addEventListener("click", function(){
    c_totalfrmModal.classList.add("show");
    c_containfrmModal.classList.add("show");
  });
  btn_frmCloseModal.addEventListener("click", function(){
    c_totalfrmModal.classList.remove("show");
    c_containfrmModal.classList.remove("show");
  });
  c_totalfrmModal.addEventListener('click', e => {
    if(e.target === c_totalfrmModal){
      c_totalfrmModal.classList.remove('show');
      c_containfrmModal.classList.remove("show");  
    }
  });
});
const c_statusPointSteps = $("#c_statusPointSteps_validBiom");
var c_statusPointSteps_Items = c_statusPointSteps.find("a");
var btnOpenVideo = document.getElementById("btn-stop_recordbiometric");
var downloadButton = document.getElementById("btn-ValidMediaBiometric");
var videoTag = document.getElementById("c_video-valididentity");
var checkActiveDevices = false;
var streamCaptura = "";
// ------------ FUNCTION - GRABAR VIDEO
function startRecording(stream, lengthInMS) {
  let recorder = new MediaRecorder(stream);
  let data = []; 
  recorder.ondataavailable = event => data.push(event.data);
  recorder.start();
  log(recorder.state + " for " + (lengthInMS/1000) + " seconds...");
  let stopped = new Promise((resolve, reject) => {
    recorder.onstop = resolve;
    recorder.onerror = event => reject(event.name);
  });
  let recorded = wait(lengthInMS).then(
    () => recorder.state == "recording" && recorder.stop()
  );
  return Promise.all([
    stopped,
    recorded
  ])
  .then(() => data);
}
// ------------ FUNCTION - DETENER EL VIDEO
function stop(stream) {
  stream.getTracks().forEach(track => track.stop());
}
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
// ------------ PASAR AL PASO #2
$(document).on("click", "#btn_stepNext_validBiom", function(){
	c_statusPointSteps_Items.eq(0).removeClass("active");
	c_statusPointSteps_Items.eq(0).addClass("complete");
	c_statusPointSteps_Items.eq(1).addClass("active");
	$("#c-stepOne_ValBiom").addClass("disabledSlide__toTwo");
	$("#c-stepTwo_ValBiom").addClass("slide-moveLeft__toTwo");
});
// ------------ PASAR AL PASO FINAL
btnOpenVideo.addEventListener("click", function(){
  // ------------ PEDIR PERMISOS PARA USAR DISPOSITIVOS (Cámara y micrófono)
  navigator.mediaDevices.getUserMedia({
    video: true,
    audio: true
  }).then(stream => {
    videoTag.srcObject = stream;
    //downloadButton.href = stream;
    videoTag.captureStream = videoTag.captureStream || videoTag.mozCaptureStream;
    new Promise(resolve => videoTag.onplaying = resolve);
    //return new Promise(resolve => videoTag.onplaying = resolve);
    //console.log(resolve);
    
    if(stream.getVideoTracks().length > 0 && stream.getAudioTracks().length > 0){
      console.log('Se está utilizando los dispositivos');
      checkActiveDevices = true;
      streamCaptura = stream;
      // RETORNAR EL VALOR DE LA PROMESA DE ARRIBA...
    }else{
      checkActiveDevices = false;
      console.log('No hay dispositivos activos');
    }
    
  }).catch( err => console.log(err));
}, false);
/*
$(document).on("click", "#btn-stop_recordbiometric", function(e){
  e.preventDefault();
  console.log('Abrir el modal de grabar video');
	
  // c_statusPointSteps_Items.eq(1).addClass("active");
	// c_statusPointSteps_Items.eq(1).addClass("complete");
	// c_statusPointSteps_Items.eq(2).addClass("active");
	// $("#c-stepTwo_ValBiom").addClass("disabledSlide__toThree");
	// $("#c-stepThree_ValBiom").addClass("slide-moveLeft__toThree");

  // ------------ PEDIR PERMISOS PARA USAR DISPOSITIVOS (Cámara y micrófono)
  navigator.mediaDevices.getUserMedia({
    video: true,
    audio: true
  }).then(stream => {
    videoTag.srcObject = stream;
    //downloadButton.href = stream;
    videoTag.captureStream = videoTag.captureStream || videoTag.mozCaptureStream;
    new Promise(resolve => videoTag.onplaying = resolve);
    //return new Promise(resolve => videoTag.onplaying = resolve);
    //console.log(resolve);
    
    if(stream.getVideoTracks().length > 0 && stream.getAudioTracks().length > 0){
      console.log('Se está utilizando los dispositivos');
      checkActiveDevices = true;
      streamCaptura = stream;
      // RETORNAR EL VALOR DE LA PROMESA DE ARRIBA...
    }else{
      checkActiveDevices = false;
      console.log('No hay dispositivos activos');
    }
    
  }).catch( err => console.log(err));
});
*/
// ------------ REDIRIGIR DE ACUERDO A LA VALIDACIÓN FINAL
$(document).on("click", "#btn-finalVerifyValidBiom", function(){
	c_statusPointSteps_Items.eq(2).removeClass("active");
	c_statusPointSteps_Items.eq(2).addClass("complete");
	window.location.replace("my-profile");
});