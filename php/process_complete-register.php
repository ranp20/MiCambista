<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST)){
	$params = count($_POST);
	if($params == 7){
		$statusaccount = $params * 2;
		$arr_upregister = [
			"name" => $_POST['name'],
			"lastname" => $_POST['lastname'],
			"n_document" => $_POST['n_document'],
			"sex" => $_POST['sex'],
			"id_type_document" => $_POST['id_type_document'],
			"id_type_sex" => $_POST['id_type_sex'],
			"complete_account" => $statusaccount,
			"id_client" => $_POST['id_client'],
		];
		require_once '../controllers/c_add-complete-register.php';
    $completereg = new Complete_RegClient();
    $update = $completereg->update($arr_upregister);
    if($update == "true"){
    	$_SESSION['cli_micambista'][0]['complete_account'] = $_SESSION['cli_micambista'][0]['complete_account'] + $arr_upregister['complete_account'];
    	$r = array(
		    'response' => 'true',
		  );
    }else{
    	$r = array(
		    'response' => 'false',
		  );
    }
	}else{
		$r = array(
	    'response' => 'err_missing_data',
	  );
	}
}else{
	$r = array(
    'response' => 'false',
  );
}
die(json_encode($r));