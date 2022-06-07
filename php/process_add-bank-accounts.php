<?php
session_start();
$r = "";
if(isset($_POST) && !empty($_POST) && isset($_POST['id_client'])){
	$arr_addbankaccounts = [
		"id_client" => $_POST['id_client'],
		"id_bank" => $_POST['id_bank'],
		"n_account" => $_POST['numaccount'],
		"a_account" => $_POST['aliasaccount'],
		"id_type_account" => $_POST['id_typeaccount'],
		"id_currency" => $_POST['id_currencytype']
	];
	require_once 'class/client.php';
	$client = new Client();
	$countTotalAccountsDollars = $client->count_total_accounts_dollars($arr_addbankaccounts['id_client']);
	$countTotalAccountsSoles = $client->count_total_accounts_soles($arr_addbankaccounts['id_client']);
	if($countTotalAccountsDollars['total'] == 10 && $countTotalAccountsSoles['total'] == 10){
		$r = array(
			"res" => "accounts_limit"
		);
	}else{	
		if($arr_addbankaccounts['id_currency'] == 1){
			$add_accountsdollars = $client->add_bank_accounts_dollars($arr_addbankaccounts);
			if($add_accountsdollars['res'] == "true"){
				$r = array(
					"res" => "true"
				);
			}else if($add_accountsdollars['res'] == "dollar_limit"){
				$r = array(
					"res" => "dollar_limit"
				);
			}else{
				$r = array(
					"res" => "false"
				);	
			}
		}else if($arr_addbankaccounts['id_currency'] == 2){
			$add_accountssoles = $client->add_bank_accounts_soles($arr_addbankaccounts);
			if($add_accountssoles['res'] == "true"){
				$r = array(
					"res" => "true"
				);
			}else if($add_accountssoles['res'] == "soles_limit"){
				$r = array(
					"res" => "soles_limit"
				);
			}else{
				$r = array(
					"res" => "false"
				);	
			}
		}else{
			$r = array(
				"res" => "false"
			);	
		}
	}
}else{
	$r = array(
		"res" => "false"
	);
}
die(json_encode($r));