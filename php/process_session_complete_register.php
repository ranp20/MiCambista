<?php 
session_start();
if(isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])){
	if($_SESSION['cli_sessmemopay'][0]['complete_account'] <= 16){
		header("Location: complete-register");
	}else{
		header("Location: welcome");
	}
}