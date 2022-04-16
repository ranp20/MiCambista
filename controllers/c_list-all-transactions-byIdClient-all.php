<?php 
require_once '../php/class/db/connection.php';
class List_All_Transactions extends Connection{
	function list(){
		
		$id = $_POST['id_client'];
		$res = [];
		$result = [];
		$output = [];
		$count = 0;
		try{
			$sql = "CALL sp_list_transactions_byIdClient_all(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($data as $key => $value){
				$result['data'][] = array_map("utf8_encode",$value);
				/*
				$id = $value['id'];
				$codigo = $value['codigo'];
				$estado = $value['estado'];
				$fecha = $value['fecha'];
				$prefijorequest = $value['prefijorequest'];
				$solicitado = $value['solicitado'];
				array_push($res, [
					$id,
					$estado,
					$codigo,
					$fecha,
					$prefijorequest,
					$solicitado
				]);
				*/	
			}
			
			/*
			foreach ($res as $key => $value) {
				$result['data'][] = $value;
			}
			
			echo "<pre>";
			print_r($res);
			echo "</pre>";
			exit();
			*/
			
			/*
			while ($count < count($res)){
				$result['data'][$key] = $res[$count][0];
				$count++;
			}
			echo "<pre>";
			print_r($result);
			echo "</pre>";
			exit();
			*/
			
			$output = json_encode($result);
			echo $output;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new List_All_Transactions();
echo $transaction->list();