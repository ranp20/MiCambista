<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST)){
	require_once 'class/client.php';
  $client = new Client();
	$list = $client->get_enterprise_data($_POST['id_client']);
	if(!empty($list) && isset($list)){
		$r = array(
      'response' => "true",
      'received' => $list
    );
	}else{
		$list = $client->get_enterprise_data_before_delete($_POST['id_client']);
		if(!empty($list) && isset($list)){
			$r = array(
	      'response' => "mssg_personal",
	      'received' => $list
	    );
		}else{
			$r = array(
		    'response' => 'false',
		  );		
		}
	}
}else{
	$r = array(
    'response' => 'false',
  );
}
die(json_encode($r));