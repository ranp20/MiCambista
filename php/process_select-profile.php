<?php
session_start();
if(isset($_POST) && !empty($_POST)){
	// RESETEAR LOS VALORES DE LOS ÍNDICES...
	unset($_SESSION['cli_sessmemopay'][0]['profile_type']);
	unset($_SESSION['cli_sessmemopay'][0]['profile_name']);
	// AGREGAR A LA VARIABLE DE SESSION...
	$_SESSION['cli_sessmemopay'][0]['profile_type'] = $_POST['ipt-typeprofile_used'];
	$_SESSION['cli_sessmemopay'][0]['profile_name'] = $_POST['ipt-nameprofile_used'];
	header("Location: convert-divise");
}else{
	header("Location: ./");
}