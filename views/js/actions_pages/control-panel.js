$(() => {
	list_typeAccountProfile();
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

function list_typeAccountProfile(){

	let pathuser = "views/assets/img/svg/user-male.svg";
	let tmpListUser = "";

	tmpListUser += `<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
			<a href='welcome' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
				<img src='${pathuser}' alt='' width="100" height="100" style="width:100%;height:auto;">
			</a>
			<span>Juan Carlos Oscar Torres</span>
		</li>
		<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
			<button type='button' id='btn-addAccountEnterpriseShow' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
				<img src='views/assets/img/svg/add-profile.svg' alt='' width="100" height="100" style="width:auto;height:auto;">
			</button>
			<span>Agregar empresa</span>
		</li>`;

	$("#c_listTypeProfileOfUser").html(tmpListUser);
};


