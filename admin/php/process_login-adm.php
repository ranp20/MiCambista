<?php 
if(isset($_POST) && count($_POST) > 0){

	$arr_data_adm = [
		"email" => $_POST['email-adm'],
		"password" => $_POST['pass-adm']
	];

	require_once '../controllers/c_login-adm.php';
	$login = new Login_Admin();
	$verify = $login->verify_admin($arr_data_adm);

	print_r($_POST);
	exit();

	if(!empty($verify)){

		require_once '../controllers/c_list_byAdmin.php';

		$idadm = $verify[0]['id'];

		$user = new List_byIdAdmin();
		$getbyid = $user->list($idadm);

		if($getbyid > 0){
			session_start();
			$_SESSION['admin'] = $getbyid; 
			
			$res = array(
				'response' => 'true'
			);
		}else{

			$res = array(
				'response' => 'false'
			);
		}
	}else{
		$res = array(
			'response' => 'false'
		);
	}

}else{
	$res = array(
		'response' => 'false'
	);
}
die(json_encode($res));