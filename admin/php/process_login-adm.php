<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
	if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['email-adm'])) {
		$arr_data_adm = [
			"email" => $_POST['email-adm'],
			"password" => $_POST['pass-adm']
		];
		require_once '../controllers/c_login-adm.php';
		$login = new Login_Admin();
		$verify = $login->verify_admin($arr_data_adm);
		if(!empty($verify)){
			require_once '../controllers/c_list_byAdmin.php';
			$idadm = $verify[0]['id'];
			$user = new List_byIdAdmin();
			$getbyid = $user->list($idadm);

			if($getbyid > 0){
				session_start();
				$_SESSION['admin_sessmemopay'] = $getbyid; 
				
				$r = array(
          'res' => 'true',
          'received' => $getbyid,
        );
			}else{
				$r = array(
					'res' => 'false'
				);
			}
		}else{
			$r = array(
				'res' => 'false'
			);
		}
	}else{
		$r = array(
      'res' => 'error_email',
    );
	}
}else{
	$r = array(
		'res' => 'false'
	);
}
die(json_encode($r));