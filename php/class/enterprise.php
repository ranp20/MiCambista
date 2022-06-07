<?php 
require_once 'db/connection.php';
class Enterprise extends Connection{
	
	private $table = "tbl_profile_enterprise_client";

	function __construct(){
		parent::__construct();
	}

	// -------------- LISTAR - PERFILES DE USUARIO POR ID
	function get_data_by_idclient($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id_client = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- AGREGAR NUEVO PERFIL DE EMPRESA
	function add_profile_client($arr_profileenterprise){
		try{
			$sql = "CALL sp_add_profile_enterprise(:_token, :ruc, :name, :address, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_profileenterprise as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$res = $stm->fetch(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}