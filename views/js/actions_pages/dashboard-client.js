((d) => {
	
	/************************** MOSTRAR/OCULTAR EL SIDEBAR DE LA IZQUIERDA **************************/
	d.querySelector("#m-show-hpagepanel").addEventListener("click", function(){
		d.querySelector(".cControlP__cont--sdLeft").classList.toggle("show");
		d.querySelector(".cControlP__cont--sdLeft--c").classList.toggle("show");
	});
	d.addEventListener("click", e => {
		if(!e.target.matches('.cControlP__cont--sdLeft--c--m a')) return false;
		d.querySelector(".cControlP__cont--sdLeft").classList.remove("show");
		d.querySelector(".cControlP__cont--sdLeft--c").classList.remove("show");
	});
	let contsidebarLeft = document.querySelector('.cControlP__cont--sdLeft');
	contsidebarLeft.addEventListener('click', e => {
		if(e.target === contsidebarLeft)	contsidebarLeft.classList.remove('show');
	});

	/************************** MOSTRAR/OCULTAR EL SIDEBAR DE LA ABAJO/DERECHA **************************/
	d.querySelector("#btnShowSideRight").addEventListener("click", function(){
		d.querySelector(".cControlP__cont--sdRight").classList.add("show");
		d.querySelector(".cControlP__cont--sdRight--c").classList.add("show");
	});
	d.querySelector("#btnCloseSdRight").addEventListener("click", function(){
		d.querySelector(".cControlP__cont--sdRight").classList.remove("show");
		d.querySelector(".cControlP__cont--sdRight--c").classList.remove("show");
	});
	d.addEventListener("click", e => {
		if(!e.target.matches('.cControlP__cont--sdRight--c--m a')) return false;
		d.querySelector(".cControlP__cont--sdRight").classList.remove("show");
		d.querySelector(".cControlP__cont--sdRight--c").classList.remove("show");
	});
	let contsidebarRight = document.querySelector('.cControlP__cont--sdRight');
	contsidebarRight.addEventListener('click', e => {
		if(e.target === contsidebarRight)	contsidebarRight.classList.remove('show');
	});


})(document);

/************************** ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA - IZQUIERDA **************************/
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
if(filename == "complete-exchange"){
	$(".cControlP__cont--sdLeft--c--m--item a").eq(0).removeClass("active");
	$(".cControlP__cont--sdLeft--c--m--item a").eq(2).removeClass("active");
	$(".cControlP__cont--sdLeft--c--m--item a").eq(3).removeClass("active");
	$('.cControlP__cont--sdLeft--c--m--item a').eq(1).addClass("active");
}else{
	$(".cControlP__cont--sdLeft--c--m--item a").removeClass("active");
	$('.cControlP__cont--sdLeft--c--m--item a[href="' + filename + '"]').addClass("active");
}

/************************** ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA - DERECHA **************************/
var url2 = window.location.pathname;
var filename2 = url2.substring(url2.lastIndexOf('/')+1);
if(filename2 == "control-panel"){
	$(".cControlP__cont--sdRight--c--m--item a").eq(1).removeClass("active");
	$('.cControlP__cont--sdRight--c--m--item a').eq(0).addClass("active");
}else{
	$(".cControlP__cont--sdRight--c--m--item a").removeClass("active");
	$('.cControlP__cont--sdRight--c--m--item a[href="' + filename2 + '"]').addClass("active");
}