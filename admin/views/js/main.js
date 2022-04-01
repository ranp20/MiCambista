((d) => {
	// ------------ 1. SLIDER ARTESANAL - SIDEBARLEFT
	const menuburgeradmin = d.querySelector('.cDash-adm--csidebarLeft--Lclose');
	const sidebarleft = d.querySelector('.cDash-adm--csidebarLeftC');
	const contentsidebarleft = d.querySelector('.cDash-adm--csidebarLeft');
	menuburgeradmin.addEventListener('click', function(){
		sidebarleft.classList.toggle('active');
		menuburgeradmin.classList.toggle('active');
		contentsidebarleft.classList.toggle('active');
	});
	// ------------ VERIFICAR SI SE HIZO CLICK EN UN LINK DEL SIDEBAR
	d.addEventListener('click', e => {
		if(!e.target.matches('.cDash-adm--csidebarLeftC__cList--cListOpts--m--item a')) return false;
		menuburgeradmin.classList.remove('active');
		sidebarleft.classList.remove('active');
		contentsidebarleft.classList.remove('active');
	});
	// ------------ VERIFICAR SI SE HIZO CLICK FUERA DEL SIDEBAR
	// let cAdminSidebarLeft = document.querySelector('.cDash-adm--csidebarLeft');
	// cAdminSidebarLeft.addEventListener('click', e => {
	// 	if(e.target === cAdminSidebarLeft)	cAdminSidebarLeft.classList.remove('active');
	// });

	// ------------ 2. SHOW/HIDDEN OPTIONS USER
	// ------------ 2. OPCIONES DE SESIÓN
	const menuoptssession = d.querySelector('#menu-Optsuser');
	const contentoptsssession = d.querySelector('.cDash-adm--containRight--cTop--cont--item--m');
	menuoptssession.addEventListener('click', e => {
		contentoptsssession.classList.toggle('active');
	});
	d.addEventListener('click', e => {
		if(!e.target.matches('.cDash-adm--containRight--cTop--cont--item--m--item a ')) return false;
		contentoptsssession.classList.remove('active');
	});
})(document);