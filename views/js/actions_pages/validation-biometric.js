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
$(document).on("click", "#btn-stop_recordbiometric", function(){
  console.log('Abrir el modal de grabar video');
	/*
  c_statusPointSteps_Items.eq(1).addClass("active");
	c_statusPointSteps_Items.eq(1).addClass("complete");
	c_statusPointSteps_Items.eq(2).addClass("active");
	$("#c-stepTwo_ValBiom").addClass("disabledSlide__toThree");
	$("#c-stepThree_ValBiom").addClass("slide-moveLeft__toThree");
  */
});
// ------------ REDIRIGIR DE ACUERDO A LA VALIDACIÓN FINAL
$(document).on("click", "#btn-finalVerifyValidBiom", function(){
	c_statusPointSteps_Items.eq(2).removeClass("active");
	c_statusPointSteps_Items.eq(2).addClass("complete");
	window.location.replace("my-profile");
});


/*
// FUNCIONALIDAD DE LA VALIDACIÓN BIOMÉTRICA
var thevideo = document.querySelector("#c_video-valididentity");
const containerVideo = document.querySelector("#c_videoAuthorizeValidation");

navigator.getUserMedia = ( navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia);

function initCamera(){
  navigator.getUserMedia (
    {
      video: true,
      audio: false
    },
    stream => thevideo.srcObject = stream,
    err => console.log(err)
  );
}

// CARGAR MODELOS
Promise.all([
    faceapi.nets.ssdMobilenetv1.loadFromUri('views/js/face-api/models'),
    faceapi.nets.ageGenderNet.loadFromUri('views/js/face-api/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('views/js/face-api/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('views/js/face-api/models'),
    faceapi.nets.faceLandmark68TinyNet.loadFromUri('views/js/face-api/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('views/js/face-api/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('views/js/face-api/models'),
    faceapi.nets.tinyFaceDetector.loadFromUri('views/js/face-api/models'),
]).then(initCamera);

//INICIA LA LIBRERÍA
thevideo.addEventListener("play", async function(){
    const canvas = faceapi.createCanvasFromMedia(thevideo);
    containerVideo.append(canvas);
    const displaySize = { width: thevideo.width, height: thevideo.height};
    faceapi.matchDimensions(canvas, displaySize);
    setInterval( async function(){
        const detections = await faceapi.detectAllFaces(thevideo, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks();
        //const detections = await faceapi.detectSingleFace(thevideo, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks();
        const resizeDetections = faceapi.resizeResults(detections, displaySize);
        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
        faceapi.draw.drawDetections(canvas, resizeDetections);
        faceapi.draw.drawFaceLandmarks(canvas, resizeDetections);

        // if(!detections.length){
        //   console.log('No hay caras expuestas');
        // }

    }, 100);
});
*/