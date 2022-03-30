<?php 
require_once '../php/class/connection.php';
class List_Transactions_ByIdTrans extends Connection{
	function list(){
	
		$id = $_POST['id_transaction'];

		try{
			$sql = "CALL sp_list_transaction_byIdTransaction(:id_transaction)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_transaction", $id);
			$stm->execute();
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);

			echo $res;

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new List_Transactions_ByIdTrans();
echo $transaction->list();