<?php 
require_once '../php/class/db/connection.php';
class List_All_Transactions extends Connection{
	function list(){
		
		$id = $_POST['id_client'];
		$res = [];
		$result = [];
		$count = 0;
		try{
			$sql = "CALL sp_list_transactions_byIdClient_all(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($data as $key => $value){
				//$res['data'] = array_map("utf8_encode",$value);
				$res['data'][] = array_map("utf8_encode",$value);
				//echo $value['codigo'];
				//$res['data'][$key] = $value;
				/*
				$estado = $value['estado'];
				$codigo = $value['codigo'];
				$fecha = $value['fecha'];
				$prefijorequest = $value['prefijorequest'];
				$solicitado = $value['solicitado'];
				array_push($res, [
					$estado,
					$codigo,
					$fecha,
					$prefijorequest,
					$solicitado					
				]);
				*/
			}
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
			
			$result = json_encode($res);
			echo $result;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new List_All_Transactions();
echo $transaction->list();