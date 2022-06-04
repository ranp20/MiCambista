<?php 
session_start();
unset($_SESSION["cli_sessmemopay"]);
header('location: ./');