<?php 
require_once 'connection.php';
class Client extends Connection{
	
	private $table = "tbl_client";

	function __contruct(){
		parent::__contruct();
	}

	function get_data(){
		try{
			$sql = "SELECT * FROM {$this->table}";
			$stm = $this->con->query($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	function get_data_by_id($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}