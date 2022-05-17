<?php 
require_once '../php/class/db/connection.php';
class Complete_ValidBiometric extends Connection{
	function update(){

		$params = count($_POST);
		$statusaccount = $params * 10;
		$get_img_front = $_FILES['imagen_front']['tmp_name']; //CARGA EL ARCHIVO SELECCIONADO
		$get_img_back = $_FILES['imagen_back']['tmp_name'];
		$img_doc_front = fopen($get_img_front, "rb"); //LEER EL ARCHIVO COMO BINARIO "RB" (READ BINARY)
		$img_doc_back = fopen($get_img_front, "rb");

		$arr_upbiometric = [
			"complete_account" => $statusaccount,
			"video_validation" => $_POST['videoBlob_valid'],
			"photo_dni_front" => $img_doc_front,
			"photo_dni_back" => $img_doc_back,
			"id_client" => $_POST['id_client'],
		];
		try{
			$sql = "CALL sp_update_validation_biometric(:video_validation, :complete_account, :photo_dni_front, :photo_dni_back, :id_client)";
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