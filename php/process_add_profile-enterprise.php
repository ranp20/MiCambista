<?php 
if(isset($_POST) && count($_POST) > 0){
  $_token = md5($_POST['ruc'] . $_POST['name']);
	$arr_enterprise = [
    "_token" => $_token,
    "ruc" => $_POST['ruc'],
    "name" => $_POST['name'],
    "address" => $_POST['address'],
    "id_client" => $_POST['id_client']
  ];
  require_once 'class/client.php';
  require_once '../controllers/c_add-profile-enterprise.php';
  $client = new Client();
  $profile = new Add_Profile_Enterprise();
  $res = $profile->add($arr_enterprise);
  if($res[0]['res'] == "true"){
    $update_multiprofiles = $client->update_multiple_profiles($arr_enterprise['id_client']);
    if($update_multiprofiles == "true"){    
      $list = $client->get_enterprise_data($arr_enterprise['id_client']);
      $res = array(
        'response' => "true",
        'received' => $list
      );
    }else{
      $res = array(
        'response' => 'false',
      );
    }
  }else if($res[0]['res'] == "limit_profiles"){
    $res = array(
      'response' => "limit_profiles"
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
die(json_encode($res));