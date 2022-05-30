<?php 
require_once '../php/class/db/connection.php';
class Complete_ValidBiometric extends Connection{
	function update(){

		$params = count($_POST);
		$statusaccount = $params * 10;
		/*$get_img_front = $_FILES['imagen_front']['tmp_name']; //CARGA EL ARCHIVO SELECCIONADO
		$get_img_back = $_FILES['imagen_back']['tmp_name'];
		$img_doc_front = fopen($get_img_front, "rb"); //LEER EL ARCHIVO COMO BINARIO "RB" (READ BINARY)
		$img_doc_back = fopen($get_img_back, "rb");*/
		$img_front = (isset($_FILES['imagen_front']['name'])) ? strtolower($_FILES['imagen_front']['name']) : "";
		$img_back = (isset($_FILES['imagen_back']['name'])) ? strtolower($_FILES['imagen_back']['name']) : "";
		/*
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		echo "<br>";
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		exit();
		$videoBlob = substr($_POST['videoBlob_valid'], strpos($_POST['videoBlob_valid'], ",") + 1);
		$decodedVideoBlob = base64_decode($videoBlob);
		// echo $decodedVideoBlob;
		// exit();
		$filename = "test.txt";
		$fp = fopen($filename, 'wb');
		//fwrite($fp, $decodedVideoBlob);
		//fclose($fp);
		*/

		$arr_upbiometric = [
			"complete_account" => $statusaccount,
			//"video_validation" => $_POST['videoBlob_valid'],
			"photo_dni_front" => $img_front,
			"photo_dni_back" => $img_back,
			"id_client" => $_POST['id_client'],
		];
		try{

			$front_file_origin = $_FILES['imagen_front']['name'];
			$front_file_lowercase = strtolower($front_file_origin);
			$front_file_temp = $_FILES['imagen_front']['tmp_name'];
			$front_file_folder = "../admin/views/assets/img/clients/dni/";
			$back_file_origin = $_FILES['imagen_back']['name'];
			$back_file_lowercase = strtolower($back_file_origin);
			$back_file_temp = $_FILES['imagen_back']['tmp_name'];
			$back_file_folder = "../admin/views/assets/img/clients/dni/";

			if(move_uploaded_file($front_file_temp, $front_file_folder . $front_file_lowercase)){
				if(move_uploaded_file($back_file_temp, $back_file_folder . $back_file_lowercase)){
					//$sql = "CALL sp_update_validation_biometric(:complete_account, :video_validation, :photo_dni_front, :photo_dni_back, :id_client)";
					$sql = "CALL sp_update_validation_biometric(:complete_account, :photo_dni_front, :photo_dni_back, :id_client)";
					$stm = $this->con->prepare($sql);
					foreach ($arr_upbiometric as $key => $value) {
						$stm->bindValue($key, $value);
					}
					$stm->execute();
					return $stm->rowCount() > 0 ? "true" : "false";
				}else{
					return "err_img_back";
				}
			}else{
				return "err_img_front";
			}
			/*$stm->bindValue(":complete_account", $arr_upbiometric['video_validation'], PDO::PARAM_INT);
			$stm->bindValue(":video_validation", $arr_upbiometric['video_validation'], PDO::PARAM_STR);
			$stm->bindValue(":photo_dni_front", $front_file_origin, PDO::PARAM_STR);
			$stm->bindValue(":photo_dni_back", $arr_upbiometric['photo_dni_back'], PDO::PARAM_STR);
			$stm->bindValue(":id_client", $arr_upbiometric['id_client'], PDO::PARAM_INT);*/

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$client = new Complete_ValidBiometric();
echo $client->update();