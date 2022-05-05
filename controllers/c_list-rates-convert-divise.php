<?php 
require_once '../php/class/db/connection.php';
class Rates extends Connection{
	function list(){
		try{
			$sql = "CALL sp_list_rates_mxammount_convertdivise()";
			$stm = $this->con->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$rates = new Rates();
echo $rates->list();