$(function(){
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
// VARIABLES PARA LOS TABS
const linksAnchParent = $("#c_statusPointSteps_validBiom");
const linksAnch = linksAnchParent.find("li");
const itemsAnch = $(".cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step");
//const firstLinkAnch = linksAnch.eq(0).data("target").slice(1);
// VARIABLES PARA EL MODAL DE VIDEO
const btn_frmCloseModal = document.querySelector("#icon_frmbtnClose");
const c_totalfrmModal = document.querySelector(".cformValidMediaBiometric");
const c_containfrmModal = document.querySelector(".cformValidMediaBiometric--form");
const c_statusPointSteps = $("#c_statusPointSteps_validBiom");
const c_listStepValidation = $("#c-listStepsValidation");
var c_statusPointSteps_Items = c_statusPointSteps.find("li");
var c_StepPoint_Item = c_listStepValidation.find("section");
var btnOpenVideo = document.getElementById("btn-stop_recordbiometric");
var downloadButton = document.getElementById("btn-ValidMediaBiometric");
var startRecordButton = document.getElementById("init_vidValidationBio");
var recording = document.getElementById("c_video-valididentity__opViewVideo");
var videoTag = document.getElementById("c_video-valididentity");
var loaderValidVid = document.getElementById("gif-load-validvideo");
var contVideoRecording = document.getElementById("c_playVideoRecording");
var blobSaveServer = "";
var checkActiveDevices = false;
var streamCaptura = "";
var recordingTimeMS = 6000;
var recordedblobData = "";
var recordingDataToSend = "";
// ------------ VISUALIZAR LA IMAGEN A CARGAR - FOTO FRONTAL
$("#photo_dni-front").on("change", function(e){
  let readerImg = new FileReader();
  let contUploadView = $("#view-upPhotoDoc_front");
  if(e.target.files[0] == undefined || e.target.files[0] == "undefined"){
    $("#view-upPhotoDoc_front").attr("src", "./views/assets/img/utilities/imagen_frontal-DNI.png");
  }else{
    readerImg.readAsDataURL(e.target.files[0]);
    readerImg.onload = function(){
      contUploadView.attr("src", readerImg.result);
    }
  }
});
// ------------ VISUALIZAR LA IMAGEN A CARGAR - FOTO TRASERA
$("#photo_dni-back").on("change", function(e){
  let readerImg = new FileReader();
  let contUploadView = $("#view-upPhotoDoc_back");
  if(e.target.files[0] == undefined || e.target.files[0] == "undefined"){
    $("#view-upPhotoDoc_back").attr("src", "./views/assets/img/utilities/imagen_trasero-DNI.png");
  }else{
    readerImg.readAsDataURL(e.target.files[0]);
    readerImg.onload = function(){
      contUploadView.attr("src", readerImg.result);
    }
  }
});
$(document).on("click", "#btn_stepNext_validBiom", function(e){
  e.preventDefault();
  // VARIABLES DE INPUT PARA LAS FOTOS
  var photoDNI_front = $("#photo_dni-front").val();
  var photoDNI_back = $("#photo_dni-back").val();
  if(photoDNI_front != "" && photoDNI_front != null && photoDNI_front != undefined && photoDNI_front != "null"){
    if(photoDNI_back != "" && photoDNI_back != null && photoDNI_back != undefined && photoDNI_back != "null"){
    	c_statusPointSteps_Items.eq(0).removeClass("active");
    	c_statusPointSteps_Items.eq(0).addClass("complete");
    	c_statusPointSteps_Items.eq(1).addClass("active");
    	c_StepPoint_Item.eq(0).removeClass("active");
      c_StepPoint_Item.eq(1).addClass("active");
      c_StepPoint_Item.eq(2).removeClass("active");
    }else{
      linksAnch.eq(0).addClass("active");
      linksAnch.eq(1).removeClass("active");
      linksAnch.eq(2).removeClass("active");
      c_StepPoint_Item.eq(0).addClass("active");
      c_StepPoint_Item.eq(1).removeClass("active");
      c_StepPoint_Item.eq(2).removeClass("active");
      Swal.fire({
        title: 'Completar información!',
        text: 'No se agregó una foto trasera del DNI.',
        icon: 'warning',
        confirmButtonText: 'Aceptar'
      });
    }
  }else{
    linksAnch.eq(0).addClass("active");
    linksAnch.eq(1).removeClass("active");
    linksAnch.eq(2).removeClass("active");
    c_StepPoint_Item.eq(0).addClass("active");
    c_StepPoint_Item.eq(1).removeClass("active");
    c_StepPoint_Item.eq(2).removeClass("active");
    Swal.fire({
      title: 'Completar información!',
      text: 'No se agregó una foto frontal del DNI.',
      icon: 'warning',
      confirmButtonText: 'Aceptar'
    });
  }
});
// ESTADO DE GRABACIÓN DEL VIDEO
function wait(delayInMS){
  return new Promise(resolve => setTimeout(resolve, delayInMS));
}
// ------------ FUNCTION - GRABAR VIDEO
function startRecording(stream, lengthInMS){
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
    //ABRIR EL MODAL - GRABAR VIDEO
    c_totalfrmModal.classList.add("show");
    c_containfrmModal.classList.add("show");
    
    if(stream.getVideoTracks().length > 0 && stream.getAudioTracks().length > 0){
      //console.log('Se está utilizando los dispositivos');
      checkActiveDevices = true;
      streamCaptura = stream;
      loaderValidVid.classList.add("hi-hidden");
    }else{
      checkActiveDevices = false;
      console.log('No hay dispositivos activos');
    }
  }).catch(function(err){
    //CERRAR EL MODAL - GRABAR VIDEO
    c_totalfrmModal.classList.remove("show");
    c_containfrmModal.classList.remove("show");
    alert("Error, no se pudo iniciar la cámara.");
  });
}, false);
// ------------ INICIAR LA GRABACIÓN
startRecordButton.addEventListener("click", function(){
  if(checkActiveDevices == true){
    videoTag.srcObject = streamCaptura;
    startRecording(videoTag.captureStream(), recordingTimeMS).then (recordedChunks => {
      contVideoRecording.classList.add("playRecording");
      recordedblobData = new Blob(recordedChunks, { type: "video/webm" });
      recording.src = URL.createObjectURL(recordedblobData);
      // USANDO PLUGINS - WHAMMY
      /*
      videoEncoder = new Whammy.Video();
      for (var i = 0; i < images.length; i++) {
          videoCtx.putImageData(images[i].image, 0, 0);
          videoEncoder.add(videoCtx, images[i].duration);
      }

      blob = videoEncoder.compile();
      file = (window.webkitURL || window.URL).createObjectURL(blob);
      */

      // GUARDAR EN VARIABLE/DESCARGAR A PARTIR DEL BLOB
      recordingBlobSlice_one = URL.createObjectURL(recordedblobData);
      recordingBlobSlice_two = recordingBlobSlice_one.split("blob:https://localhost/");
      blobSaveServer = recordingBlobSlice_two[1];
    });
  }else{
    console.log("Error, no se activo ningún dispositivo");
  }
});
// ------------ ALMACENAR LOS DATOS BIOMÉTRICOS DEL USUARIO
$(document).on("click", "#btn-ValidMediaBiometric", function(e){
  e.preventDefault();
  let idClient = $("#ipt-idClientVal").val();
  var formdata = new FormData();
  var docfront_filelength = $('.imagen_front')[0].files.length;
  for (var i = 0;i < docfront_filelength; i ++) {
    formdata.append("imagen_front", $('.imagen_front')[0].files[i]);
  }
  var docback_filelength = $('.imagen_back')[0].files.length;
  for (var i = 0;i < docback_filelength; i ++) {
    formdata.append("imagen_back", $('.imagen_back')[0].files[i]);
  }
  formdata.append("videoBlob_valid", blobSaveServer);
  formdata.append("id_client", idClient);

  $.ajax({
    url: "./controllers/c_update-validation-biometric.php",
    method: "POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
  }).done((e) => {
    console.log(e);
    if(e == "true"){
      // CERRA EL MODAL DE GRABAR VIDEO Y PASAR A EL PASO FINAL DE REDIRECCIONAMIENTO...
      c_totalfrmModal.classList.remove("show");
      c_containfrmModal.classList.remove("show");
      Swal.fire({
        title: 'Éxito!',
        text: 'El video se guardó correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        timer: 3500
      });
      c_statusPointSteps_Items.eq(0).removeClass("active");
      c_statusPointSteps_Items.eq(0).addClass("complete");
      c_statusPointSteps_Items.eq(1).removeClass("active");
      c_statusPointSteps_Items.eq(1).addClass("complete");
      c_statusPointSteps_Items.eq(2).addClass("complete");
      c_StepPoint_Item.eq(0).removeClass("active");
      c_StepPoint_Item.eq(1).removeClass("active");
      c_StepPoint_Item.eq(2).addClass("active");
    }else{
      Swal.fire({
        title: 'Error!',
        text: 'Lo sentimos, hubo un problema al guardar el video.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  });
});
// ------------ REDIRIGIR DE ACUERDO A LA VALIDACIÓN FINAL
$(document).on("click", "#btn-finalVerifyValidBiom", function(){
	c_statusPointSteps_Items.eq(2).removeClass("active");
	c_statusPointSteps_Items.eq(2).addClass("complete");
	window.location.replace("my-profile");
});