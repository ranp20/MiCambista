<?php
class App{
  // -------------- DEVOLVER EL TOTAL DE CUENTAS EN SOLES
  function getTheme(){
  	$themeClass = '';
    $themeClassBtn = '';
    if(!empty($_COOKIE['prjMemopay-theme'])){
      if($_COOKIE['prjMemopay-theme'] == 'dark'){
        $themeClass = 'dark-theme';
        $themeClassBtn = 'checked';
      }else if($_COOKIE['theme'] == 'light'){
        $themeClass = 'light-theme';
        $themeClassBtn = '';
      }
    }
    return array(['body' => $themeClass, 'button' => $themeClassBtn]);
  }
}