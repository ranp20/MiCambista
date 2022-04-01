<?php 
require_once '../php/class/db/connection.php';
class Update_Detail_Account extends Connection{
	function update(){
		$arr_upddetails = [
			"n_account" => $_POST['n_account'],
			"a_account" => $_POST['a_account'],
			"id_client" => $_POST['id_client'],
			"id_account" => $_POST['id_account']
		];
		try{
			$sql = "CALL sp_update_account_bank(:n_account, :a_account, :id_client, :id_account)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_upddetails as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$update = new Update_Detail_Account();
echo $update->update();