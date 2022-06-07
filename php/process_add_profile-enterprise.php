<?php
session_start();
$r = "";
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
  require_once 'class/enterprise.php';
  $client = new Client();
  $enterprise = new Enterprise();
  $addprofile = $enterprise->add_profile_client($arr_enterprise);
  if($addprofile['res'] == "true"){
    $update_multiprofiles = $client->update_multiple_profiles($arr_enterprise['id_client']);
    if($update_multiprofiles == "true"){    
      $list = $client->get_enterprise_data($arr_enterprise['id_client']);
      $r = array(
        'response' => "true",
        'received' => $list
      );
    }else{
      $r = array(
        'response' => 'false',
      );
    }
  }else if($addprofile['res'] == "limit_profiles"){
    $r = array(
      'response' => "limit_profiles"
    );
  }else{
    $r = array(
      'response' => 'false',
    );
  }
}else{
	$r = array(
    'response' => 'false',
  );
}
die(json_encode($r));