<?php 
require_once 'db/connection.php';
class Rates extends Connection{
	
	private $table = "tbl_rates";

	function __construct(){
		parent::__construct();
	}
	// -------------- LISTAR - USERS
	function get_maximum_convert_divise(){
		try{
			$sql = "CALL sp_list_rates_mxammount_convertdivise()";
			$stm = $this->con->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}