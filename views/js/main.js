// ------------ TOGGLE HEADERTOP 
function showHeader(){
	let headerTop = $('#headerTop-info');
	let scrollTop = d.documentElement.scrollTop;
	let heroImageClass = $('#fromHereFixedHeadTop');
	let logotype = $(".cMain__cont--infTop--hTop--citem--cLogo--logo");
	let heightHeroImage = heroImageClass.offsetTop;

	if(heightHeroImage - 78 < scrollTop ){
		headerTop.addClass("reduxheight");
		logotype.addClass("sizeadd");
	}else{
		headerTop.removeClass("reduxheight");
		logotype.removeClass("sizeadd");
	}
}
document.addEventListener('scroll', showHeader);
// ------------ TOGGLE MENU INTO HEADERTOP
$(document).on("click","#m-show-hpage",function(){
	$("#main-m-htop").toggleClass("show");
});
localStorage.clear();
	
document.body.addEventListener("load", (e) => {
	if(e.target.tagName != "img"){
	  return;
	}
	// Remove the blurry placeholder.
	e.target.style.backgroundImage = "none";
},true);


$(() => {
	// ------------ CAMBIAR ENTRE TEMAS - LIGHT/DARK
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
		document.cookie = "prjMemopay-theme=" + theme;
	});
});