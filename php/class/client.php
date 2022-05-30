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
}