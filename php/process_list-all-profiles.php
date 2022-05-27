<?php
$res = "";
if(isset($_POST) && !empty($_POST)){
	require_once 'class/client.php';
  $client = new Client();
	$list = $client->get_enterprise_data($_POST['id_client']);
	if(!empty($list) && isset($list)){
		$res = array(
      'response' => "true",
      'received' => $list
    );
	}else{
		$list = $client->get_enterprise_data_before_delete($_POST['id_client']);
		if(!empty($list) && isset($list)){
			$res = array(
	      'response' => "mssg_personal",
	      'received' => $list
	    );
		}else{
			$res = array(
		    'response' => 'false',
		  );		
		}
	}
}else{
	$res = array(
    'response' => 'false',
  );
}
die(json_encode($res));