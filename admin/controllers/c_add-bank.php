<?php 
require_once '../../php/class/db/connection.php';
class Add_Bank extends Connection{	
	function add(){
		
		$arr_bank = [
			"name" => $_POST['name'],
			"imagen" => strtolower($_FILES['imagen']['name']),
		];
		try{
			$file_origin = $_FILES['imagen']['name'];
			$file_lowercase = strtolower($file_origin);
			$file_temp = $_FILES['imagen']['tmp_name'];
			$file_folder = "../views/assets/img/banks/";

			if(move_uploaded_file($file_temp, $file_folder . $file_lowercase)){
				$sql = "CALL sp_add_bank (:name, :imagen)";
				$stm = $this->con->prepare($sql);
				
				foreach ($arr_bank as $key => $value) {
					$stm->bindValue($key, $value);
				}
				$stm->execute();
				return $stm->rowCount() > 0 ? "true" : "false";

			}else{
				echo "error fatal";
			}
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$add = new Add_Bank();
echo $add->add();