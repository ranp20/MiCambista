<?php 
require_once '../php/class/connection.php';
class List_Accounts_PLatform_ByTypeCurrent extends Connection{
	function list(){
		
		$type_currency = $_POST['type_currency'];

		try{
			$sql = "CALL sp_list_account_platform_byTypeCurrent(:type_currency)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":type_currency", $type_currency);
			$stm->execute();
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);

			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$accountsplatform = new List_Accounts_PLatform_ByTypeCurrent();
echo $accountsplatform->list();