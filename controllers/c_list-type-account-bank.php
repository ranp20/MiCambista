<?php 
require_once '../php/class/db/connection.php';
class List_TypeAccountsBank extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM tbl_type_account_bank ORDER BY id DESC";
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
$typeaccount = new List_TypeAccountsBank();
echo $typeaccount->list();