<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST)){
	if(isset($_SESSION['cli_micambista']) && isset($_SESSION['cli_micambista'][0]['id'])){
		$arr_chckcoupon = [
			"code_coupon" => $_POST['codecoupon'],
			"id_client" => $_SESSION['cli_micambista'][0]['id']
		];
		require_once 'class/coupon.php';
		$coupon = new Coupon();
		$listByCode = $coupon->get_type_scope_by_codecoupon($arr_chckcoupon['code_coupon']);
		if(!empty($listByCode)){
			if($listByCode[0]['type_scope'] == "general"){
				$listStlGeneral = $coupon->get_coupon_slt_general($arr_chckcoupon['code_coupon']);
				$r = array(
					"res" => "tp_gen",
					"received" => $listStlGeneral
				);
			}else if($listByCode[0]['type_scope'] == "addable"){
				$listCheckByCli = $coupon->get_coupon_by_checkByCli($arr_chckcoupon);
				$r = array(
					"res" => "tp_adda",
					"received" => $listCheckByCli
				);
			}else{
				$r = array(
					"res" => "not_exist" 
				);
			}
		}else{
			$r = array(
				"res" => "not_exist" 
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