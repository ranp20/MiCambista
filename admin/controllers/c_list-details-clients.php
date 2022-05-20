<?php 
require_once '../../php/class/db/connection.php';
class Clients_Details extends Connection{
	function list_details($id_client){
		try{
			$sql = "SELECT * FROM tbl_client WHERE id = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id_client);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			//$res = json_encode($data);
			return $data;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}