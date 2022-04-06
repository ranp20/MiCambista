<?php 
require_once '../php/class/db/connection.php';
class List_All_Transactions extends Connection{
	function list(){
		$id = $_POST['id_client'];
		try{
			$sql = "CALL sp_list_transactions_byIdClient(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new List_All_Transactions();
echo $transaction->list();