<?php 
require_once '../../php/class/connection.php';
class Type_Account_Bank extends Connection{
	function list(){

		try{
			$sql = "SELECT * FROM tbl_type_account_bank ORDER BY id DESC";
			$stm = $this->con->query($sql);
			$stm->execute();
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);

			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}

$typeaccountbank = new Type_Account_Bank();
echo $typeaccountbank->list();