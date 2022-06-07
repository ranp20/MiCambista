<?php 
require_once 'db/connection.php';
class Client extends Connection{
	
	private $table = "tbl_client";

	function __construct(){
		parent::__construct();
	}
	// -------------- LISTAR - USERS
	function get_data(){
		try{
			$sql = "SELECT * FROM {$this->table}";
			$stm = $this->con->query($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- OBTENER USUARIO POR ID
	function get_data_by_id($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id = :id";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	// -------------- VALIDAR EL USUARIO
  function verify_email($email){
    try{
      $sql = "SELECT * FROM {$this->table} WHERE email = :email";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':email', $email);
      $stm->execute();
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOEXception $e){
      return $e->getMessage();
    }
  }
  // -------------- OBTENER DATOS A PARTIR DEL EMAIL
  function get_clients($email){
  	try{
      $sql = "SELECT * FROM {$this->table} WHERE email = :email";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':email', $email);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOEXception $e){
      return $e->getMessage();
    }
  }
  // -------------- OBTENER DATOS DE EMPRESA LUEGO DE AGREGAR UNA NUEVA
  function get_enterprise_data($id_client){
  	try{
			$sql = "CALL sp_list_after_add_profile_enterprise(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- OBTENER DATOS DE EMPRESA LUEGO DE ELIMINAR UNA NUEVA
  function get_enterprise_data_before_delete($id_client){
  	try{
			$sql = "CALL sp_list_after_delete_profile_enterprise(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- ACTUALIZAR LOS MULTIPLES PERFILES
  function update_multiple_profiles($id_client){
  	try{
			$sql = "CALL sp_update_multiple_profiles_client(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- ACTUALIZAR MULTIPLES PERFILES
  function update_client_multiprofiles($id_client){
  	try{
			$sql = "CALL sp_update_multiple_profiles(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- ELIMINAR PERFIL DE EMPRESA
  function delete_multiprofiles_enterprise($arr_multiprofiles){
  	try{
			$sql = "CALL sp_delete_multiple_profiles(:_token, :id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_multiprofiles as $key => $value){
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- OBTENER EL ESTADO ACTUAL DE LA VALIDACIÓN DE DATOS BIOMÉTRICOS
  function get_status_biometric_validation($id_client){
  	try{
			$sql = "CALL sp_status_biometric_validation(:id_client)";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- ACTUALIZAR PERSONA POLÍTICAMENTE EXPUESTA
  function update_politically_exposed($arr_update){
  	try{
			$sql = "CALL sp_update_politically_exposed(:politically_exposed,:id_client)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_update as $key => $value){
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? 'true' : 'false';
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- AGREGAR CUENTA DE BANCO EN DÓLARES
  function add_bank_accounts_dollars($arr_accountsdollars){
  	try{
			$sql = "CALL sp_add_account_bank_dolares(:id_client, :id_bank, :n_account, :a_account, :id_type_account, :id_currency)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_accountsdollars as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$res = $stm->fetch(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- AGREGAR CUENTA DE BANCO EN SOLES
  function add_bank_accounts_soles($arr_accountssoles){
  	try{
			$sql = "CALL sp_add_account_bank_soles(:id_client, :id_bank, :n_account, :a_account, :id_type_account, :id_currency)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_accountssoles as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$res = $stm->fetch(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- DEVOLVER EL TOTAL DE CUENTAS EN DÓLARES
  function count_total_accounts_dollars($id_client){
  	try{
			$sql = "SELECT COUNT(*) as 'total' FROM tbl_client_account_bank WHERE id_currency = 1 AND id_client = :id_client LIMIT 1";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$res = $stm->fetch(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
  // -------------- DEVOLVER EL TOTAL DE CUENTAS EN SOLES
  function count_total_accounts_soles($id_client){
  	try{
			$sql = "SELECT COUNT(*) as 'total' FROM tbl_client_account_bank WHERE id_currency = 2 AND id_client = :id_client LIMIT 1";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":id_client", $id_client);
			$stm->execute();
			$res = $stm->fetch(PDO::FETCH_ASSOC);
			return $res;
		}catch(PDOException $err){
			return $err->getMessage();
		}
  }
}