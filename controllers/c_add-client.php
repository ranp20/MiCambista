<?php
require_once '../php/class/db/connection.php';
class Add_client extends Connection{
	function add($arr_datacli){
		try{
			$sql = "CALL sp_add_client(:_token, :email, :password, :telephone, :complete_account)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_datacli as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}