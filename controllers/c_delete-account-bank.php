<?php 
require_once '../php/class/db/connection.php';
class Delete_Account_Bank extends Connection{
	function delete(){
		$arr_deldetails = [
			"id_client" => $_POST['id_client'],
			"id_account" => $_POST['id_account']
		];
		try{
			$sql = "CALL sp_delete_account_bank(:id_client, :id_account)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_deldetails as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$delete = new Delete_Account_Bank();
echo $delete->delete();