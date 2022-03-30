<?php 
require_once '../php/class/connection.php';
class Complete_RegClient extends Connection{
	function update(){

		$params = count($_POST);
		$statusaccount = $params * 2;

		$arr_upregister = [
			"name" => $_POST['name'],
			"lastname" => $_POST['lastname'],
			"n_document" => $_POST['n_document'],
			"sex" => $_POST['sex'],
			"id_type_document" => $_POST['id_type_document'],
			"id_type_sex" => $_POST['id_type_sex'],
			"complete_account" => $statusaccount,
			"id_client" => $_POST['id_client'],
		];

		try{
			$sql = "CALL sp_update_complete_register(:name, :lastname, :n_document, :sex, :id_type_document, :id_type_sex, :complete_account, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_upregister as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$client = new Complete_RegClient();
echo $client->update();