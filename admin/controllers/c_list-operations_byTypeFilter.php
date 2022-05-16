<?php
if(isset($_POST) && count($_POST) > 0){
	
	$option = $_POST['option'];
	$sql = "";

	if(isset($_POST['option']) && !empty($_POST['option'])){
		if($option == "Completed"){
			$sql = "SELECT * FROM tbl_transactions ttrans WHERE ttrans.status_send = 'Completed' ORDER BY ttrans.id DESC";
		}else if($option == "Pendings" || $option == "Processed"){
			$sql = "SELECT * FROM tbl_transactions ttrans WHERE ttrans.status_send = 'Pending' ORDER BY ttrans.id DESC";
		}else if($option == "Canceled"){
			$sql = "SELECT * FROM tbl_transactions ttrans WHERE ttrans.status_send = 'Cancel' ORDER BY ttrans.id DESC";
		}else{
			$sql = "SELECT * FROM tbl_transactions ttrans WHERE ttrans.status_send = 'Pending' ORDER BY ttrans.id DESC";
		}
	}else{
		$option = "Pending";
		$sql = "SELECT * FROM tbl_transactions ttrans WHERE ttrans.status_send = 'Pending' ORDER BY ttrans.id DESC";
	}

	require_once 'connection.php';
	$stm = $con->prepare($sql);
	//$stm->bindValue("option", $option);
	$stm->execute();
	$data = $stm->fetchAll(PDO::FETCH_ASSOC);
	if(isset($data) && !empty($data)){
		foreach ($data as $key => $value){
			$res['data'][] = array_map("utf8_encode",$value);
		}
		$output = json_encode($res);
	}else{
		$data = null;
		$output = json_encode($data);
	}
	echo $output;

}else{
	header("Location: operaciones");
}