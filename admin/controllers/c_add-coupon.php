<?php 
require_once '../../php/class/db/connection.php';
class Add_Coupon extends Connection{	
	function add(){
		$arr_coupon = [
			"code_coupon" => $_POST['code_coupon'],
			"larger_amounts" => $_POST['larger_amounts'],
			"buy_percent_desc" => $_POST['buy_percent_desc'],
			"buy_output_price" => $_POST['buy_output_price'],
			"sell_percent_desc" => $_POST['sell_percent_desc'],
			"sell_output_price" => $_POST['sell_output_price']
		];

		if($_POST['buy_percent_desc'] != 0){
			if ($_POST['sell_percent_desc'] != 0){
				try{
					$sql = "CALL sp_add_coupon (:code_coupon, :larger_amounts, :buy_percent_desc, :buy_output_price, :sell_percent_desc, :sell_output_price)";
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
				return "err_sell_percent_desc";
			}
		}else{
			return "err_buy_percent_desc";
		}
	}
}
$add = new Add_Coupon();
echo $add->add();