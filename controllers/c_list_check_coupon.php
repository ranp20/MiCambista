<?php
/*
session_start();
require_once '../php/class/db/connection.php';
class List_Check_Coupon extends Connection{
	function list(){
		$code_coupon = $_POST['codecoupon'];
		$id_client = (isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])) ? $_SESSION['cli_sessmemopay'][0]['id'] : null;
		$arr_chckcoupon = [
			"code_coupon" => $code_coupon,
			"id_client" => $id_client
		];
		try{
			$sql = "CALL sp_list_check_coupon(:code_coupon, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_chckcoupon as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$check_coupon = new List_Check_Coupon();
echo $check_coupon->list();
*/