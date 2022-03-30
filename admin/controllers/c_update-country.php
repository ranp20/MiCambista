<?php 

	require_once '../../php/class/connection.php';

	class Update extends Connection{
		function update_country(){

			$arr = [
				"name" => $_POST['name'],
				"prefix" => "+ ".$_POST['prefix'],
				"imagen" => strtolower($_FILES['imagen']['name']),
				"id" => $_POST['id']
			];

			$arr_without_image = [
				"name" => $_POST['name'],
				"prefix" => "+ ".$_POST['prefix'],
				"id" => $_POST['id']
			];

			try{
				$sql = "";
				if(!isset($_FILES['imagen']['tmp_name'])){
					$sql = "UPDATE tbl_country SET name = :name, prefix = :prefix WHERE id = :id";
					
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
					$file_folder = "../assets/img/flags/";

					if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){					
						$sql = "UPDATE tbl_country SET name = :name, prefix = :prefix, photo = :imagen WHERE id = :id";
						
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
	echo $update->update_country();