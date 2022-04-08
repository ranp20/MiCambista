<?php
if(isset($_POST) && count($_POST) > 0){
	if(isset($_GET['action']) && $_GET['action'] == "SaveChanges"){
		$arr_postSettings = [];
		$res = [];

		// ------------ AJUSTES - HOME
		if(isset($_POST['home_settings'])){
			$whatsapp_phone = (isset($_POST['whatsapp_phone'])) ? str_replace(" ", "", $_POST['whatsapp_phone']) : 0;
			$whatsapp_text = (isset($_POST['whatsapp_text']) && $_POST['whatsapp_text'] != "") ? $_POST['whatsapp_text'] : "";

			$arr_postSettings = [
				"whatsapp_phone" => $whatsapp_phone,
				"whatsapp_text" => $whatsapp_text
			];
		}

		require_once 'connection.php';
		foreach($arr_postSettings as $key => $valor){
			$sql = "UPDATE tbl_settings SET setting_value = '".$valor."' WHERE setting_name = '".$key."'";
			$result = $con->prepare($sql);
			$result->execute();
			if($result == true){
				$res = array(
					'response' => 'updated',
					'message' => 'Éxito, se ha actualizado el registro correctamente.'
				);
  			header("Location: ajustes");
			}else{
				$res = array(
					'response' => 'false',
					'message' => 'Error, lo sentimos hubo un error al actualizar el registro.'
				);
			}
		}

		//echo $json = '{"status" : "' . $res['response'] . '","message" : "' . $res['message'] . '"}';
  	die();
	}else{
		echo "Error, get invalido";
	}
}else{
	header("Location: ajustes");
}