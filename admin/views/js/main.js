$(() => {
	const contTotalSidebarLeft = document.querySelector('.cDash-adm--csidebarLeft'),
				contInfoSidebarLeft = document.querySelector(".cDash-adm--csidebarLeft__sidenav"),
				contTotalSidebarRight = document.querySelector('.cDash-adm--containRight'),
				iconBtnClose = document.querySelector("#closebtnToggSideNav_icon"),
				iconBtnOpen = document.querySelector("#openbtnToggSideNav_icon"),
				mOptUser = document.querySelector("#menu-Optsuser"),
				mOptUserList = document.querySelector("#m-OptsuserList");

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
	mOptUser.addEventListener("click", function(){
		mOptUserList.classList.toggle("active");	
	});
});