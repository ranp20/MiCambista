<?php
session_start();
$r = "";
if(isset($_POST) && $_POST > 0){
	if(isset($_SESSION['cli_micambista'][0]['validation_status']) && isset($_SESSION['cli_micambista'][0]['profile_type']) && isset($_SESSION['cli_micambista'][0]['profile_name'])){
		$arr_chckcoupon = [
			"code_coupon" => $_POST['coupon_name'],
			"id_client" => $_SESSION['cli_micambista'][0]['id']
		];

		require_once 'class/rates.php';
		require_once 'class/coupon.php';
		require_once 'class/client.php';
		$client = new Client();
		$rates = new Rates();
		$coupon = new Coupon();
		$listMaxRates = $rates->get_maximum_convert_divise();
		$list_state = $client->get_status_biometric_validation($_SESSION['cli_micambista'][0]['id']);
		$st_validation = $list_state[0]['validation_status'];
		$ammount_max = floatval($listMaxRates[0]['mxaammountcv']);
		$ammount_send = floatval($_POST['ammount_send']);

		$listByCode = $coupon->get_type_scope_by_codecoupon($arr_chckcoupon['code_coupon']);
		if(!empty($listByCode)){
			$listValidActive = $coupon->get_valid_activation_by_codecoupon($arr_chckcoupon['code_coupon']);
			if($listValidActive[0]['activation'] == "active"){
				if($listByCode[0]['type_scope'] == "general"){
					$listStlGeneral = $coupon->get_coupon_slt_general_attach($arr_chckcoupon['code_coupon']);
					// SOLO CAMBIAR LA TARIFA, NO MANDAR MENSAJE
					$from_ammount = floatval($listStlGeneral[0]['from_ammount']);
					$profile_type = $_SESSION['cli_micambista'][0]['profile_type'];
					$profile_name = $_SESSION['cli_micambista'][0]['profile_name'];
					
					$arr_data = [
						"cambioval" => $_POST['cambioval'],
						"prefix" => $_POST['prefix'],
						"divise" => $_POST['val_type'],
						"quantity" => $_POST['val_send'],
						"type_received" => $_POST['type_received'],
						"prefix_received" => $_POST['prefix_received'],
						"ammount_send" => $ammount_send,
						"profile_type" => $profile_type,
						"profile_name" => $profile_name,
						"from_ammount" => $from_ammount
					];

					if($_POST['type_received'] == "Dólares"){
						if($_POST['ammount_send'] >= $from_ammount){
							$r = array(
								"res" => 'coup-yesapplicable',
								"received" => $arr_data
							);
						}else{
							$r = array(
								"res" => 'coup-notapplicable',
								"received" => $arr_data
							);
						}
					}else if($_POST['val_type'] == "Dólares"){
						if($_POST['val_send'] >= $from_ammount){
							$r = array(
								"res" => 'coup-yesapplicable',
								"received" => $arr_data
							);
						}else{
							$r = array(
								"res" => 'coup-notapplicable',
								"received" => $arr_data
							);
						}
					}
					/*
					$r = array(
						"res" => "tp_gen",
						"received" => $listStlGeneral
					);
					*/
				}else if($listByCode[0]['type_scope'] == "addable"){
					// SOLO CAMBIAR LA TARIFA, NO MANDAR MENSAJE
					//$listCheckByCli = $coupon->get_coupon_by_checkByCli($arr_chckcoupon);
					$list_checkcoupon = $coupon->get_check_coupon_client($arr_chckcoupon); // SI EXISTE ALGÚN CUPÓN "APLICABLE" AGREGADO AL USUARIO
					if(!empty($list_checkcoupon)){

						$from_ammount = floatval($list_checkcoupon[0]['from_ammount']);
						$profile_type = $_SESSION['cli_micambista'][0]['profile_type'];
						$profile_name = $_SESSION['cli_micambista'][0]['profile_name'];
						
						$arr_data = [
							"cambioval" => $_POST['cambioval'],
							"prefix" => $_POST['prefix'],
							"divise" => $_POST['val_type'],
							"quantity" => $_POST['val_send'],
							"type_received" => $_POST['type_received'],
							"prefix_received" => $_POST['prefix_received'],
							"ammount_send" => $ammount_send,
							"profile_type" => $profile_type,
							"profile_name" => $profile_name,
							"from_ammount" => $from_ammount
						];

						if($_POST['type_received'] == "Dólares"){
							if($_POST['ammount_send'] >= $from_ammount){
								$r = array(
									"res" => 'coup-yesapplicable',
									"received" => $arr_data
								);
							}else{
								$r = array(
									"res" => 'coup-notapplicable',
									"received" => $arr_data
								);
							}
						}else if($_POST['val_type'] == "Dólares"){
							if($_POST['val_send'] >= $from_ammount){
								$r = array(
									"res" => 'coup-yesapplicable',
									"received" => $arr_data
								);
							}else{
								$r = array(
									"res" => 'coup-notapplicable',
									"received" => $arr_data
								);
							}
						}
						/*
						$r = array(
							"res" => "tp_adda",
							"received" => $list_checkcoupon
						);*/
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

		/*
		if($st_validation == "accepted"){
			$r = array(
				"res" => 'st-accepted',
				"received" => $arr_data
			);
		}else if($st_validation == "in_review"){
			$r = array(
				"res" => 'st-in_review'
			);
		}else if($st_validation == "rejected"){
			$r = array(
				"res" => 'st-rejected'
			);
		}else{
			$r = array(
				"res" => 'st-limit_change'
			);
		}
		*/
	}else{
		$r = array(
			"res" => 'false'
		);
	}
}else{
	$r = array(
		"res" => 'false'
	);
}
die(json_encode($r));