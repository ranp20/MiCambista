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
			$sql = "CALL sp_update_transaction_to_cancel(:code_order, :id_transaction, :id_client)";
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
	// -------------- TIMER PARA CANCELAR LA OPERACIÓN
	function event_update_status_transaction($idtrans, $idclient, $timer){
		try{
      /* SERVIDOR - ACTIVANDO LOS EVENTOS */
      /*
      $sql = "
      CREATE EVENT evt_updateStatusTrans_idtrans_{$idtrans}
      ON SCHEDULE
      AT CURRENT_TIMESTAMP + INTERVAL {$timer} MINUTE
      ON COMPLETION NOT PRESERVE
      ENABLE
      DO BEGIN
      	DECLARE regtrans CHAR(15);
      	SET regtrans = (SELECT status_send FROM tbl_transactions WHERE id = {$idtrans} AND id_client = {$idclient} LIMIT 1);
      	IF(regtrans = 'Pending') THEN
        	UPDATE tbl_transactions SET status_send = 'Cancel' WHERE id = {$idtrans} AND id_client = {$idclient} LIMIT 1;
        END IF;
      END";
      */
      /* LOCALHOST - SI NO SE ACTIVAN LOS EVENTOS */
      $sql = "SET GLOBAL event_scheduler = ON;
      CREATE EVENT evt_updateStatusTrans_idtrans_{$idtrans}
      ON SCHEDULE
      AT CURRENT_TIMESTAMP + INTERVAL {$timer} MINUTE
      ON COMPLETION NOT PRESERVE
      ENABLE
      DO BEGIN
      	DECLARE regtrans CHAR(15);
      	SET regtrans = (SELECT status_send FROM tbl_transactions WHERE id = {$idtrans} AND id_client = {$idclient} LIMIT 1);
      	IF(regtrans = 'Pending') THEN
        	UPDATE tbl_transactions SET status_send = 'Cancel' WHERE id = {$idtrans} AND id_client = {$idclient} LIMIT 1;
        END IF;
      END";

			$stm = $this->con->query($sql);
			$stm->execute();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}