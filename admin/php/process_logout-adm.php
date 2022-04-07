<?php 
session_start();
unset($_SESSION["admin_micambista"]);
// CONFIGURACIÓN - LOCALHOST
header('location: ../');
// CONFIGURACIÓN - SERVIDOR
/*
header('location: ../../admin');
*/