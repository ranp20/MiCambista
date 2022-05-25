<?php 
require_once '../php/class/db/connection.php';
class List_All_Transactions extends Connection{
	function list(){
		$id = $_POST['id_client'];
		$res = [];
		$output = [];
		try{
			$sql = "CALL sp_list_transactions_byIdClient_all(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($data as $key => $value){
				$res['data'][] = array_map("utf8_encode",$value);	
			}
			$output = json_encode($res);
			echo $output;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new List_All_Transactions();
echo $transaction->list();