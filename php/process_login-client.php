<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
	if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['u-email'])){
		$arr_data_client = [
			"email" => $_POST['u-email'],
			"password" => $_POST['u-password']
		];
		require_once '../controllers/c_login-client.php';
		$login = new Login();
		$verify = $login->verify($arr_data_client);

		if(!empty($verify)){
			require_once '../controllers/c_list_byIdClient.php';
			$idcli = $verify[0]['id'];
			$user = new List_byIdClient();
			$getbyid = $user->list($idcli);

			if($getbyid > 0){
				$status = round($getbyid[0]['complete_account']);
				if($status <= 16){
					session_start();
					$_SESSION['cli_sessmemopay'] = $getbyid;
					$r = array(
            'response' => 'reg_incomplete',
            'received' => $getbyid,
          );
				}else{
					session_start();
					$_SESSION['cli_sessmemopay'] = $getbyid;
					$r = array(
            'response' => 'reg_complete',
            'received' => $getbyid,
          );
				}
			}else{
				$r = array(
			    'response' => 'false',
			  );
			}
		}else{
			$r = array(
		    'response' => 'false',
		  );
		}
	}else{
		$r = array(
      'response' => 'error_email',
    );
	}
}else{
	$r = array(
    'response' => 'false',
  );
}
die(json_encode($r));