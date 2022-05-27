<?php
session_start();
if(isset($_SESSION['cli_micambista'][0]['profile_type']) && !empty($_SESSION['cli_micambista'][0]['profile_type']) && 
	 isset($_SESSION['cli_micambista'][0]['profile_name']) && !empty($_SESSION['cli_micambista'][0]['profile_name'])){
	unset($_SESSION['cli_micambista'][0]['profile_type']);
	unset($_SESSION['cli_micambista'][0]['profile_name']);
	header("Location: select-profile");
}else{
	header("Location: ./");
}