<?php 
require_once '../php/class/connection.php';

class Add_Account_Bank extends Connection{
	function add(){

		$arr_addaccount = [
			"id_client" => $_POST['id_client'],
			"id_bank" => $_POST['id_bank'],
			"n_account" => $_POST['numaccount'],
			"a_account" => $_POST['aliasaccount'],
			"id_type_account" => $_POST['id_typeaccount'],
			"id_currency" => $_POST['id_currencytype'],
		];

		try{
			$sql = "CALL sp_add_account_bank( :id_client, :id_bank, :n_account, :a_account, :id_type_account, :id_currency)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_addaccount as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
			echo $res;

			//return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$account = new Add_Account_Bank();
echo $account->add();