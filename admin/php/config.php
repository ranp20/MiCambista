<?php 
require_once '../../php/class/db/connection.php';
class List_Settings extends Connection{
	function list($setting_name){
		$registros = [];
		$sql = "SELECT setting_value FROM tbl_settings WHERE setting_name = :setting_name LIMIT 1";
		$stm = $this->con->prepare($sql);
		$stm->bindValue(":setting_name", $setting_name);
		$stm->execute();
		
		while($r = $stm->fetchAll(PDO::FETCH_ASSOC)){
			$registros = $r;
		}

		return $registros;
	}
}