<?php 
require_once '../php/class/db/connection.php';
class List_TypeSex extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM tbl_type_sex ORDER BY id ASC";
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
$typesex = new List_TypeSex();
echo $typesex->list();