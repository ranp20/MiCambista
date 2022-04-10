<?php 
require_once 'db/connection.php';
class Enterprise extends Connection{
	
	private $table = "tbl_enterprise";

	function __construct(){
		parent::__construct();
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