<?php 
require_once '../php/class/db/connection.php';
class List_Accounts_Banks extends Connection{
	function list(){
		$id_client = $_POST['id_client'];
		try{
			$sql = "CALL sp_list_accounts_byIdClient(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$accounts = new List_Accounts_Banks();
echo $accounts->list();