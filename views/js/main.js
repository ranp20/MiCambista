// ------------ TOGGLE HEADERTOP 
function showHeader(){
	let headerTop = $('#headerTop-info');
	let scrollTop = document.documentElement.scrollTop;
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
	
document.body.addEventListener("load",(e) => {
	if(e.target.tagName != "img"){
	  return;
	}
	// Remove the blurry placeholder.
	e.target.style.backgroundImage = "none";
},true);

$(() => {
	/*
	const myCookieName = "prjMemopay-theme";
  const defaultValue = "light";
  const currentValue = setDefaultCookieValue(myCookieName, defaultValue);
	// ------------ Función para establecer un valor predeterminado si la cookie no existe
	function setDefaultCookieValue(cookieName, defaultValue) {
		const existingValue = getCookie(cookieName);
		if (existingValue === null) {
			createPersistentCookie(cookieName, defaultValue);
			return defaultValue;
		}
		return existingValue;
	}
	// ------------ CREAR UNA COOKIE PERSISTENTE
	function createPersistentCookie(cookieName, cookieValue){
		const expirationDate = new Date();
		// expirationDate.setFullYear(expirationDate.getFullYear() + 10); // AÑOS
		// expirationDate.setMonth(expirationDate.getMonth() + 3); // MESES
		// expirationDate.setHours(expirationDate.getHours() + 5); // HORAS
		expirationDate.setMinutes(expirationDate.getMinutes() + 2); // MINUTOS
		const expires = expirationDate.toGMTString();
		document.cookie = `${cookieName}=${cookieValue}; expires=${expires}; path=/`;
	}
	// ------------ VALIDAR LA EXISTENCIA DE LA COOKIE Y VOLVERLA A CREAR
	function resetPersistentCookie(cookieName, cookieValue){
		if(getCookie(cookieName)){
			deleteCookie(cookieName);
		}
		createPersistentCookie(cookieName, cookieValue);
	}
	// ------------ OBTENER LA COOKIE
	function getCookie(cookieName){
		const name = `${cookieName}=`;
		const cookies = document.cookie.split(';');
		for(const cookie of cookies){
			let trimmedCookie = cookie.trim();
			if(trimmedCookie.indexOf(name) === 0){
				return trimmedCookie.substring(name.length, trimmedCookie.length);
			}
		}
		return null;
	}
	// ------------ ELIMINAR LA COOKIE
	function deleteCookie(cookieName){
		const expirationDate = new Date(0).toGMTString(); // Set an expiration date in the past
		document.cookie = `${cookieName}=; expires=${expirationDate}; path=/`;
	}
	*/
	let myasCookieName = "prjMemopay-theme";
	function setDefaultCookieValue(cookieName, defaultValue) {
		// console.log(cookieName);
		const existingValue = getCookie(cookieName);
		// console.log(getCookie(existingValue));
		// let cookieValue = "";
		// if (existingValue === null) {
		// 	createPersistentCookie(cookieName, defaultValue);
		// 	return defaultValue;
		// }else{

		// }
		return existingValue;
	}
	function updateCookieValueAndDisplay(cookieName, newValue){
		const previousValue = getCookie(cookieName);
		createPersistentCookie(`${cookieName}_previous`, previousValue);
		createPersistentCookie(cookieName, newValue);
	}
	function createPersistentCookie(cookieName, cookieValue) {
		const expirationDate = new Date();
		expirationDate.setFullYear(expirationDate.getFullYear() + 10);
		const expires = expirationDate.toGMTString();
		document.cookie = `${cookieName}=${cookieValue}; expires=${expires}; path=/`;
	}
	function getCookie(cookieName) {
		const name = `${cookieName}=`;
		const cookies = document.cookie.split(';');
		for (const cookie of cookies) {
			let trimmedCookie = cookie.trim();
			if (trimmedCookie.indexOf(name) === 0) {
				return trimmedCookie.substring(name.length, trimmedCookie.length);
			}
		}
		return null;
	}
	function deleteCookie(cookieName) {
		const expirationDate = new Date(0).toGMTString(); // Set an expiration date in the past
		document.cookie = `${cookieName}=; expires=${expirationDate}; path=/`;
	}
	document.addEventListener("DOMContentLoaded", function () {
		setDefaultCookieValue(myCookieName, defaultValue);
		const previousValue = getCookie(`${myCookieName}_previous`);
		if (previousValue !== null) {
			createPersistentCookie(myCookieName, previousValue);
		}
	});
	const myCookieName = "prjMemopay-theme";
	const defaultValue = "light";
	setDefaultCookieValue(myCookieName, defaultValue);

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
		const myCookieName = "prjMemopay-theme";
		const myCookieValue = theme;
		updateCookieValueAndDisplay(myCookieName, myCookieValue);
		// document.cookie = "prjMemopay-theme=" + theme;
	});
});