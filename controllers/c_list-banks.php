<?php 
require_once '../php/class/connection.php';
class List_Banks extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM tbl_bank ORDER BY id DESC";
			$stm = $this->con->query($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
			echo $res;

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$country = new List_Banks();
echo $country->list();