<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
require_once '../php/process_session_complete_register.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Memopay | Recuperar contraseña </title>
    <?php require_once 'includes/header_links.php'; ?>
</head>
<body>
  <div class="cRecovpass">
    <div class="cRecovpass__cont">
      <div class="cRecovpass__cont--fAccount box">
        <div class="cRecovpass__cont--fAccount--cTitle">
          <h3 class="cRecovpass__cont--fAccount--cTitle--title">Tranquilo, lo solucionaremos</h3>
          <p class="cRecovpass__cont--fAccount--cTitle--desc">Ingresa tu correo electrónico y te enviaremos un link para generar una nueva contraseña.</p>
        </div>
        <form method="POST" class="cRecovpass__cont--fAccount--form" id="Recovpass-PInstakash">
          <div class="cRecovpass__cont--fAccount--form--controls">
            <div class="cRecovpass__cont--fAccount--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  class="cRecovpass__cont--fAccount--form--controls--cIcon--email">
                  <path
                      d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z" />
              </svg>
            </div>
            <input type="email" name="email-instkreg" id="email-instkreg" class="cRecovpass__cont--fAccount--form--controls--input" placeholder="Correo electrónico">
          </div>
          <div class="cRecovpass__cont--fAccount--form--cBtnsActions">
            <button class="cRecovpass__cont--fAccount--form--cBtnsActions--btnRegister" id="btn-recoverpass">Reiniciar contraseña</button>
            <p class="cRecovpass__cont--fAccount--form--cBtnsActions--redirectText">¿Ya la recordaste? <a href="signin">Inicia Sesión</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>