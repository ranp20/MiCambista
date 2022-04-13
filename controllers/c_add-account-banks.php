<?php 
require_once '../php/class/db/connection.php';
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
			if($arr_addaccount['id_currency'] == 1){
				$sql = "CALL sp_add_account_bank_dolares(:id_client, :id_bank, :n_account, :a_account, :id_type_account, :id_currency)";
				$stm = $this->con->prepare($sql);
				foreach ($arr_addaccount as $key => $value) {
					$stm->bindValue($key, $value);
				}
				$stm->execute();
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				$res = json_encode($data);
				return $res;
			}else{
				$sql = "CALL sp_add_account_bank_soles(:id_client, :id_bank, :n_account, :a_account, :id_type_account, :id_currency)";
				$stm = $this->con->prepare($sql);
				foreach ($arr_addaccount as $key => $value) {
					$stm->bindValue($key, $value);
				}
				$stm->execute();
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				$res = json_encode($data);
				return $res;
			}
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$account = new Add_Account_Bank();
echo $account->add();