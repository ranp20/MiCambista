<?php 
require_once '../php/class/db/connection.php';
class Complete_RegClient extends Connection{
	function update($arr_upregister){
		try{
			$sql = "CALL sp_update_complete_register(:name, :lastname, :n_document, :sex, :id_type_document, :id_type_sex, :complete_account, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_upregister as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";
		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}