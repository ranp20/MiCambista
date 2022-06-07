<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
	if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['u-email'])){
		if(preg_match('/^([A-Za-z\d]-?_?){4,15}[A-Za-z\d]$/', $_POST['u-password'])){
			
			require_once '../php/class/client.php';
      $user       = new Client();
      $verifymail = $user->verify_email($_POST['u-email']);

      if($verifymail == "true"){
        $r = array(
          'response' => 'err_equals',
        );
      }else{
      	$_token = md5($_POST['u-email'] . $_POST['u-password']);
      	$params = count($_POST);
				$statusaccount = $params * 4;
				$arr_datacli = [
					'_token' => $_token,
					'email' => $_POST['u-email'],
					'password' => $_POST['u-password'],
					'telephone' => $_POST['u-telephone'],
					'complete_account' => $statusaccount
				];
				require_once '../controllers/c_add-client.php';
				$addCli = new Add_client();
				$add = $addCli->add($arr_datacli);
				if($add == "true"){
          $getdata = $user->get_clients($arr_datacli['email']);
          if(count($getdata) > 0){
            session_start();
            $_SESSION['cli_sessmemopay'] = $getdata;

            $r = array(
              'response' => 'true',
              'received' => $getdata,
            );
          }else{
            $r = array(
              'response' => 'errinsert',
            );
          }
        }else{
          $r = array(
            'response' => 'errinsert',
          );
        }
      }
		}else{
			$r = array(
        'response' => 'error_pass',
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