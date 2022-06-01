<?php
if(isset($_POST) && !empty($_POST) && isset($_POST['id_client']) && $_POST['id_client'] != ""){
	$arr_updtransacwithnope = [
		"n_operation" => $_POST['n_operation'],
		"code_order" => $_POST['code_order'],
		"id_transaction" => $_POST['id_transaction'],
		"id_client" => $_POST['id_client']
	];
	require_once 'class/transactions.php';
	$trans = new Transactions();
	$update = $trans->update_transaction_to_cancel($arr_updtransacwithnope);
	if($update == "true"){
		$r = array(
			"res" => "true"
		);	
	}else{
		$r = array(
			"res" => "false"
		);
	}
}else{
	$r = array(
		"res" => "false"
	);
}
die(json_encode($r));