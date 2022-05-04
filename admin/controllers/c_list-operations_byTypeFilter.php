<?php 
require_once '../../php/class/db/connection.php';
class FilterOperation_byOption extends Connection{
	function list(){
		$option = $_POST['option'];
		$res = [];
		$output = [];
		try{
			$sql = "CALL sp_list_operations_byOptionFilter(:option)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue("option", $option);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			foreach ($data as $key => $value){
				$res['data'][] = array_map("utf8_encode",$value);	
			}
			$output = json_encode($res);
			echo $output;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$filterope = new FilterOperation_byOption();
echo $filterope->list();