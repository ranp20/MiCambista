<?php
require_once '../php/class/db/connection.php';
class List_byIdClient extends Connection{
	function list($id){
		try{
			$sql = "SELECT * FROM tbl_client WHERE id = :id LIMIT 1";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}