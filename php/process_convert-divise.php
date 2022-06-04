<?php
session_start();
$r = "";
if(isset($_POST) && $_POST > 0){
	if(isset($_SESSION['cli_sessmemopay'][0]['validation_status']) && isset($_SESSION['cli_sessmemopay'][0]['profile_type']) && isset($_SESSION['cli_sessmemopay'][0]['profile_name'])){
		require_once 'class/rates.php';
		require_once 'class/client.php';
		$client = new Client();
		$rates = new Rates();
		$listMaxRates = $rates->get_maximum_convert_divise();
		$list_state = $client->get_status_biometric_validation($_SESSION['cli_sessmemopay'][0]['id']);
		$st_validation = $list_state[0]['validation_status'];
		$ammount_max = floatval($listMaxRates[0]['mxaammountcv']);
		$ammount_send = floatval($_POST['ammount_send']);
		$profile_type = $_SESSION['cli_sessmemopay'][0]['profile_type'];
		$profile_name = $_SESSION['cli_sessmemopay'][0]['profile_name'];
		$arr_data = [
			"cambioval" => $_POST['cambioval'],
			"prefix" => $_POST['prefix'],
			"divise" => $_POST['val_type'],
			"quantity" => $_POST['val_send'],
			"type_received" => $_POST['type_received'],
			"prefix_received" => $_POST['prefix_received'],
			"ammount_send" => $ammount_send,
			"profile_type" => $profile_type,
			"profile_name" => $profile_name
		];

		if($_POST['type_received'] == "Dólares"){
			if($_POST['ammount_send'] < $ammount_max){
				$r = array(
					"res" => 'st-less_limit',
					"received" => $arr_data
				);
			}else{
				if($st_validation == "accepted"){
					$r = array(
						"res" => 'st-accepted',
						"received" => $arr_data
					);
				}else if($st_validation == "in_review"){
					$r = array(
						"res" => 'st-in_review'
					);
				}else if($st_validation == "rejected"){
					$r = array(
						"res" => 'st-rejected'
					);
				}else{
					$r = array(
						"res" => 'st-limit_change'
					);
				}
			}
		}else if($_POST['val_type'] == "Dólares"){
			if($_POST['val_send'] < $ammount_max){
				$r = array(
					"res" => 'st-less_limit',
					"received" => $arr_data
				);
			}else{
				if($st_validation == "accepted"){
					$r = array(
						"res" => 'st-accepted',
						"received" => $arr_data
					);
				}else if($st_validation == "in_review"){
					$r = array(
						"res" => 'st-in_review'
					);
				}else if($st_validation == "rejected"){
					$r = array(
						"res" => 'st-rejected'
					);
				}else{
					$r = array(
						"res" => 'st-limit_change'
					);
				}
			}
		}
/*
		print_r($_POST);
		exit();
		if($ammount_send < $ammount_max){
			$r = array(
				"res" => 'st-less_limit',
				"received" => $arr_data
			);
		}else{
			if($st_validation == "accepted"){
				$r = array(
					"res" => 'st-accepted',
					"received" => $arr_data
				);
			}else if($st_validation == "in_review"){
				$r = array(
					"res" => 'st-in_review'
				);
			}else if($st_validation == "rejected"){
				$r = array(
					"res" => 'st-rejected'
				);
			}else{
				$r = array(
					"res" => 'st-limit_change'
				);
			}
		}
		*/
	}else{
		$r = array(
			"res" => 'false'
		);
	}
}else{
	$r = array(
		"res" => 'false'
	);
}
die(json_encode($r));