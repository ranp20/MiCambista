<?php 
require_once '../../php/class/db/connection.php';
class Add_Country extends Connection{	
	function add(){

		$img = (isset($_FILES['imagen']['name'])) ? strtolower($_FILES['imagen']['name']) : "";
	
		$arr_country = [
			"name" => $_POST['name'],
			"prefix" => "+ ".$_POST['prefix'],
			"imagen" => $img,
		];

		try{

			$file_origin = $_FILES['imagen']['name'];
			$file_lowercase = strtolower($file_origin);
			$file_temp = $_FILES['imagen']['tmp_name'];
			$file_folder = "../views/assets/img/flags/";

			if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){
				$sql = "CALL sp_add_country (:name, :prefix, :imagen)";
				$stm = $this->con->prepare($sql);
				
				foreach ($arr_country as $key => $value) {
					$stm->bindValue($key, $value);
				}

				$stm->execute();
				return $stm->rowCount() > 0 ? "true" : "false";
			}else{
				echo "false";
			}
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$add = new Add_Country();
echo $add->add();