<?php 

require_once 'connection.php';

class Countries extends Connection{
	
	private $table = "tbl_country";

	function __construct(){
		parent::__construct();
	}

	function get_countries(){
		try{
			$sql = "SELECT * FROM {$this->table}";
			$stm = $this->con->query($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}