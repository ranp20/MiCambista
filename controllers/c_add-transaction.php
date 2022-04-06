<?php
function genId() {
	$format = 'xxxxxxxxxxxxxxxxxy';
  return preg_replace_callback('/[xy]/', function($match) {
    $pattern = '1234567890';
    if($match[0] === 'x'){
      return substr($pattern, mt_rand(0, strlen($pattern)), 1);
    }else{
      return substr(date('y'), -2);
    }
  }, "E-".$format);
}
require_once 'c_list-random-codegen.php';
require_once '../php/class/db/connection.php';
class Add_Transactions extends Connection{
	function add(){

		$codgen_auto = new List_random_codegen();
		$random_codegenauto = $codgen_auto->list();

		$arr_addtransac = [
			"code_reg" => $random_codegenauto[0]['res'],
			"code_order" => genId(),
			"id_client" => $_POST['id_client'],
			"id_transfer_bank" => $_POST['id_bank'],
			"id_account_bank" => $_POST['id_account_bank'],
			"type_send" => $_POST['type_send'],
			"prefix_send" => $_POST['prefix_send'],
			"amount_send" => $_POST['amount_send'],
			"type_received" => $_POST['type_received'],
			"prefix_received" => $_POST['prefix_received'],
			"amount_received" => $_POST['amount_received'],
			"tasa_change" => $_POST['tasa_change'],
		];

		try{
			$sql = "CALL sp_add_transactions(:code_reg, :code_order, :id_client, :id_transfer_bank, :id_account_bank, :type_send, :prefix_send, :amount_send, :type_received, :prefix_received, :amount_received, :tasa_change)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_addtransac as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			$data = $stm->fetch(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
			//return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new Add_Transactions();
echo $transaction->add();