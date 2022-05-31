<?php 
require_once 'db/connection.php';
class Transactions extends Connection{
	
	private $table = "tbl_transactions";

	function __construct(){
		parent::__construct();
	}
	// -------------- LISTAR - VALIDAR SI EL CUPÓN INSERTADO LE CORRESPONDE AL USUARIO
	function update_transaction_with_noperation($arr_updtransacwithnope){
		try{
			$sql = "CALL sp_update_transaction_with_noperation(:n_operation, :code_order, :id_transaction, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_updtransacwithnope as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}