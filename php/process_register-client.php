<?php 
if(isset($_POST) && count($_POST) > 0){
	$params = count($_POST);
	$statusaccount = $params * 4;

	$arr_datacli = [
		"email" => $_POST['email'],
		"password" => $_POST['password'],
		"telephone" => $_POST['telephone'],
		"completeaccount" => $statusaccount,
	];

	require_once '../controllers/c_add-client.php';
	$addCli = new Add_client();
	$add = $addCli->add($arr_datacli);

	if(!empty($add)){
		if(is_numeric($add[0]['res'])){

			require_once '../controllers/c_list_byIdClient.php';

			$idcli = $add[0]['res'];

			$user = new List_byIdClient();
			$getbyid = $user->list($idcli);

			if($getbyid > 0){
				session_start();
				$_SESSION['client'] = $getbyid; 
				
				echo "insertado";

			}else{
				echo "No se ha podido agregar al usuario";
			}

		}else if($add[0]['res'] == "yaexiste"){
			
			echo "yaexiste";
	
		}else{
			echo "Ocurrió un error al agregar al usuario";
		}
	}else{
		echo "No se validó el SP";
	}
}else{
	echo "Error al enviar los datos";
}