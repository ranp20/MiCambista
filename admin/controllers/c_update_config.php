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

		// ------------ AJUSTES - CONVERTIONS
		if(isset($_POST['convertions_settings'])){
			$maxamount_convertion = (isset($_POST['maxAmountSendReceived'])) ? str_replace(",", "", $_POST['maxAmountSendReceived']) : 0;
			$maxamountinconvertdivise_convertion = (isset($_POST['maxAmountInConvertDivise'])) ? str_replace(",", "", $_POST['maxAmountInConvertDivise']) : 0;

			$arr_postSettings = [
				"maxamount_convertion" => $maxamount_convertion,
				"maxamountinconvertdivise_convertion" => $maxamountinconvertdivise_convertion
			];
		}

		require_once 'connection.php';
		$sql = "";
		foreach($arr_postSettings as $key => $valor){
			$sql_valid = "SELECT setting_name FROM tbl_settings WHERE setting_name = '".$key."'";
			$row_valid = $con->query($sql_valid);
			$numb_rows = $row_valid->rowCount();
			if($numb_rows > 0){
				$sql = "UPDATE tbl_settings SET setting_value = '".$valor."' WHERE setting_name = '".$key."'";
			}else{
				$sql = "INSERT INTO tbl_settings (setting_name, setting_value) VALUES ('".$key."','".$valor."')";
			}
			$sql_db = $sql;
			$result = $con->prepare($sql_db);
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