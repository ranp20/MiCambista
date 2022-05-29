<?php 
session_start();
if(isset($_SESSION['cli_micambista']) && !empty($_SESSION['cli_micambista'])){
	if($_SESSION['cli_micambista'][0]['complete_account'] <= 16){
		header("Location: complete-register");
	}else{
		header("Location: welcome");
	}
}