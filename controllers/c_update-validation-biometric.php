<?php 
require_once '../php/class/db/connection.php';
class Complete_ValidBiometric extends Connection{
	function update(){

		print_r($_POST);
		echo "<br>";
		print_r($_FILES['imagen_front']);
		echo "<br>";
		print_r($_FILES['imagen_back']);
		exit();
		$params = count($_POST);
		$statusaccount = $params * 10;
		$arr_upbiometric = [
			"video_validation" => $_POST['videoBlob_valid'],
			"complete_account" => $statusaccount,
			"id_client" => $_POST['id_client'],
		];
		try{
			$sql = "CALL sp_update_validation_biometric(:video_validation, :complete_account, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_upbiometric as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$client = new Complete_ValidBiometric();
echo $client->update();