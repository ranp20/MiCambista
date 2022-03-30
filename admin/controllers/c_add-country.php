<?php 
require_once '../../php/class/connection.php';
class Add_Country extends Connection{	
	function add(){
		
		$arr_country = [
			"name" => $_POST['name'],
			"prefix" => "+ ".$_POST['prefix'],
			"imagen" => strtolower($_FILES['imagen']['name']),
		];

		try{

			$file_origin = $_FILES['imagen']['name'];
			$file_lowercase = strtolower($file_origin);
			$file_temp = $_FILES['imagen']['tmp_name'];
			$file_folder = "../assets/img/flags/";

			if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){
				$sql = "CALL sp_add_country (:name, :prefix, :imagen)";
				$stm = $this->con->prepare($sql);
				
				foreach ($arr_country as $key => $value) {
					$stm->bindValue($key, $value);
				}

				$stm->execute();
				$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				if(count($data) > 0){
					$res = json_decode($data);
					echo "Inserto";
				}else{
					$res = json_decode($data);
					echo "No se ha insertado";
				}

			}else{
				echo "error fatal";
			}

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}

$add = new Add_Country();
echo $add->add();