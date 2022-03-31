<?php 
  require_once '../php/process_session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mi Cambista | Login </title>
  <?php require_once 'includes/header_links.php'; ?>
</head>
<body>
  <div class="cLogin">
    <div class="msgAlertLogin" id="msgAlertLogin"></div>
    <div class="cLogin__cont">
      <div class="cLogin__cont--imgbanner">
        <img src="" alt="">
      </div>
      <div class="cLogin__cont--fLogin box">
        <div class="cLogin__cont--fLogin--cTitle">
          <h2 class="cLogin__cont--fLogin--cTitle--title">Mi Cambista</h2>
          <p class="cLogin__cont--fLogin--cTitle--desc">Gana siempre con nosotros.</br>Mejores tasas, mayor ahorro.</p>
        </div>
        <form method="POST" class="cLogin__cont--fLogin--form" id="Login-PInstakash">
          <div class="cLogin__cont--fLogin--form--controls">
            <div class="cLogin__cont--fLogin--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  class="cLogin__cont--fLogin--form--controls--cIcon--email">
                  <path
                      d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z" />
              </svg>
            </div>
            <input type="email" id="email-instk" name="u-email" class="cLogin__cont--fLogin--form--controls--input" placeholder="Correo electrónico">
          </div>
          <div class="cLogin__cont--fLogin--form--controls">
            <div class="cLogin__cont--fLogin--form--controls--cIcon" id="icon-loginPassControl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  class="cLogin__cont--fLogin--form--controls--cIcon--pass">
                  <path
                      d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z" />
              </svg>
            </div>
            <input type="password" id="pass-instk" name="u-password" class="cLogin__cont--fLogin--form--controls--input" placeholder="Contraseña">
          </div>
          <div class="cLogin__cont--fLogin--form--cBtnsActions">
            <a href="recover-password" class="cLogin__cont--fLogin--form--cBtnsActions--recovPass">¿Olvidaste tu contraseña?</a>
            <button class="cLogin__cont--fLogin--form--cBtnsActions--btnLogin" id="btn-loginCliMiCambista" type="submit">Ingresar</button>
            <a href="#" id="btnLognWithGoogleAuth" class="cLogin__cont--fLogin--form--cBtnsActions--btnLoginWithGoogle">
                <img src="<?= $url ?>views/assets/img/svg/google_icon-Instakash.svg" alt="logo_google">Acceder con Google</a>
            <p class="cLogin__cont--fLogin--form--cBtnsActions--btnAccount">¿Eres nuevo en Instakash?<a href="signup" class="cLogin__cont--fLogin--form--cBtnsActions--btnAccount--link">Regístrate</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= $url ?>views/js/actions_pages/login.js"></script>
</body>
</html>