<?php 
require_once '../php/class/connection.php';
class List_Details_Accounts extends Connection{
	function list(){
		
		$arr_details = [
			"id_client" => $_POST['id_client'],
			"id_account" => $_POST['id_account']
		];

		try{
			$sql = "CALL sp_list_accounts_byIdAccount(:id_client, :id_account)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_details as $key => $value) {
				$stm->bindValue($key, $value);
			}

			$stm->execute();
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);

			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$details = new List_Details_Accounts();
echo $details->list();