<?php 
require_once '../../php/class/db/connection.php';
class Update extends Connection{
	function update_coupon(){
		$arr = [
			"code_coupon" => $_POST['code_coupon'],
			"percent_desc" => $_POST['percent_desc'],
			"id" => $_POST['id']
		];
		try{
			$sql = "UPDATE tbl_coupon SET code_coupon = :code_coupon, percent_desc = :percent_desc WHERE id = :id";
			$stm = $this->con->prepare($sql);
			foreach ($arr as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$update = new Update();
echo $update->update_coupon();