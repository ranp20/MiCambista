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
var startRecordButton = document.getElementById("init_vidValidationBio");
var recording = document.getElementById("c_video-valididentity__opViewVideo");
// var downloadButton = document.getElementById("downloadButton");
// var downloadButton_test = document.getElementById("downloadButton_test");
var logElement = document.getElementById("log");
var videoTag = document.getElementById("c_video-valididentity");
var loaderValidVid = document.getElementById("gif-load-validvideo");
var blobSaveServer = "";
var checkActiveDevices = false;
var streamCaptura = "";
var recordingTimeMS = 6000;
// ------------ MOSTRAR MENSAJE DE ALERTA DE GRABACIÓN
function log(msg) {
  logElement.innerHTML += msg + "\n";
}
// ESTADO DE GRABACIÓN DEL VIDEO
function wait(delayInMS) {
  return new Promise(resolve => setTimeout(resolve, delayInMS));
}
// ------------ FUNCTION - GRABAR VIDEO
function startRecording(stream, lengthInMS) {
  let recorder = new MediaRecorder(stream);
  let data = []; 
  recorder.ondataavailable = event => data.push(event.data);
  recorder.start();
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
      //console.log('Se está utilizando los dispositivos');
      checkActiveDevices = true;
      streamCaptura = stream;
      loaderValidVid.classList.add("hi-hidden");
      // RETORNAR EL VALOR DE LA PROMESA DE ARRIBA...
    }else{
      checkActiveDevices = false;
      console.log('No hay dispositivos activos');
    }
    
  }).catch( err => console.log(err));
}, false);
// ------------ INICIAR LA GRABACIÓN
startRecordButton.addEventListener("click", function(){
  if(checkActiveDevices == true){
    videoTag.srcObject = streamCaptura;
    startRecording(videoTag.captureStream(), recordingTimeMS).then (recordedChunks => {
    let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });
    recording.src = URL.createObjectURL(recordedBlob);
    //downloadButton.href = recording.src;
    //downloadButton.download = "RecordedVideo.webm";
    //log("Successfully recorded " + recordedBlob.size + " bytes of " + recordedBlob.type + " media.");

    // DESCARGAR A PARTIR DEL BLOB
    recordingBlobSlice_one = URL.createObjectURL(recordedBlob);
    recordingBlobSlice_two = recordingBlobSlice_one.split("blob:https://localhost/");
    blobSaveServer = recordingBlobSlice_two[1];
    /*
    downloadButton_test.href = "blob:https://localhost/" + recordingBlobSlice_two[1];
    downloadButton_test.download = "descargadeprueba.webm";
    */
  });
  }else{
    console.log("Error, no se activo ningún dispositivo");
  }
});

$(document).on("click", "#btn-ValidMediaBiometric", function(e){
  e.preventDefault();
  let idClient = $("#ipt-idClientVal").val();
  $.ajax({
    type: "POST",
    url: "./controllers/c_update-validation-biometric.php",
    data: { id_client : idClient, videoBlob_valid : blobSaveServer}
  }).done((e) => {
    console.log(e);
    // CERRA EL MODAL DE GRABAR VIDEO Y PASAR A EL PASO FINAL DE REDIRECCIONAMIENTO...
  });
});


// ------------ REDIRIGIR DE ACUERDO A LA VALIDACIÓN FINAL
$(document).on("click", "#btn-finalVerifyValidBiom", function(){
	c_statusPointSteps_Items.eq(2).removeClass("active");
	c_statusPointSteps_Items.eq(2).addClass("complete");
	window.location.replace("my-profile");
});