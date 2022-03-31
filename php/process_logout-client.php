<?php 
session_start();
unset($_SESSION["cli_micambista"]);
header('location: ./');