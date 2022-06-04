<?php 
require_once '../php/class/db/connection.php';
class List_Countries extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM tbl_country ORDER BY id DESC";
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
$country = new List_Countries();
echo $country->list();