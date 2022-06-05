<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
	$iListIds = 0;
	$listDecode = json_decode($_POST['id_list'], true);
	$arr_dataUpdate = [];
	$action = "";
	
	if($_POST['action'] == "in-completed"){
		$action = "Completed";
	}else if($_POST['action'] == "in-process"){
		$action = "Pending";
	}else if($_POST['action'] == "in-review"){
		$action = "Inreview";
	}else if($_POST['action'] == "in-canceled"){
		$action = "Cancel";
	}else{
		$action = "Pending";
	}

	for ($i=0; $i < count($listDecode); $i++){
		array_push($arr_dataUpdate, [$action, $listDecode[$i]['value']]);
	}

	require_once 'connection.php';
	date_default_timezone_set('America/Lima');
	$dateNow = date("Y-m-d H:i:s");
	while ($iListIds < count($arr_dataUpdate)){
		$sql = "UPDATE tbl_transactions SET updated_date = '".$dateNow."', status_send = '".$arr_dataUpdate[$iListIds][0]."' WHERE id = '".$arr_dataUpdate[$iListIds][1]."'";
		$result = $con->prepare($sql);
		$result->execute();
		if($result == true){
			$r = array(
				'response' => 'updated'
			);
		}else{
			$r = array(
				'response' => 'error'
			);
		}
		$iListIds++;
	}
}else{
	header("Location: operaciones");
}
die(json_encode($r));