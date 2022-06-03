<?php
if(isset($_POST) && count($_POST) > 0){

	$id = $_POST['idupdate-client'];
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
}else{
	header("Location: clientes");
}
die(json_encode($r));

/*
require_once '../../php/class/db/connection.php';
class Update_Coupons extends Connection{
	function update(){
		// print_r($_POST);
		// exit();
		
		$arr_rates = [
			"id_coupon" => (isset($_POST['cli_listcoupons']) && !empty($_POST['cli_listcoupons'])) ? json_encode($_POST['cli_listcoupons']) : "[]",
			"id_client" => $_POST['idupdate-client']
		];
		try{
			$sql = "CALL sp_update_client_coupon(:id_coupon, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_rates as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			if($stm->rowCount() > 0){
				$r = array(
					'res' => 'updated'
				);
			}else{
				$r = array(
					'res' => 'error'
				);
			}
			echo json_encode($r);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$update = new Update_Coupons();
echo $update->update();
*/