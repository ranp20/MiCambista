<?php 
require_once '../php/class/db/connection.php';
class List_Check_Coupon extends Connection{
	function list(){
		$code_coupon = $_POST['codecoupon'];
		try{
			$sql = "CALL sp_list_check_coupon(:code_coupon)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":code_coupon", $code_coupon);
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