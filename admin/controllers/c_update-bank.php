<?php 
require_once '../../php/class/db/connection.php';
class Update extends Connection{
	function update_bank(){

		$img = (isset($_FILES['imagen']['name'])) ? strtolower($_FILES['imagen']['name']) : "";

		$arr = [
			"name" => $_POST['name'],
			"imagen" => $img,
			"id" => $_POST['id']
		];

		$arr_without_image = [
			"name" => $_POST['name'],
			"id" => $_POST['id']
		];

		try{
			$sql = "";
			if(!isset($_FILES['imagen']['tmp_name'])){
				$sql = "UPDATE tbl_bank SET name = :name WHERE id = :id";				
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
				$file_folder = "../views/assets/img/banks/";

				if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){					
					$sql = "UPDATE tbl_bank SET name = :name, photo = :imagen WHERE id = :id";
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
echo $update->update_bank();