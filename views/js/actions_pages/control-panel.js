$(() => {
	list_typeAccountProfile();
});

function list_typeAccountProfile(){

	let pathuser = "views/assets/img/svg/user-male.svg";
	let tmpListUser = "";

	tmpListUser += `<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
			<a href='welcome' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
				<img src='${pathuser}' alt='' width="100" height="100" style="width=100%;height:auto;">
			</a>
			<span>Juan Carlos Oscar Torres</span>
		</li>
		<li class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
			<button type='button' id='btn-addAccountEnterpriseShow' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
				<img src='views/assets/img/svg/add-profile.svg' alt='' width="100" height="100" style="width=100%;height:auto;">
			</button>
			<span>Agregar empresa</span>
		</li>`;

	$("#c_listTypeProfileOfUser").html(tmpListUser);
};