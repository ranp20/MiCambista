<?php 
require_once 'db/connection.php';
class Coupon extends Connection{
	
	private $table = "tbl_coupon";
	private $table_two = "tbl_idcoupon_client";

	function __construct(){
		parent::__construct();
	}
	// -------------- LISTAR - VALIDAR SI EL CUPÓN INSERTADO LE CORRESPONDE AL USUARIO
	function get_check_coupon_client($arr_chckcoupon){
		try{
			$sql = "CALL sp_list_check_coupon_with_attach(:code_coupon, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_chckcoupon as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- LISTAR - CUPONES
	function get_coupons(){
		try{
			$sql = "SELECT id, code_coupon FROM {$this->table} ORDER BY id DESC";
			$stm = $this->con->query($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- LISTAR - CUPONES
	function get_coupons_by_idclient($id_client){
		try{
			$sql = "CALL sp_list_id_coupon_byidclient(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}