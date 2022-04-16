<?php 
	class Connection{

		// CONFIGURACIÓN - SERVIDOR
		/*
		protected $con = null;
		private $host = "158.106.132.103";
		private $dbname = "micambis_db_micambista";
		private $username = "micambis_use_micambista";
		private $password = "D^_~M)O%[K&#";
		private $charset = "utf8";
		*/

		// CONFIGURACIÓN - LOCALHOST
		protected $con = null;
		private $host = "localhost";
		private $dbname = "db_micambista";
		private $username = "root";
		private $password = "";
		private $charset = "utf8";

		public function __construct(){
			try{

				$this->con = new PDO("mysql:host={$this->host}; dbname={$this->dbname}; charset={$this->charset}", $this->username, $this->password);
				$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}catch(PDOException $err){
				echo "Error al conectar con la base de datos: ".$this->$dbname;
				die($err->getMessage());
			}
		}
		public function close(){
			if($this->con != null) $this->con = null;
		}
	}