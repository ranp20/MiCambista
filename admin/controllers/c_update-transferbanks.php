<?php 

	require_once '../../php/class/connection.php';

	class Update extends Connection{
		function update_transferbank(){

			$arr = [
				"name" => $_POST['name'],
				"ruc" => $_POST['ruc'],
				"id_typeacc" => $_POST['idtypeacc'],
				"n_account" => $_POST['n_account'],
				"id_curr" => $_POST['id_curr'],
				"type_curr" => $_POST['type_curr'],
				"prefix_curr" => $_POST['prefix_curr'],
				"imagen" => strtolower($_FILES['imagen']['name']),
				"id" => $_POST['id']
			];

			$arr_without_image = [
				"name" => $_POST['name'],
				"ruc" => $_POST['ruc'],
				"id_typeacc" => $_POST['idtypeacc'],
				"n_account" => $_POST['n_account'],
				"id_curr" => $_POST['id_curr'],
				"type_curr" => $_POST['type_curr'],
				"prefix_curr" => $_POST['prefix_curr'],
				"id" => $_POST['id']
			];

			try{
				$sql = "";
				if(!isset($_FILES['imagen']['tmp_name'])){
					$sql = "UPDATE tbl_accounts_bank_platform SET name = :name, ruc = :ruc, id_type_account = :id_typeacc, n_account = :n_account, id_currency = :id_curr, type_currency = :type_curr, prefix_currency = :prefix_curr WHERE id = :id";
					
					$stm = $this->con->prepare($sql);
					foreach ($arr_without_image as $key => $value) {
						$stm->bindValue($key, $value);
					}
					$stm->execute();
					$data = $stm->fetchAll(PDO::FETCH_ASSOC);
					$res = json_decode($data);

				}else{

					$file_origin = $_FILES['imagen']['name'];
					$file_lowercase = strtolower($file_origin);
					$file_temp = $_FILES['imagen']['tmp_name'];
					$file_folder = "../assets/img/transferbanks/";

					if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){					
						$sql = "UPDATE tbl_accounts_bank_platform SET name = :name, ruc = :ruc, id_type_account = :id_typeacc, n_account = :n_account, id_currency = :id_curr, type_currency = :type_curr, prefix_currency = :prefix_curr, photo = :imagen WHERE id = :id";
						
						$stm = $this->con->prepare($sql);
						foreach ($arr as $key => $value) {
							$stm->bindValue($key, $value);
						}
						$stm->execute();
						$data = $stm->fetchAll(PDO::FETCH_ASSOC);
						$res = json_decode($data);
						
					}else{
						echo "Error fatal";
					}
				}

				echo $res;

			}catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}

	$update = new Update();
	echo $update->update_transferbank();