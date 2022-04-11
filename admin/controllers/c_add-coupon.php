<?php 
require_once '../../php/class/db/connection.php';
class Add_Coupon extends Connection{	
	function add(){
		$arr_coupon = [
			"code_coupon" => $_POST['code_coupon'],
			"larger_amounts" => $_POST['larger_amounts'],
			"percent_desc" => $_POST['percent_desc'],
			"output_price" => $_POST['output_price']
		];

		if($_POST['percent_desc'] != 0){
			try{
				$sql = "CALL sp_add_coupon (:code_coupon, :larger_amounts, :percent_desc, :output_price)";
				$stm = $this->con->prepare($sql);
				foreach ($arr_coupon as $key => $value) {
					$stm->bindValue($key, $value);
				}
				$stm->execute();
				return $stm->rowCount() > 0 ? "true" : "false";
			}catch(PDOException $err){
				return $err->getMessage();
			}
		}else{
			return "err_percent_desc";
		}
	}
}
$add = new Add_Coupon();
echo $add->add();