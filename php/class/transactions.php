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
	// -------------- LISTAR - VALIDAR SI EL CUPÓN INSERTADO LE CORRESPONDE AL USUARIO
	function update_transaction_to_cancel($arr_updtransacwithnope){
		try{
			$sql = "CALL sp_update_transaction_to_cancel(:n_operation, :code_order, :id_transaction, :id_client)";
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
	// -------------- AGREGAR NUEVO TRANSACCIÓN
	function add_transaction($arr_addtransac){
		try{
			$sql = "CALL sp_add_transactions(:code_reg, :code_order, :id_client, :id_transfer_bank, :id_account_bank, :type_send, :prefix_send, :amount_send, :type_received, :prefix_received, :amount_received, :tasa_change, :status_send)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_addtransac as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- LISTAR LA INFORMACIÓN DE ACUERDO AL CÓDIGO DE TRANSACCIÓN
	function get_transaction_by_codes($arr_listbycodes){
		try{
			$sql = "CALL sp_list_transaction_by_codes(:code_reg, :code_order, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_listbycodes as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$res = $stm->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}