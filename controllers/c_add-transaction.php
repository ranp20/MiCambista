<?php 

function genId() {
	$format = 'xxxxxxxxxxxxxxxxxy';

  return preg_replace_callback('/[xy]/', function($match) {
    $pattern = '1234567890';
 
    if ($match[0] === 'x') {
      return substr($pattern, mt_rand(0, strlen($pattern)), 1);
    } else {
      return substr(date('y'), -2);
    }
  }, "E-".$format);
}

require_once '../php/class/connection.php';
class Add_Transactions extends Connection{
	function add(){

		$arr_addtransac = [
			"id_client" => $_POST['id_client'],
			"id_transferbank" => $_POST['id_bank'],
			"id_account_bank" => $_POST['id_account_bank'],
			"type_send" => $_POST['type_send'],
			"prefix_send" => $_POST['prefix_send'],
			"amount_send" => $_POST['amount_send'],
			"type_received" => $_POST['type_received'],
			"prefix_received" => $_POST['prefix_received'],
			"amount_received" => $_POST['amount_received'],
			"tasa_change" => $_POST['tasa_change'],
			"code_pedido" => genId(),
		];

		try{
			$sql = "CALL sp_add_transactions(:id_client, :id_transferbank, :id_account_bank, :type_send, :prefix_send, :amount_send, :type_received, :prefix_received, :amount_received, :tasa_change, :code_pedido)";
			$stm = $this->con->prepare($sql);
			foreach ($arr_addtransac as $key => $value) {
				$stm->bindValue($key, $value);
			}
			$stm->execute();
			return $stm->rowCount() > 0 ? "true" : "false";

		}catch(PDOException $err){
			return $err->getMessage();
		}
	}
}
$transaction = new Add_Transactions();
echo $transaction->add();