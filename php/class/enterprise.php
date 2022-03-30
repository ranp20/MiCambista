<?php 
require_once 'connection.php';
class Enterprise extends Connection{
	
	private $table = "tbl_enterprise";

	function __contruct(){
		parent::__contruct();
	}

	function get_data_by_idclient($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id_client = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}