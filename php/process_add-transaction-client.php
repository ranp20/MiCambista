<?php
session_start();
$r = "";
function genId() {
	$format = 'xxxxxxxxxxxxxxxxxy';
  return preg_replace_callback('/[xy]/', function($match) {
    $pattern = '1234567890';
    if($match[0] === 'x'){
      return substr($pattern, mt_rand(0, strlen($pattern)), 1);
    }else{
      return substr(date('y'), -2);
    }
  }, "E-".$format);
}
if(isset($_POST) && !empty($_POST)){
	require_once '../controllers/c_list-random-codegen.php';
	require_once 'class/transactions.php';
	$trans = new Transactions();
	$codgen_auto = new List_random_codegen();
	$random_codegenauto = $codgen_auto->list();
	$arr_addtransac = [
		"code_reg" => $random_codegenauto[0]['res'],
		"code_order" => genId(),
		"id_client" => $_POST['id_client'],
		"id_transfer_bank" => $_POST['id_bank'],
		"id_account_bank" => $_POST['id_account_bank'],
		"type_send" => $_POST['type_send'],
		"prefix_send" => $_POST['prefix_send'],
		"amount_send" => $_POST['amount_send'],
		"type_received" => $_POST['type_received'],
		"prefix_received" => $_POST['prefix_received'],
		"amount_received" => $_POST['amount_received'],
		"tasa_change" => $_POST['tasa_change'],
		"status_send" => (isset($_POST['status_send']) && !empty($_POST['status_send'])) ? $_POST['status_send'] : "Pending"
	];
	$add = $trans->add_transaction($arr_addtransac);
	if($add == "true"){
		$arr_listbycodes = [
			"code_reg" => $arr_addtransac['code_reg'],
			"code_order" => $arr_addtransac['code_order'],
			"id_client" => $arr_addtransac['id_client']
		];
		$listByCodes = $trans->get_transaction_by_codes($arr_listbycodes);
		if(count($listByCodes) > 0){
			$r = array(
				"res" => "add",
				"received" => $listByCodes
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
}else{
	$r = array(
		"res" => "false"
	);
}
die(json_encode($r));