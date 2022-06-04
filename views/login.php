<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
//require_once '../php/process_session_complete_register.php';
require_once '../php/class/settings.php';
$call_config = new Settings_all();
$g_setting = $call_config->get_config();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mi Cambista | Login </title>
  <?php require_once 'includes/header_links.php'; ?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="cLogin">
    <div class="msgAlertLogin" id="msgAlertLogin"></div>
    <div class="cLogin__cont">
      <!-- 
      <div class="cLogin__cont--imgbanner">
        <img src="" alt="">
      </div>
       -->
      <div class="cLogin__cont--fLogin box">
        <!-- 
        <div class="cLogin__cont--fLogin--cLogo">
          <img src="<?= $url_adm_assets; ?>views/assets/img/logos/logo_principal/Memopay_logo.png" alt="logo_MiCambista" width="100" height="100" decoding="async">
        </div>
        -->
        <div class="cLogin__cont--fLogin--cTitle">
          <div class="cLogin__cont--fLogin--cTitle--cLogo">
            <img src="<?= $url_adm_assets; ?>views/assets/img/logos/logo_principal/Memopay_logo.png" alt="logo_MiCambista" width="100" height="100" decoding="async">
          </div>
          <p class="cLogin__cont--fLogin--cTitle--desc">Gana siempre con nosotros.</br>Mejores tasas, mayor ahorro.</p>
        </div>
        <form method="POST" class="cLogin__cont--fLogin--form" id="Login-PInstakash">
          <div class="cLogin__cont--fLogin--form--controls">
            <div class="cLogin__cont--fLogin--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cLogin__cont--fLogin--form--controls--cIcon--email"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg>
            </div>
            <input type="email" id="email-instk" name="u-email" class="cLogin__cont--fLogin--form--controls--input" placeholder="Correo electrónico" autocomplete='off' spellcheck='false' required>
          </div>
          <div class="cLogin__cont--fLogin--form--controls">
            <div class="cLogin__cont--fLogin--form--controls--cIcon" id="icon-loginPassControl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cLogin__cont--fLogin--form--controls--cIcon--pass"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/></svg>
            </div>
            <input type="password" id="pass-instk" name="u-password" class="cLogin__cont--fLogin--form--controls--input" placeholder="Contraseña" autocomplete='off' spellcheck='false' required>
          </div>
          <div class="cLogin__cont--fLogin--form--cBtnsActions">
            <a href="recover-password" class="cLogin__cont--fLogin--form--cBtnsActions--recovPass">¿Olvidaste tu contraseña?</a>
            <button class="cLogin__cont--fLogin--form--cBtnsActions--btnLogin" id="btn-loginCliMiCambista" type="submit">Ingresar</button>
            <!-- 
            <a href="javascript:void(0);" id="btnLognWithGoogleAuth" class="cLogin__cont--fLogin--form--cBtnsActions--btnLoginWithGoogle">
              <span class="cLogin__cont--fLogin--form--cBtnsActions--btnLoginWithGoogle__cIcon">
                <img src="<?= $url; ?>views/assets/img/svg/google_icon-Instakash.svg" alt="logo_google">
              </span>
              <span class="cLogin__cont--fLogin--form--cBtnsActions--btnLoginWithGoogle__cTxt">
                <span>Acceder con Google</span>
              </span>
            </a>
             -->
            <p class="cLogin__cont--fLogin--form--cBtnsActions--btnAccount">¿Eres nuevo en Mi Cambista?<a href="signup" class="cLogin__cont--fLogin--form--cBtnsActions--btnAccount--link">Regístrate</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?= $url ?>views/js/actions_pages/login.js"></script>
</body>
</html>