<?php
$r = "";
if(isset($_POST) && count($_POST) > 0 && !empty($_POST)){
	if(isset($_POST['id_client']) && !empty($_POST['id_client'])){
		$arr_update = [
			"type_update" => $_POST['type_update'],
			"id_client" => $_POST['id_client']
		];
		require_once 'connection.php';
		$sql = "CALL sp_update_validation_status (:type_update, :id_client)";
		$stm = $con->prepare($sql);
		foreach ($arr_update as $key => $value) {
			$stm->bindValue($key, $value);
		}
		$stm->execute();
		if($stm->rowCount() > 0){
			if($arr_update['type_update'] == "canceled"){
				$sql2 = "CALL sp_reset_validation_biometric (:id_client)";
				$stm2 = $con->prepare($sql2);
				$stm2->bindValue(":id_client", $arr_update['id_client']);
				$stm2->execute();
				if($stm2->rowCount() > 0){
					$r = array(
						'res' => 'update_canceled'
					);
				}else{
					$r = array(
						'res' => 'false'
					);		
				}
			}else if($arr_update['type_update'] == "confirm"){
				$r = array(
					'res' => 'update_confirm'
				);
			}else{
				$r = array(
					'res' => 'false'
				);	
			}
		}else{
			$r = array(
				'res' => 'false'
			);
		}
	}else{
		$r = array(
			'res' => 'without_idclient'
		);
	}
	/*
	print_r($_POST);
	exit();
	$id = $_POST['id_client'];
	require_once 'connection.php';
	$sql = "DELETE FROM tbl_idcoupon_client WHERE id_client = '".$id."'";
	$result = $con->prepare($sql);
	$result->execute();
	
	if($result == true){
		$arr_rates = [
			"id_coupon" => (isset($_POST['cli_listcoupons']) && !empty($_POST['cli_listcoupons'])) ? json_encode($_POST['cli_listcoupons']) : "[]",
			"id_client" => $_POST['idupdate-client']
		];
		// print_r($arr_rates);
		// exit();
		$sql = "CALL sp_update_client_coupon(:id_coupon, :id_client)";
		$stm = $con->prepare($sql);
		foreach ($arr_rates as $key => $value) {
			$stm->bindValue($key, $value);
		}
		$stm->execute();
		if($stm->rowCount() > 0){
			
			if(isset($_POST['cli_listcoupons']) && !empty($_POST['cli_listcoupons'])){
				$arr_listcoupons = $_POST['cli_listcoupons'];
				foreach($arr_listcoupons as $key => $valor){
					$sql = "INSERT INTO tbl_idcoupon_client (id_client, id_coupon) VALUES ($id, '".$valor."')";
					$result = $con->prepare($sql);
					$result->execute();

					if($result == true){
						$r = array(
							'res' => 'updated'
						);
					}else{
						$r = array(
							'res' => 'error'
						);
					}
				}	
			}else{
				$r = array(
					'res' => 'updated'
				);
			}
		}else{
			$r = array(
				'res' => 'error'
			);
		}
		

	}else{
		$r = array(
			'res' => 'error'
		);
	}
	*/
}else{
	$r = array(
		'res' => 'without_post'
	);
}
die(json_encode($r));