<?php 
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])){
  if($_SESSION['cli_sessmemopay'][0]['complete_account'] <= 16){
    header("Location: complete-register");
  }
}
$themeClass = '';
$themeClassBtn = '';
if(!empty($_COOKIE['prjMemopay-theme'])){
	if($_COOKIE['prjMemopay-theme'] == 'dark'){
		$themeClass = 'dark-theme';
		$themeClassBtn = 'checked';
	}else if($_COOKIE['prjMemopay-theme'] == 'light'){
		$themeClass = 'light-theme';
		$themeClassBtn = '';
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
<body class="<?= $themeClass;?>">
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
            <input type="password" name="pass-instkreg" id="pass-instkreg" class="cAccount__cont--fAccount--form--controls--input" autocomplete="false" placeholder="Contraseña" required>
            <span id="errorNounPasswordAcc"></span>
          </div>
          <div class="cAccount__cont--fAccount--form--controls">
            <div class="cAccount__cont--fAccount--form--controls--cIcon" id="icon-secondPassControl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="cAccount__cont--fAccount--form--controls--cIcon--pass"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z" /></svg>
            </div>
            <input type="password" name="confirm-pass-instkreg" id="pass-repeatinstkreg" class="cAccount__cont--fAccount--form--controls--input" autocomplete="false" placeholder="Confirmar contraseña" required>
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
  <div class="cSwitchTgg__scheme">
		<input type="checkbox" id="darkmode-toggle" <?= $themeClassBtn;?>/>
		<label for="darkmode-toggle">
		   <svg xmlns="http://www.w3.org/2000/svg" class="sun" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m600.82 292.86c-7.0898 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852h10.633c7.1055 0 12.852 5.7617 12.852 12.852 0 7.1055-5.7617 12.852-12.852 12.852zm-250.83-105.59c-7.1055 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852 32.691 0 62.312 13.254 83.75 34.691s34.691 51.055 34.691 83.75c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852 0-25.602-10.383-48.789-27.164-65.57-16.785-16.785-39.969-27.164-65.57-27.164zm-181.41 255.95c5.0234-5.0234 13.156-5.0234 18.18 0 5.0234 5.0234 5.0234 13.156 0 18.18l-33.414 33.434c-5.0234 5.0234-13.156 5.0234-18.18 0-5.0234-5.0234-5.0234-13.156 0-18.18l33.434-33.434zm344.66 18.18c-5.0234-5.0234-5.0234-13.156 0-18.18s13.156-5.0234 18.18 0l33.434 33.434c5.0234 5.0234 5.0234 13.156 0 18.18-5.0234 5.0234-13.156 5.0234-18.18 0zm18.18-344.66c-5.0234 5.0234-13.156 5.0234-18.18 0-5.0234-5.0234-5.0234-13.156 0-18.18l33.434-33.434c5.0234-5.0234 13.156-5.0234 18.18 0 5.0234 5.0234 5.0234 13.156 0 18.18l-33.434 33.414zm-344.66-18.18c5.0234 5.0234 5.0234 13.156 0 18.18-5.0234 5.0234-13.156 5.0234-18.18 0l-33.434-33.414c-5.0234-5.0234-5.0234-13.156 0-18.18 5.0234-5.0234 13.156-5.0234 18.18 0l33.414 33.434zm176.1-69.402c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852v-10.617c0-7.1055 5.7617-12.852 12.852-12.852s12.852 5.7617 12.852 12.852zm-12.852 54.062c54.332 0 103.52 22.023 139.12 57.625 35.617 35.617 57.641 84.809 57.641 139.14s-22.023 103.52-57.641 139.14c-35.598 35.598-84.809 57.625-139.12 57.625-54.332 0-103.52-22.023-139.14-57.641-35.598-35.598-57.625-84.789-57.625-139.12 0-54.332 22.023-103.52 57.625-139.14 35.617-35.598 84.809-57.625 139.14-57.625zm120.96 75.82c-30.961-30.961-73.719-50.098-120.96-50.098-47.242 0-90 19.137-120.96 50.098-30.961 30.961-50.098 73.719-50.098 120.96 0 47.242 19.137 90 50.098 120.96 30.961 30.945 73.719 50.098 120.96 50.098 47.227 0 90-19.152 120.96-50.098 30.945-30.961 50.098-73.719 50.098-120.96 0-47.242-19.152-90-50.098-120.96zm-371.79 108.09c7.1055 0 12.852 5.7617 12.852 12.852 0 7.1055-5.7617 12.852-12.852 12.852h-10.617c-7.1055 0-12.852-5.7617-12.852-12.852 0-7.1055 5.7617-12.852 12.852-12.852zm237.97 263.68c0-7.0898 5.7617-12.852 12.852-12.852s12.852 5.7617 12.852 12.852v10.633c0 7.1055-5.7617 12.852-12.852 12.852-7.1055 0-12.852-5.7617-12.852-12.852z"/></g></svg>
		   <svg xmlns="http://www.w3.org/2000/svg" class="moon" x="0px" y="0px" version="1.1" viewBox="0 0 700 700"><path d="m367.5 525c-150.5 0-262.5-112-262.5-262.5 0-147 108.5-245 210-245 7 0 12.25 3.5 15.75 8.75s3.5 12.25 0 17.5c-63 98-29.75 189 19.25 236.25 47.25 47.25 138.25 82.25 236.25 19.25 5.25-3.5 12.25-3.5 17.5 0s8.75 8.75 8.75 15.75c0 101.5-98 210-245 210zm-84-469c-73.5 19.25-143.5 98-143.5 206.5 0 129.5 98 227.5 227.5 227.5 108.5 0 187.25-70 206.5-143.5-98 45.5-192.5 14-248.5-42-56-54.25-87.5-150.5-42-248.5z"/></svg>
		</label>
	</div>
  <script type="text/javascript" src="<?= $url; ?>views/js/actions_pages/add-client.js"></script>
</body>
</html>