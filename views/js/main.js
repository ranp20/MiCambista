((d) => {
	// ------------ TOGGLE HEADERTOP 
	function showHeader(){
		let headerTop = d.querySelector('#headerTop-info');
		let scrollTop = d.documentElement.scrollTop;
		let heroImageClass = d.querySelector('#fromHereFixedHeadTop');
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
	localStorage.clear();
})(document);
document.body.addEventListener("load", (e) => {
	if(e.target.tagName != "img"){
	  return;
	}
	// Remove the blurry placeholder.
	e.target.style.backgroundImage = "none";
},true);


$(() => {
	
	function getCookie(cookie_name) {
		let name = cookie_name + "=";
		let cookie_array = document.cookie.split(';');
		for(let i = 0; i < cookie_array.length; i++) {
			let cookie = cookie_array[i];
			while (cookie.charAt(0) == ' ') {
				cookie = cookie.substring(1);
			}
			if (cookie.indexOf(name) == 0) {
				return cookie.substring(name.length, cookie.length);
			}
		}
		return "";
	}

	const $btn = document.querySelector("#darkmode-toggle");
  const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
  
	$(document).on("click","#darkmode-toggle",function(){
		if(prefersDarkScheme.matches){
			if($(this).is(':checked')){
				if($('body').hasClass('dark-theme')){
					$('body').removeClass('dark-theme');
					$('body').addClass('light-theme');
					var theme = $('body').hasClass("dark-theme") ? "dark" : "light";
				}else{
					$('body').removeClass('light-theme');
					$('body').addClass('dark-theme');
					var theme = $('body').hasClass("dark-theme") ? "dark" : "light";
				}
			}else{
				if($('body').hasClass('dark-theme')){
					$('body').removeClass('dark-theme');
					$('body').addClass('light-theme');
					var theme = $('body').hasClass("dark-theme") ? "dark" : "light";
				}else{
					$('body').removeClass('light-theme');
					$('body').addClass('dark-theme');
					var theme = $('body').hasClass("dark-theme") ? "dark" : "light";
				}
			}
		}
		document.cookie = "theme=" + theme;
	});
});