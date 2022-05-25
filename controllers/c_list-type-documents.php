<?php 
require_once '../php/class/db/connection.php';
class List_TypeDocuments extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM tbl_type_document ORDER BY id ASC";
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
$typedocuments = new List_TypeDocuments();
echo $typedocuments->list();