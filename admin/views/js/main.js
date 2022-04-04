$(() => {
	const contTotalSidebarLeft = document.querySelector('.cDash-adm--csidebarLeft');
	const contInfoSidebarLeft = document.querySelector(".cDash-adm--csidebarLeft__sidenav");
	const contTotalSidebarRight = document.querySelector('.cDash-adm--containRight');
	const iconBtnClose = document.querySelector("#closebtnToggSideNav_icon");
	const iconBtnOpen = document.querySelector("#openbtnToggSideNav_icon");

	iconBtnOpen.addEventListener("click", function(){
		contTotalSidebarLeft.classList.toggle("active");
		contInfoSidebarLeft.classList.toggle("active");
		contTotalSidebarRight.classList.toggle("v-show");
	});
	iconBtnClose.addEventListener("click", function(){
		contTotalSidebarLeft.classList.toggle("active");
		contInfoSidebarLeft.classList.toggle("active");
		contTotalSidebarRight.classList.toggle("v-show");
	});
	contTotalSidebarLeft.addEventListener('click', e => {
		if(e.target === contTotalSidebarLeft){
			contTotalSidebarLeft.classList.toggle('active');
			contInfoSidebarLeft.classList.toggle("active");
		}
	});
});