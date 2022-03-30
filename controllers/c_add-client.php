<?php
require_once '../php/class/connection.php';
class Add_client extends Connection{
	function add($arr_datacli){
		print_r($arr_datacli);
		exit();
		try{
			$sql = "CALL sp_add_client(:email, :password, :telephone, :complete_account)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_datacli as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
			//return $stm->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}