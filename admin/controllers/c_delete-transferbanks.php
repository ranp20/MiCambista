<?php 
require_once '../../php/class/db/connection.php';
class Delete extends Connection{
	function delete_transferbank(){
		$id = $_POST['id'];
		try{
			$sql = "DELETE FROM tbl_accounts_bank_platform WHERE id = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$delete = new Delete();
echo $delete->delete_transferbank();