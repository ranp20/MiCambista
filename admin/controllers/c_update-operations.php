<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
	$iListIds = 0;
	$listDecode = json_decode($_POST['id_list'], true);
	$action = "";
	print_r($listDecode);
	exit();
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

	require_once 'connection.php';
	while ($iListIds < count($listDecode)){
		$sql = "UPDATE tbl_transactions SET status_send = '".$action[$iListIds]."' WHERE id = '".$listDecode[$iListIds]['id']."'";
		//$sql = "UPDATE tbl_transactions SET status_send = '".$action."' WHERE id = '".$listDecode[$iListIds]['id']."'";
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