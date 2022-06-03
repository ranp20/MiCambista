<?php 
require_once '../../php/class/db/connection.php';
class Update extends Connection{
	function update_coupon(){
		$arr = [
			"code_coupon" => $_POST['code_coupon'],
			"larger_amounts" => $_POST['larger_amounts'],
			"buy_percent_desc" => $_POST['buy_percent_desc'],
			"buy_output_price" => $_POST['buy_output_price'],
			"sell_percent_desc" => $_POST['sell_percent_desc'],
			"sell_output_price" => $_POST['sell_output_price'],
			"type_scope" => $_POST['type_scope'],
			"id" => $_POST['id']
		];
		if($_POST['buy_percent_desc'] != 0){
			if($_POST['sell_percent_desc'] != 0){
				try{
					$sql = "UPDATE tbl_coupon SET code_coupon = :code_coupon, larger_amounts = :larger_amounts, buy_percent_desc = :buy_percent_desc, buy_output_price = :buy_output_price, sell_percent_desc = :sell_percent_desc, sell_output_price = :sell_output_price, type_scope = :type_scope WHERE id = :id";
					$stm = $this->con->prepare($sql);
					foreach ($arr as $key => $value) {
						$stm->bindValue($key, $value);
					}
					$stm->execute();
					return $stm->rowCount() > 0 ? "true" : "false";
				}catch(PDOException $e){
					return $e->getMessage();
				}
			}else{
				return "err_sell_percent_desc";	
			}
		}else{
			return "err_buy_percent_desc";
		}
	}
}
$update = new Update();
echo $update->update_coupon();