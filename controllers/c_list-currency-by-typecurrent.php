<?php 
require_once '../php/class/db/connection.php';
class List_Currency_by_TypeCurrent extends Connection{
	function list(){
		$type_currency = $_POST['type_currency'];
		try{
			$sql = "CALL sp_list_currency_byTypeCurrent(:type_currency)";
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
$accounts = new List_Currency_by_TypeCurrent();
echo $accounts->list();