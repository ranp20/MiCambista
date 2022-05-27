<?php 
if(isset($_POST) && count($_POST) > 0){
  $arr_multiprofiles = [
    "_token" => $_POST['token'],
    "id_client" => $_POST['id_client']
  ];
  require_once '../php/class/client.php';
  $client = new Client();
  $update_multiprofile = $client->update_client_multiprofiles($arr_multiprofiles["id_client"]);
  if($update_multiprofile == "true"){
    $delete_multiprofile = $client->delete_multiprofiles_enterprise($arr_multiprofiles);
    if($delete_multiprofile == "true"){
      $list = $client->get_enterprise_data_before_delete($arr_multiprofiles["id_client"]);
      $res = array(
        'response' => "true",
        'received' => $list
      );
    }else{
      $res = array(
        'response' => 'false',
      );
    }
  }else{
    $res = array(
      'response' => 'false',
    );
  }
}else{
	$res = array(
    'response' => 'false',
  );
}
die(json_encode($res));