<?php
if(isset($_POST) && count($_POST) > 0){
	$listDecode = json_decode($_POST['id_list'], true);
	$action = "";
	if($_POST['action'] == "in-completed"){
		$action = "Completed";
	}else if($_POST['action'] == "in-completed"){
		$action = "Pending";
	}else if($_POST['action'] == "in-canceled"){
		$action = "Cancel";
	}else{
		$action = "Pending";
	}

	require_once 'connection.php';
	foreach($listDecode as $k => $v){
		$sql = "UPDATE tbl_transactions SET status_send = '".$action."' WHERE id = '".$v['id']."'";
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
	}
  
}else{
	header("Location: operaciones");
}
die(json_encode($r));