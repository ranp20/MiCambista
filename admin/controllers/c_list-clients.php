<?php 

require_once '../../php/class/connection.php';

class Clients extends Connection{

	function list(){

		try{
			$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex' FROM tbl_client c
 							INNER JOIN tbl_type_document td ON td.id = c.id_type_document ORDER BY c.id DESC";

			if(isset($_POST['searchList'])){
				//$search = $this->con->real_escape_string($_POST['searchList']);
				$search = addslashes($_POST['searchList']);
				$sql = "SELECT c.id, c.email, c.telephone, c.name, c.lastname, td.type as 'type', c.n_document as 'document', c.t_sex as 'sex' FROM tbl_client c
 							INNER JOIN tbl_type_document td ON td.id = c.id_type_document 
								WHERE c.id LIKE '%".$search."%' OR
											c.email LIKE '%".$search."%' OR
											c.password LIKE '%".$search."%' OR
											c.name LIKE '%".$search."%' OR
											c.lastname LIKE '%".$search."%' OR
											td.type LIKE '%".$search."%' OR
											c.n_document LIKE '%".$search."%' OR
											c.t_sex LIKE '%".$search."%'
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

$clients = new Clients();
echo $clients->list();