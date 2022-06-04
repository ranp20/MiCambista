<?php
if(!isset($_SESSION)){
	header("Location: signin");
}else{
	if(isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])){
		$idclient = $_SESSION['cli_sessmemopay'][0]['id'];
		require_once 'class/client.php';
		$client = new Client();
		$dataCli = $client->get_data_by_id($idclient);
		if(empty($dataCli)){
			header("Location: ./");
			unset($_SESSION["cli_sessmemopay"]);
		}else{
			$name = $dataCli[0]['name']." ".$dataCli[0]['lastname'];
		}

		require_once 'class/enterprise.php';
		$enterprise = new Enterprise();
		$dataEnterprise = $enterprise->get_data_by_idclient($idclient);
	}
}