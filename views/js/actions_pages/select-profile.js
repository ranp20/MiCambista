$(() => {
	// ------------ MOSTRAR/OCULTAR EL FORMULARIO DE REGISTRO DE CUENTAS BANCARIAS
	const btn_frmOpenAddAccountEnterprise = document.querySelector("#btn-addAccountEnterpriseShow");
	const btn_frmCloseAddAccountEnterprise = document.querySelector("#icon_frmbtnCloseFrmEnterprise");
	const c_totalfrmAddAccountEnterprise = document.querySelector(".cformAddAccountEnterprise");
	const c_containfrmAddAccountEnterprise = document.querySelector("#form-AddAccountEnterprise");

	btn_frmOpenAddAccountEnterprise.addEventListener("click", function(){
		c_totalfrmAddAccountEnterprise.classList.add("show");
		c_containfrmAddAccountEnterprise.classList.add("show");
	});
	btn_frmCloseAddAccountEnterprise.addEventListener("click", function(){
		c_totalfrmAddAccountEnterprise.classList.remove("show");
		c_containfrmAddAccountEnterprise.classList.remove("show");
	});
	c_totalfrmAddAccountEnterprise.addEventListener('click', e => {
		if(e.target === c_totalfrmAddAccountEnterprise){
			c_totalfrmAddAccountEnterprise.classList.remove('show');
			c_containfrmAddAccountEnterprise.classList.remove("show");
		}
	});
});