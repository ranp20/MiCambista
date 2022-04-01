<?php 
require_once '../../php/class/db/connection.php';
class Update extends Connection{
	function update_transferbank(){

		$img = (isset($_FILES['imagen']['name'])) ? strtolower($_FILES['imagen']['name']) : "";

		$arr = [
			"name" => $_POST['name'],
			"n_account" => $_POST['n_account'],
			"id_typeacc" => $_POST['idtypeacc'],
			"id_curr" => $_POST['id_curr'],
			"ruc" => $_POST['ruc'],
			/*
			"type_curr" => $_POST['type_curr'],
			"prefix_curr" => $_POST['prefix_curr'],
			*/
			"imagen" => $img,
			"id" => $_POST['id']
		];

		$arr_without_image = [
			"name" => $_POST['name'],
			"n_account" => $_POST['n_account'],
			"id_typeacc" => $_POST['idtypeacc'],
			"id_curr" => $_POST['id_curr'],
			"ruc" => $_POST['ruc'],
			/*
			"type_curr" => $_POST['type_curr'],
			"prefix_curr" => $_POST['prefix_curr'],
			*/
			"id" => $_POST['id']
		];

		try{
			$sql = "";
			if(!isset($_FILES['imagen']['tmp_name'])){
				$sql = "UPDATE tbl_accounts_bank_platform SET name = :name, n_account = :n_account, id_type_account = :id_typeacc, id_currency = :id_curr, ruc = :ruc WHERE id = :id";
				$stm = $this->con->prepare($sql);
				foreach ($arr_without_image as $key => $value) {
					$stm->bindValue($key, $value);
				}
				$stm->execute();
				return $stm->rowCount() > 0 ? "true" : "false";
			}else{

				$file_origin = $_FILES['imagen']['name'];
				$file_lowercase = strtolower($file_origin);
				$file_temp = $_FILES['imagen']['tmp_name'];
				$file_folder = "../views/assets/img/transferbanks/";

				if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){					
					$sql = "UPDATE tbl_accounts_bank_platform SET name = :name, n_account = :n_account, id_type_account = :id_typeacc, id_currency = :id_curr, ruc = :ruc, photo = :imagen WHERE id = :id";
					$stm = $this->con->prepare($sql);
					foreach ($arr as $key => $value) {
						$stm->bindValue($key, $value);
					}
					$stm->execute();
					return $stm->rowCount() > 0 ? "true" : "false";					
				}else{
					return "false";
				}
			}
			//echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$update = new Update();
echo $update->update_transferbank();