<?php 
session_start();
if(isset($_SESSION['cli_micambista'])){
	header("Location: control-panel");
}