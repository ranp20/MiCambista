<?php 

require_once 'class/connection.php';
require_once '../vendor/autoload.php';
require_once 'class/google_auth.php';

/* OBTENER EL JSON ENVIADO POR POST/CONVERTIMOS A ARRAY*/
$data = file_get_contents('php://input');
$action = json_decode( $data, true );
$actionlogin = $action['action'];

if($actionlogin == "loginwithgoogle"){
	
	$googleClient = new Google_Client();
	$auth = new GoogleAuth($googleClient);

	if(!$auth->isLoggedIn()){
		$auth->getAuthUrl();	
	}else{
		echo "Bien";
	}

}else{
	echo "NO se recibió el click";
}

