<?php
require_once '../../php/class/db/connection.php';
class Tranfer_Banks extends Connection{
	function list(){
		try{
			$sql = "SELECT tabp.id as 'id', tabp.name as 'name', tabp.ruc as 'ruc', tabp.id_type_account as 'id_type_account', ta.type as 'tipo', tabp.n_account as 'n_account', tabp.photo as 'photo', tcurr.id as 'idcurr', tcurr.name as 'moneda', tcurr.prefix as 'prefix' FROM tbl_accounts_bank_platform tabp INNER JOIN tbl_currency tcurr ON tcurr.id = tabp.id_currency 
				INNER JOIN tbl_type_account_bank ta ON ta.id = tabp.id_type_account ORDER BY tabp.id DESC";

			if(isset($_POST['searchList'])){
				//$search = $this->con->real_escape_string($_POST['searchList']);
				$search = addslashes($_POST['searchList']);
				$sql = "SELECT tabp.id as 'id', tabp.name as 'name', tabp.ruc as 'ruc', tabp.id_type_account as 'id_type_account', ta.type as 'tipo', tabp.n_account as 'n_account', tabp.photo as 'photo', tcurr.id as 'idcurr', tcurr.name as 'moneda', tcurr.prefix as 'prefix' FROM tbl_accounts_bank_platform tabp INNER JOIN tbl_currency tcurr ON tcurr.id = tabp.id_currency 
				INNER JOIN tbl_type_account_bank ta ON ta.id = tabp.id_type_account 
								WHERE tabp.id LIKE '%".$search."%' OR
											tabp.name LIKE '%".$search."%' OR
											tabp.ruc LIKE '%".$search."%' OR
											ta.type LIKE '%".$search."%' OR
											tabp.n_account LIKE '%".$search."%' OR
											tcurr.name LIKE '%".$search."%' OR
											tcurr.prefix LIKE '%".$search."%' OR
											photo LIKE '%".$search."%'
								ORDER BY id DESC";
			}

			$stm = $this->con->query($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$transferbanks = new Tranfer_Banks();
echo $transferbanks->list();