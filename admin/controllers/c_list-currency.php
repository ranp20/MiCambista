<?php 
require_once '../../php/class/connection.php';
class Currency extends Connection{
	function list(){

		try{
			$sql = "SELECT * FROM tbl_currency ORDER BY id DESC";
			$stm = $this->con->query($sql);
			$stm->execute();
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);

			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}

$currency = new Currency();
echo $currency->list();