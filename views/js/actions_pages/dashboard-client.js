$(() => {
	const btn_OpensideLeftpanel = document.querySelector("#m-show-hpagepanel");
	const c_totalSideLeft = document.querySelector(".cControlP__cont--sdLeft");
	const c_containSideLeft = document.querySelector(".cControlP__cont--sdLeft--c");
	const btn_OpensideRightpanel = document.querySelector("#btnShowSideRight");
	const btn_ClosesideRightpanel = document.querySelector("#btnCloseSdRight");
	const c_totalSideRight = document.querySelector(".cControlP__cont--sdRight");
	const c_containSideRight = document.querySelector(".cControlP__cont--sdRight--c");
	// ------------ MOSTRAR/OCULTAR EL SIDEBAR DE LA IZQUIERDA
	btn_OpensideLeftpanel.addEventListener("click", function(){
		c_totalSideLeft.classList.toggle("show");
		c_containSideLeft.classList.toggle("show");
	});
	document.addEventListener("click", e => {
		if(!e.target.matches('.cControlP__cont--sdLeft--c--m a')) return false;
		c_totalSideLeft.classList.remove("show");
		c_containSideLeft.classList.remove("show");
	});
	c_totalSideLeft.addEventListener('click', e => {
		if(e.target === c_totalSideLeft){
			c_totalSideLeft.classList.remove('show');
			c_containSideLeft.classList.remove('show');
		}
	});
	// ------------ MOSTRAR/OCULTAR EL SIDEBAR DE LA ABAJO/DERECHA
	btn_OpensideRightpanel.addEventListener("click", function(){
		c_totalSideRight.classList.add("show");
		c_containSideRight.classList.add("show");
	});
	btn_ClosesideRightpanel.addEventListener("click", function(){
		c_totalSideRight.classList.remove("show");
		c_containSideRight.classList.remove("show");
	});
	document.addEventListener("click", e => {
		if(!e.target.matches('.cControlP__cont--sdRight--c--m a')) return false;
		c_totalSideRight.classList.remove("show");
		c_containSideRight.classList.remove("show");
	});
	c_totalSideRight.addEventListener('click', e => {
		if(e.target === c_totalSideRight){
			c_totalSideRight.classList.remove('show');
			c_containSideRight.classList.remove("show");
		}
	});
	// ------------ ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA - IZQUIERDA
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);

	if(filename == "complete-exchange" || filename == "convert-divise"){
		$(".cControlP__cont--sdLeft--c--m--item a").eq(0).removeClass("active");
		$(".cControlP__cont--sdLeft--c--m--item a").eq(2).removeClass("active");
		$(".cControlP__cont--sdLeft--c--m--item a").eq(3).removeClass("active");
		$('.cControlP__cont--sdLeft--c--m--item a').eq(1).addClass("active");
	}else if(filename == "all-converts"){
		$(".cControlP__cont--sdLeft--c--m--item a").eq(1).removeClass("active");
		$(".cControlP__cont--sdLeft--c--m--item a").eq(2).removeClass("active");
		$(".cControlP__cont--sdLeft--c--m--item a").eq(3).removeClass("active");
		$('.cControlP__cont--sdLeft--c--m--item a').eq(0).addClass("active");
	}else{
		$(".cControlP__cont--sdLeft--c--m--item a").removeClass("active");
		$('.cControlP__cont--sdLeft--c--m--item a[href="' + filename + '"]').addClass("active");
	}
	// ------------ ITEM SELECCIONADO DEL MENÚ EN CADA PÁGINA - DERECHA
	var url2 = window.location.pathname;
	var filename2 = url2.substring(url2.lastIndexOf('/')+1);
	if(filename2 == "control-panel"){
		$(".cControlP__cont--sdRight--c--m--item a").eq(1).removeClass("active");
		$('.cControlP__cont--sdRight--c--m--item a').eq(0).addClass("active");
	}else{
		$(".cControlP__cont--sdRight--c--m--item a").removeClass("active");
		$('.cControlP__cont--sdRight--c--m--item a[href="' + filename2 + '"]').addClass("active");
	}
});