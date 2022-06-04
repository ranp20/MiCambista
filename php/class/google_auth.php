<?php 

	class GoogleAuth{
		protected $client;

		/************************** INICIALIZAR LA VARIABLES DE CLIENTE DE GOOGLE **************************/
		function __construct(Google_Client $googleClient = null){
			$this->client = $googleClient;
			if($this->client){
				$this->client->setClientId('676491899176-dra3l98grun4kej6u8klsm4e3l61h4uh.apps.googleusercontent.com');
				$this->client->setClientSecret('w-zk1ukWR4I6zqlojhkrYsHt');
				$this->client->setRedirectUri('https://localhost/Memopay/views/control-panel.php');
				$this->client->setScopes('email');
			}
		}
		/************************** RETORNAR LA VARIBLE/ PARA VALIDACIÓN DE access_token **************************/
		function isLoggedIn(){
			return isset($_SESSION['access_token']);
		}
		/************************** PARA QUE GOOGLE NOS RETORNE EL ENLACE HACIA SU LOGUEO **************************/
		function getAuthUrl(){
			return $this->client->createAuthUrl();
		}
	}