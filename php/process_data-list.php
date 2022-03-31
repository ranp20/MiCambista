<?php 
$idclient = $_SESSION['cli_micambista']['id'];

require_once 'class/client.php';
$client = new Client();
$dataCli = $client->get_data_by_id($idclient);
$name = $dataCli[0]['name']." ".$dataCli[0]['lastname'];

require_once 'class/enterprise.php';
$enterprise = new Enterprise();
$dataEnterprise = $enterprise->get_data_by_idclient($idclient);