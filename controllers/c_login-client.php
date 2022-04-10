<?php 
require_once '../php/class/db/connection.php';
class Login extends Connection{
	function verify($arr_data_client){
		try{
			$sql = "CALL sp_login_client(:email, :password)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_data_client as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}