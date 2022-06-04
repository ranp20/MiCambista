<?php 
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])){
  if($_SESSION['cli_sessmemopay'][0]['complete_account'] <= 16){
    header("Location: complete-register");
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Memopay | Registro </title>
  <?php require_once 'includes/header_links.php'; ?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="cAccount">
    <div class="msgAlertLogin" id="msgAlertLogin"></div>
    <div class="cAccount__cont">
      <div class="cAccount__cont--fAccount box">
        <div class="cAccount__cont--fAccount--cTitle">
          <h2 class="cAccount__cont--fAccount--cTitle--title">¡Bienvenido a Memopay!</h2>
          <p class="cAccount__cont--fAccount--cTitle--desc">Registrate y realiza tus operaciones </br> de forma segura desde nuestra plataforma digital.</p>
        </div>
        <form method="POST" class="cAccount__cont--fAccount--form" id="frm-accountRegCli">
          <div class="cAccount__cont--fAccount--form--controls">
            <div class="cAccount__cont--fAccount--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--email"><path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/></svg>
            </div>
            <input type="email" name="email-instkreg" id="email-instkreg" class="cAccount__cont--fAccount--form--controls--input" placeholder="Correo electrónico" required>
            <span id="errorNounEmailAcc"></span>
          </div>
          <div class="cAccount__cont--fAccount--form--controls--g-Listprefix">
            <div class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect">
              <div class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect--cflagIcon">
                <div class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect--cflagIcon__cIcon" id="flag--numbercountryselect">
                  <img src="./views/assets/img/Peru.jpg" alt="flag-icon-sel" id="1" width="100" height="100">
                </div>
                <ul class="list-prefixtocountryflags__m" id="list-prefixtocountryflags"></ul>
              </div>
              <div class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect--cIcon">
                <svg class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect--cIcon--arrowbottom" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1.08298L5 5L9 1" stroke="#ff7800" stroke-width="1.25727" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div class="cAccount__cont--fAccount--form--controls--g-Listprefix--fakeselect--cIptFkPrefix">
                <span id="iptcountryPrefixSel">+ 51</span>
              </div>
            </div>
            <input type="text" name="telephone-instkreg" id="telephone-instkreg" value="" maxlength="11" data-valformat=withspacesforthreenumbers class="cAccount__cont--fAccount--form--controls--g-Listprefix--input" required placeholder="Teléfono">
            <span id="errorNounTelephoneAcc"></span>
          </div>
          <div class="cAccount__cont--fAccount--form--controls">
            <div class="cAccount__cont--fAccount--form--controls--cIcon" id="icon-firstPassControl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--pass"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z" /></svg>
            </div>
            <input type="password" name="pass-instkreg" id="pass-instkreg" class="cAccount__cont--fAccount--form--controls--input" placeholder="Contraseña" required>
            <span id="errorNounPasswordAcc"></span>
          </div>
          <div class="cAccount__cont--fAccount--form--controls">
            <div class="cAccount__cont--fAccount--form--controls--cIcon" id="icon-secondPassControl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--pass"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z" /></svg>
            </div>
            <input type="password" name="confirm-pass-instkreg" id="pass-repeatinstkreg" class="cAccount__cont--fAccount--form--controls--input" placeholder="Confirmar contraseña" required>
            <span class="cAccount__cont--fAccount--form--controls--spanmsgalertcm" id="msgalertinputpass"></span>
          </div>
          <!-- 
          <div class="cAccount__cont--fAccount--form--cReferedU">
            <h3 class="cAccount__cont--fAccount--form--cReferedU--title">¿Te ha referido un amigo?</h3>
            <p class="cAccount__cont--fAccount--form--cReferedU--desc">¡Ingresa su código un recibe una tasa preferencial!</p>
            <input type="text" id="code-referedUser" class="cAccount__cont--fAccount--form--cReferedU--input" placeholder="Ingresa el código de afiliados aquí">
          </div>
          -->
          <p class="cAccount__cont--fAccount--form--pprivate">Al crear tu cuenta estás aceptando nuestros 
            <a href="terminos-y-condiciones" target="_blank">Terminos y condiciones</a> y <a href="politicas-de-privacidad" target="_blank">Política de privacidad</a>
          </p>
          <div class="cAccount__cont--fAccount--form--cBtnsActions">
            <button class="cAccount__cont--fAccount--form--cBtnsActions--btnRegister" id="btn-register" type="submit">Crear Cuenta</button>
            <p class="cAccount__cont--fAccount--form--cBtnsActions--redirectText">¿Ya posees una cuenta? 
              <a href="signin">Inicia Sesión</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/add-client.js"></script>
</body>
</html>