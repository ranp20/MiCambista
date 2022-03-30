<?php 

if(isset($_POST)){
	$arr_data = [
		"cambioval" => $_POST['cambioval'],
		"prefix" => $_POST['prefix'],
		"divise" => $_POST['val_type'],
		"quantity" => $_POST['val_send'],
		"type_received" => $_POST['type_received'],
		"prefix_received" => $_POST['prefix_received'],
	];
	$response = $arr_data;
}else{
	$response = $arr_data;
}
die(json_encode($response));