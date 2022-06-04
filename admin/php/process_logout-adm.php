<?php 
session_start();
unset($_SESSION["admin_sessmemopay"]);
// CONFIGURACIÓN - LOCALHOST
header('location: ../');
// CONFIGURACIÓN - SERVIDOR
/*
header('location: ../../admin');
*/