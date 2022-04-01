<?php 
require_once '../../php/class/db/connection.php';
class Login_Admin extends Connection{
	function verify_admin($arr_data_adm){
		try{
			$sql = "CALL sp_login_admin(:email, :password)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_data_adm as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}