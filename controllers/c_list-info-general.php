<?php
require_once '../php/class/db/connection.php';
class List_infoGeneralbyIdClient extends Connection{
	function list(){
		$id = $_POST['id_client'];
		try{
			$sql = "CALL sp_list_info_general(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$info_general = new List_infoGeneralbyIdClient();
echo $info_general->list();