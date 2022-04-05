<?php 
require_once '../../php/class/db/connection.php';
class Update extends Connection{
	function update_bank(){
		$arr_rates = [
			"buy_at" => $_POST['buy_at'],
			"sell_at" => $_POST['sell_at'],
			"id" => $_POST['id']
		];

		try{
			$sql = "UPDATE tbl_rates SET buy_at = :buy_at, sell_at = :sell_at WHERE id = :id";
			$stm = $this->con->prepare($sql);
			foreach ($arr_rates as $key => $value) {
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
echo $update->update_bank();