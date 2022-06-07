<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST) && isset($_POST['p_idclient'])){
	require_once '../admin/controllers/connection.php';
	$arr_update = [];
	$sql = "";
	if(isset($_POST['p_telephone']) && !isset($_POST['p_email']) && !isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && isset($_POST['p_email']) && !isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET email = :email WHERE id = :id";
		$arr_update = ["email" => $_POST['p_email'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && !isset($_POST['p_email']) && isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET occupation = :occupation WHERE id = :id";
		$arr_update = ["occupation" => $_POST['p_occupation'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && !isset($_POST['p_email']) && !isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET nationality = :nationality WHERE id = :id";
		$arr_update = ["nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && isset($_POST['p_email']) && !isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone, email = :email WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "email" => $_POST['p_email'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && !isset($_POST['p_email']) && isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone, occupation = :occupation WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "occupation" => $_POST['p_occupation'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && !isset($_POST['p_email']) && !isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone,	nationality = :nationality WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && isset($_POST['p_email']) && isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone,	email = :email,	occupation = :occupation WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "email" => $_POST['p_email'], "occupation" => $_POST['p_occupation'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && isset($_POST['p_email']) && !isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone, email = :email,	nationality = :nationality WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "email" => $_POST['p_email'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && !isset($_POST['p_email']) && isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET telephone = :telephone, occupation = :occupation,	nationality = :nationality WHERE id = :id";
		$arr_update = ["telephone" => $_POST['p_telephone'], "occupation" => $_POST['p_occupation'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && isset($_POST['p_email']) && isset($_POST['p_occupation']) && !isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET email = :email, occupation = :occupation WHERE id = :id";
		$arr_update = ["email" => $_POST['p_email'], "occupation" => $_POST['p_occupation'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && isset($_POST['p_email']) && !isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET email = :email,	nationality = :nationality WHERE id = :id";
		$arr_update = ["email" => $_POST['p_email'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && isset($_POST['p_email']) && isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET email = :email, occupation = :occupation, nationality = :nationality WHERE id = :id";
		$arr_update = ["email" => $_POST['p_email'], "occupation" => $_POST['p_occupation'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(!isset($_POST['p_telephone']) && !isset($_POST['p_email']) && isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET occupation = :occupation, nationality = :nationality WHERE id = :id";
		$arr_update = ["occupation" => $_POST['p_occupation'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else if(isset($_POST['p_telephone']) && isset($_POST['p_email']) && isset($_POST['p_occupation']) && isset($_POST['p_nationality'])){
		$sql = "UPDATE tbl_client SET email = :email,	telephone = :telephone,	occupation = :occupation,	nationality = :nationality WHERE id = :id";
		$arr_update = ["email" => $_POST['p_email'], "telephone" => $_POST['p_telephone'], "occupation" => $_POST['p_occupation'], "nationality" => $_POST['p_nationality'], "id" => $_POST['p_idclient']];
	}else{
		$r = array(
	    'response' => 'false',
	  );
	}

	$stm = $con->prepare($sql);
	foreach ($arr_update as $key => $value){
		$stm->bindValue($key, $value);
	}
	$stm->execute();
	if($stm == true){
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
    'response' => 'false',
  );
}
die(json_encode($r));