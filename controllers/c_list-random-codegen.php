<?php 
require_once '../php/class/db/connection.php';
class List_random_codegen extends Connection{
	function list(){
		try{
			$sql = "CALL sp_list_random_codegen()";
			$stm = $this->con->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			return $data;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}