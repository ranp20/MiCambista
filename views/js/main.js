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
})(document);