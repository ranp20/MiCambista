<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST)){
	if(isset($_SESSION['cli_sessmemopay']) && isset($_SESSION['cli_sessmemopay'][0]['id'])){
		$arr_chckcoupon = [
			"code_coupon" => $_POST['codecoupon'],
			"id_client" => $_SESSION['cli_sessmemopay'][0]['id']
		];
		require_once 'class/coupon.php';
		$coupon = new Coupon();
		$listByCode = $coupon->get_type_scope_by_codecoupon($arr_chckcoupon['code_coupon']);
		if(!empty($listByCode)){
			$listValidActive = $coupon->get_valid_activation_by_codecoupon($arr_chckcoupon['code_coupon']);
			if($listValidActive[0]['activation'] == "active"){
				if($listByCode[0]['type_scope'] == "general"){
					$listStlGeneral = $coupon->get_coupon_slt_general($arr_chckcoupon['code_coupon']);
					// SOLO CAMBIAR LA TARIFA, NO MANDAR MENSAJE
					$r = array(
						"res" => "tp_gen",
						"received" => $listStlGeneral
					);
				}else if($listByCode[0]['type_scope'] == "addable"){
					// SOLO CAMBIAR LA TARIFA, NO MANDAR MENSAJE
					$listCheckByCli = $coupon->get_coupon_by_checkByCli($arr_chckcoupon);
					if(!empty($listCheckByCli)){
						$r = array(
							"res" => "tp_adda",
							"received" => $listCheckByCli
						);
					}else{
						// IMPRIMIR MENSAJE: "No tienes activado este cupón"
						$r = array(
							"res" => "not_adda"
						);
					}
				}else{
					// MANDAR MENSAJE, EL CUPÓN NO EXISTE
					$r = array(
						"res" => "not_exist" 
					);
				}
			}else{
				// IMRPIMIR MENSAJE AL CLIENTE "Este cupón ya no está activo actualmente.";
				$r = array(
					"res" => "st_disabled" 
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