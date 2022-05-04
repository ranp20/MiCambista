<?php 
require_once '../../php/class/db/connection.php';
class Coupons_byIdClient extends Connection{
	function list(){
		$id = $_POST['id_client'];
		try{
			$sql = "CALL sp_list_coupons_byIdClient(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue("id_client", $id);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$coupons = new Coupons_byIdClient();
echo $coupons->list();