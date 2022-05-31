<?php
if(isset($_POST) && !empty($_POST)){
	if(isset($_POST['id_client'])){
		$arr_update = [
			"politically_exposed" => $_POST['politically_exposed'],
			"id_client" => $_POST['id_client']
		];
		require_once 'class/client.php';
	  $client = new Client();
		$update = $client->update_politically_exposed($arr_update);
		if($update == "true"){
			$r = array(
				'response' => 'true',
			);
		}else{
			$r = array(
				'response' => 'false',
			);
		}
	}else{
		$r = array(
			'response' => 'no_idclient',
		);
	}
}else{
	$r = array(
		'response' => 'false',
	);
}
die(json_encode($r));