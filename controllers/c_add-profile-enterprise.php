<?php 
require_once '../php/class/db/connection.php';
class Add_Profile_Enterprise extends Connection{
	function add($arr_enterprise){
		try{
			$sql = "CALL sp_add_profile_enterprise(:_token, :ruc, :name, :address, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_enterprise as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}