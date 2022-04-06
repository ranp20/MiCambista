<?php 
require_once '../php/class/db/connection.php';
class List_Accounts_Banks_ByTypeCurrent extends Connection{
	function list(){
		$arr_accountstypecurr = [
			"id_client" => $_POST['id_client'],
			"type_currency" => $_POST['type_currency']
		];
		try{
			$sql = "CALL sp_list_accounts_byTypeCurrent(:id_client, :type_currency)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_accountstypecurr as $key => $value) {
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
$accounts = new List_Accounts_Banks_ByTypeCurrent();
echo $accounts->list();