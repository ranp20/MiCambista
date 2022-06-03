<?php
if(isset($_POST) && count($_POST) > 0){
	$option = $_POST['option'];
	$sql = "";
	
	if(isset($_POST) && isset($_POST['option']) && !empty($_POST['option'])){
		if($option == "validated"){
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'accepted' ORDER BY c.id DESC";
		}else if($option == "notvalidated" || $option == "notvalidated"){
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'incomplete' ORDER BY c.id DESC";
		}else if($option == "inreview"){
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'inreview' ORDER BY c.id DESC";
		}else if($option == "canceled"){
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'rejected' ORDER BY c.id DESC";
		}else{
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'incomplete' ORDER BY c.id DESC";
		}
	}else{
		$option = "Pending";
		$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex',	c.id_coupons FROM tbl_client c INNER JOIN tbl_type_document td ON td.id = c.id_type_document WHERE validation_status = 'incomplete' ORDER BY c.id DESC";
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