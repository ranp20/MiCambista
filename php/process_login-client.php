<?php 

if(isset($_POST)){

	$arr_data_client = [
		"email" => $_POST['email'],
		"pass" => $_POST['password']
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
				$_SESSION['client'] = $getbyid;
				
				echo "incomplete";

			}else{
				
				session_start();
				$_SESSION['client'] = $getbyid;
				
				echo "complete";
			}

		}else{

			echo "ErrorData";
		}

	}else{
		echo "ErrorData";
	}

}else{
	echo "ErrorData";
}