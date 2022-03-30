<?php 
require_once '../php/class/connection.php';

class Add_Account_Enterprise extends Connection{
	function add(){

		$arr_enterprise = [
			"name" => $_POST['name'],
			"ruc" => $_POST['ruc'],
			"address" => $_POST['address'],
			"id_client" => $_POST['id_client'],
		];

		try{
			$sql = "CALL sp_add_account_enterprise (:name, :ruc, :address, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_enterprise as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$enterprise = new Add_Account_Enterprise();
echo $enterprise->add();