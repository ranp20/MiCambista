<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(isset($_SESSION['cli_sessmemopay']) && !empty($_SESSION['cli_sessmemopay'])){
  $id_client = $_SESSION['cli_sessmemopay'][0]['id'];
  $compl_account = intval($_SESSION['cli_sessmemopay'][0]['complete_account']);
  if ($compl_account > 16) {
    header("Location: signin");
  }
}else{
  header("Location: signin");
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Memopay | Completar registro </title>
  <?php require_once 'includes/header_links.php'; ?>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="cCRegister">
    <div class="msgAlertLogin" id="msgAlertLogin"></div>
    <input type="hidden" id="val-cliid_session" value="<?= $id_client;?>">
    <div class="cCRegister__cont">
      <div class="cCRegister__cont--fCRegister box">
        <div class="cCRegister__cont--fCRegister--cTitle">
          <h2 class="cCRegister__cont--fCRegister--cTitle--title">¡Felicidades, Tu cuenta ha sido creada!</h2>
          <p class="cCRegister__cont--fCRegister--cTitle--desc">Ahora, debes completar todos tus datos.</p>
        </div>
        <form method="POST" class="cCRegister__cont--fCRegister--form" id="frm-complAccRegCli">
          <div class="cCRegister__cont--fCRegister--form--controls">
            <div class="cCRegister__cont--fCRegister--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" class="cCRegister__cont--fCRegister--form--controls--cIcon--user" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><g><path d="M7,83.445c0-4.141,1.027-7.972,3.082-11.491c2.055-3.52,4.841-6.307,8.361-8.361   c3.519-2.054,7.35-3.082,11.49-3.082h40.133c4.141,0,7.971,1.027,11.491,3.082c3.519,2.055,6.307,4.841,8.361,8.361   C91.973,75.473,93,79.304,93,83.445V93h-5.733v-9.555c0-3.122-0.772-5.996-2.317-8.624s-3.631-4.714-6.259-6.259   c-2.628-1.545-5.502-2.317-8.624-2.317H29.933c-3.122,0-5.996,0.772-8.624,2.317c-2.628,1.544-4.714,3.631-6.259,6.259   s-2.317,5.502-2.317,8.624V93H7V83.445z M38.032,50.597c-3.647-2.15-6.546-5.048-8.696-8.695c-2.15-3.647-3.225-7.636-3.225-11.968   c0-4.332,1.075-8.321,3.225-11.968c2.15-3.647,5.048-6.546,8.696-8.696C41.678,7.12,45.668,6.044,50,6.044S58.321,7.12,61.969,9.27   c3.646,2.15,6.545,5.049,8.695,8.696c2.15,3.647,3.225,7.637,3.225,11.968c0,4.332-1.074,8.321-3.225,11.968   c-2.15,3.647-5.049,6.545-8.695,8.695c-3.647,2.15-7.637,3.225-11.969,3.225S41.678,52.748,38.032,50.597z M59.102,45.652   c2.787-1.625,4.993-3.83,6.617-6.617c1.625-2.787,2.437-5.821,2.437-9.102c0-3.28-0.812-6.314-2.437-9.102   c-1.624-2.787-3.83-4.993-6.617-6.617C56.314,12.59,53.28,11.778,50,11.778c-3.281,0-6.314,0.812-9.102,2.437   c-2.788,1.624-4.993,3.83-6.617,6.617c-1.625,2.788-2.437,5.821-2.437,9.102c0,3.281,0.812,6.315,2.437,9.102   c1.624,2.788,3.83,4.993,6.617,6.617c2.787,1.625,5.82,2.437,9.102,2.437C53.28,48.089,56.314,47.277,59.102,45.652z"/></g><g display="none"><rect x="7" y="7" display="inline" stroke="#FF00FF" stroke-width="0.25" stroke-miterlimit="10" width="86" height="86"/><rect x="7" y="7" display="inline" stroke="#FF00FF" stroke-width="0.25" stroke-miterlimit="10" width="86" height="86"/></g></svg>
            </div>
            <input type="text" name="names-memopay" id="names-memopay" autocomplete="false" class="cCRegister__cont--fCRegister--form--controls--input" placeholder="Nombre(s)" required>
            <span id="msgerrorNounNamesCli"></span>
          </div>
          <div class="cCRegister__cont--fCRegister--form--controls">
            <div class="cCRegister__cont--fCRegister--form--controls--cIcon">
              <svg xmlns="http://www.w3.org/2000/svg" class="cCRegister__cont--fCRegister--form--controls--cIcon--user" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><g><path d="M7,83.445c0-4.141,1.027-7.972,3.082-11.491c2.055-3.52,4.841-6.307,8.361-8.361   c3.519-2.054,7.35-3.082,11.49-3.082h40.133c4.141,0,7.971,1.027,11.491,3.082c3.519,2.055,6.307,4.841,8.361,8.361   C91.973,75.473,93,79.304,93,83.445V93h-5.733v-9.555c0-3.122-0.772-5.996-2.317-8.624s-3.631-4.714-6.259-6.259   c-2.628-1.545-5.502-2.317-8.624-2.317H29.933c-3.122,0-5.996,0.772-8.624,2.317c-2.628,1.544-4.714,3.631-6.259,6.259   s-2.317,5.502-2.317,8.624V93H7V83.445z M38.032,50.597c-3.647-2.15-6.546-5.048-8.696-8.695c-2.15-3.647-3.225-7.636-3.225-11.968   c0-4.332,1.075-8.321,3.225-11.968c2.15-3.647,5.048-6.546,8.696-8.696C41.678,7.12,45.668,6.044,50,6.044S58.321,7.12,61.969,9.27   c3.646,2.15,6.545,5.049,8.695,8.696c2.15,3.647,3.225,7.637,3.225,11.968c0,4.332-1.074,8.321-3.225,11.968   c-2.15,3.647-5.049,6.545-8.695,8.695c-3.647,2.15-7.637,3.225-11.969,3.225S41.678,52.748,38.032,50.597z M59.102,45.652   c2.787-1.625,4.993-3.83,6.617-6.617c1.625-2.787,2.437-5.821,2.437-9.102c0-3.28-0.812-6.314-2.437-9.102   c-1.624-2.787-3.83-4.993-6.617-6.617C56.314,12.59,53.28,11.778,50,11.778c-3.281,0-6.314,0.812-9.102,2.437   c-2.788,1.624-4.993,3.83-6.617,6.617c-1.625,2.788-2.437,5.821-2.437,9.102c0,3.281,0.812,6.315,2.437,9.102   c1.624,2.788,3.83,4.993,6.617,6.617c2.787,1.625,5.82,2.437,9.102,2.437C53.28,48.089,56.314,47.277,59.102,45.652z"/></g><g display="none"><rect x="7" y="7" display="inline" stroke="#FF00FF" stroke-width="0.25" stroke-miterlimit="10" width="86" height="86"/><rect x="7" y="7" display="inline" stroke="#FF00FF" stroke-width="0.25" stroke-miterlimit="10" width="86" height="86"/></g></svg>
            </div>
            <input type="text" name="lastnames-memopay" id="lastnames-memopay" autocomplete="false" class="cCRegister__cont--fCRegister--form--controls--input" placeholder="Apellido(s)" required>
            <span id="msgerrorNounLastnamesCli"></span>
          </div>
          <div class="cCRegister__cont--fCRegister--form--controlsTwo">
            <div class="cCRegister__cont--fCRegister--form--controlsTwo--c">
              <div class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem" id="selListallTypeDocuments">
                <div class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--cInputFake" id="newValTypeDocument">
                  <span class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--cInputFake--placeholder">DNI</span>
                </div>
                <input type="text" class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--inputVal" readonly id="selListtypeDocument--input">
                <img class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--icon"src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
                <span id="msgerrorNounSelTypeAccount"></span>
                <ul class="cCRegister__cont--fCRegister--form--controlsTwo--c--cSelItem--MenuListTypeDocuments" id="listtypesDocuments"></ul>
              </div>
            </div>
            <div class="cCRegister__cont--fCRegister--form--controlsTwo--c">
              <div class="cCRegister__cont--fCRegister--form--controlsTwo--c--cIcon">
                <svg xmlns="http://www.w3.org/2000/svg" class="cCRegister__cont--fCRegister--form--controlsTwo--c--cIcon--document" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1024 1280" style="enable-background:new 0 0 1024 1024;" xml:space="preserve"><g><g><path d="M835.6,295.4c-21.7,0-43.4,0-65.2,0c-29.7,0-59.5,0-89.2,0c-2.5,0-4.9,0-7.4,0c-0.6,0-1.1,0-1.7,0    c-1.2,0-3-0.6-4.2-0.3c0.1,0,4.1,0.7,1.9,0.2c-0.9-0.2-1.8-0.3-2.7-0.5c-1.5-0.4-3-0.8-4.5-1.3c-0.6-0.2-1.3-0.5-1.9-0.7    c-2.2-0.7,1.9,0.7,1.7,0.8c-1.1,0.6-7.1-3.9-8.1-4.5c-3.1-1.9,2.6,2.4-0.1,0c-1.1-1-2.3-2-3.4-3.1c-0.9-0.9-1.8-1.9-2.7-2.9    c-0.2-0.2-1.3-1.3-1.3-1.5c0,0.3,2.4,3.5,0.8,0.9c-1.5-2.5-2.8-5-4.2-7.4c-1-1.8,0.7,1.6,0.7,1.7c0-0.5-0.5-1.4-0.7-1.9    c-0.6-1.7-1.1-3.4-1.5-5.2c-0.2-0.8-0.9-5.2-0.5-2c0.5,3.2-0.1-2.2-0.1-2.9c0-0.6,0-1.1,0-1.7c0-0.8,0-1.7,0-2.5    c0-27.1,0-54.1,0-81.2c0-25.5,0.7-51.2,0-76.7c0-0.4,0-0.9,0-1.3c-11.4,4.7-22.8,9.4-34.1,14.1c24.1,24.1,48.1,48.1,72.2,72.2    c38.4,38.4,76.8,76.8,115.2,115.2c8.9,8.9,17.7,17.7,26.6,26.6c7.4,7.4,21,8,28.3,0c7.3-8,7.9-20.4,0-28.3    c-24.1-24.1-48.1-48.1-72.2-72.2c-38.4-38.4-76.8-76.8-115.2-115.2c-8.9-8.9-17.7-17.7-26.6-26.6c-12.2-12.2-34.1-3.2-34.1,14.1    c0,22.5,0,45.1,0,67.6c0,29.6,0,59.1,0,88.7c0,16.7,3,33.4,13.2,47.1c14.5,19.5,35.9,30.5,60.3,30.6c26.5,0,53,0,79.5,0    c26.5,0,53.1,0.5,79.6,0c0.5,0,1,0,1.4,0c10.5,0,20.5-9.2,20-20C855.1,304.6,846.8,295.4,835.6,295.4z"/></g></g><g><g><path d="M815.6,315.4c0,19.4,0,38.7,0,58.1c0,45.9,0,91.8,0,137.8c0,54.2,0,108.4,0,162.7c0,44.3,0,88.5,0,132.8    c0,12.6,0,25.3,0,37.9c0,3,0,6.1,0,9.1c0,0.5,0,1,0,1.5c0,1.9-0.1,3.8-0.2,5.7c0,0.5-0.1,0.9-0.1,1.4c-0.2,1.8-0.2,1.8,0,0.1    c0.1-0.4,0.1-0.9,0.2-1.3c-0.1,0.9-0.3,1.8-0.5,2.7c-0.5,2.6-1.2,5.2-2.1,7.8c-0.3,0.8-0.6,1.7-0.9,2.5c-1.5,4.4,2.1-4,0,0.1    c-1,2-2,3.9-3.1,5.8c-0.5,0.8-2.9,5.5-3.6,5.5c0,0,3.2-3.8,0.7-1c-1,1.2-2,2.3-3,3.4c-1.3,1.4-2.7,2.8-4.2,4.1    c-0.5,0.4-2.4,2.5-3,2.5c0.7,0,3.3-2.3,0.9-0.8c-1.8,1.2-3.6,2.4-5.5,3.5c-1.1,0.7-2.3,1.3-3.5,1.9c-0.4,0.2-0.8,0.4-1.2,0.6    c-2,0.9-1.6,0.7,1.1-0.4c-0.3,0.8-5.5,1.9-6.3,2.2c-2.2,0.6-4.4,1-6.6,1.5c-4.4,1,3.5-0.3,0.6,0c-1.1,0.1-2.3,0.2-3.4,0.3    c-1.4,0.1-2.8,0.1-4.2,0.1c-0.4,0-0.9,0-1.3,0c-8.4,0-16.8,0-25.2,0c-39.9,0-79.8,0-119.7,0c-53.6,0-107.3,0-160.9,0    c-47.5,0-94.9,0-142.4,0c-20.8,0-41.6,0.2-62.4,0c-0.9,0-1.9,0-2.8-0.1c-1.4-0.1-2.8-0.2-4.1-0.3c-3.2-0.2,1.2,0.2,1.2,0.2    c-0.4,0.6-13.8-2.8-14.2-3.9c0.4,0.9,3.8,1.9,0.5,0.1c-1-0.5-2-1-2.9-1.5c-1.9-1-3.8-2.2-5.6-3.4c0.1,0.1-2.2-1.4-2.1-1.5    c0.7,0.5,1.3,1,2,1.5c-0.7-0.5-1.4-1.1-2-1.7c-1.8-1.6-3.5-3.2-5.2-5c-0.7-0.8-1.5-1.6-2.2-2.4c-0.6-0.7-1.9-3.6-0.9-1    c1.1,2.8-0.3-0.5-0.7-1.2c-0.6-0.9-1.2-1.8-1.8-2.8c-1-1.7-2-3.4-2.9-5.2c-0.2-0.4-0.4-0.8-0.6-1.2c-0.9-2-0.7-1.6,0.4,1.1    c-0.3-0.1-1.3-3.4-1.4-3.7c-0.7-2.1-1.3-4.3-1.8-6.5c-0.1-0.3-1-3.9-0.8-4c0.1,0,0.5,5.3,0.2,1.2c-0.2-2.3-0.3-4.7-0.4-7    c0-4.7,0-9.4,0-14.1c0-29.9,0-59.9,0-89.8c0-47.9,0-95.7,0-143.6c0-54.5,0-109,0-163.5c0-49.8,0-99.6,0-149.4    c0-33.8,0-67.6,0-101.3c0-7.3,0-14.7,0-22c0-0.6,0-1.2,0-1.9c0-0.1,0-0.2,0-0.3c0-1,0-1.8,0.1-2.8c0-0.9,0.1-1.9,0.2-2.8    c0.1-0.9,0.2-1.8,0.3-2.7c-0.4,2.8-0.5,3.5-0.2,1.9c1-4.2,2-8.2,3.4-12.3c1.5-4.4-2.1,4,0-0.1c0.4-0.8,0.8-1.6,1.2-2.4    c1.2-2.3,2.6-4.6,4-6.8c0.4-0.6,1.9-3.9,0.7-1.2c-1.1,2.6,0.3-0.3,0.9-1c1.4-1.7,2.9-3.2,4.5-4.7c1-0.9,3.7-4.3,4.9-4.3    c-0.7,0-3.3,2.3-0.9,0.8c1.5-0.9,2.9-2,4.4-2.8c1.9-1.1,3.9-2.1,5.8-3.1c2.7-1.4-1,0.1-1.1,0.4c0.2-0.4,2.6-1,3.1-1.2    c2.1-0.7,4.3-1.3,6.4-1.9c1.1-0.3,2.2-0.4,3.3-0.7c4.3-1-4,0.2,0.1-0.1c2.6-0.2,5.2-0.3,7.9-0.4c3.4,0,6.7,0,10.1,0    c16,0,31.9,0,47.9,0c51.3,0,102.7,0,154,0c44,0,88,0,132.1,0c7,0,14,0,21.1,0c-4.7-2-9.4-3.9-14.1-5.9    c24.1,24.1,48.1,48.1,72.2,72.2c38.4,38.4,76.8,76.8,115.2,115.2c8.9,8.9,17.7,17.7,26.6,26.6c7.4,7.4,21,8,28.3,0    c7.3-8,7.9-20.4,0-28.3c-26.8-26.8-53.6-53.6-80.4-80.4c-39.2-39.2-78.4-78.4-117.6-117.6c-4.5-4.5-9.1-9.1-13.6-13.6    c-4.8-4.8-10.2-8-17.4-8.2c-12.4-0.3-24.9,0-37.3,0c-56.4,0-112.8,0-169.2,0c-48.7,0-97.3,0-146,0c-4,0-7.9,0-11.9,0    c-18,0.1-36.3,5.3-50.9,15.8c-24.8,17.9-37.7,45.1-37.7,75.5c0,28.3,0,56.6,0,84.9c0,53.8,0,107.6,0,161.4c0,62.3,0,124.6,0,186.9    c0,53.8,0,107.6,0,161.4c0,28.3,0,56.6,0,84.9c0,30.8,13.4,58.4,38.8,76.2c17.4,12.3,37.7,15.1,58.4,15.1c39.4,0,78.8,0,118.3,0    c61.1,0,122.1,0,183.2,0c52.2,0,104.4,0,156.5,0c13.2,0,26.4,0,39.5,0c2.7,0,5.4,0.1,8.1-0.1c24.7-1,49-12.2,64.6-31.6    c13.1-16.3,20.4-35.6,20.6-56.6c0-2.5,0-4.9,0-7.4c0-14.1,0-28.2,0-42.3c0-52.2,0-104.4,0-156.6c0-61.5,0-123,0-184.5    c0-43.4,0-86.7,0-130.1c0-6.3,0-12.6,0-18.9c0-10.5-9.2-20.5-20-20C824.7,295.9,815.6,304.2,815.6,315.4z"/></g></g><g><g><g><path d="M322.2,516.8c12.5,0,25.1,0,37.6,0c30.1,0,60.2,0,90.4,0c36.4,0,72.9,0,109.3,0c31.5,0,63.1,0,94.6,0     c15.4,0,30.8,0.4,46.1,0c0.2,0,0.5,0,0.7,0c10.5,0,20.5-9.2,20-20c-0.5-10.8-8.8-20-20-20c-12.5,0-25.1,0-37.6,0     c-30.1,0-60.2,0-90.4,0c-36.4,0-72.9,0-109.3,0c-31.5,0-63.1,0-94.6,0c-15.4,0-30.8-0.4-46.1,0c-0.2,0-0.5,0-0.7,0     c-10.5,0-20.5,9.2-20,20C302.7,507.6,311,516.8,322.2,516.8L322.2,516.8z"/></g></g><g><g><path d="M322.2,644.9c12.5,0,25.1,0,37.6,0c30.1,0,60.2,0,90.4,0c36.4,0,72.9,0,109.3,0c31.5,0,63.1,0,94.6,0     c15.4,0,30.8,0.4,46.1,0c0.2,0,0.5,0,0.7,0c10.5,0,20.5-9.2,20-20c-0.5-10.8-8.8-20-20-20c-12.5,0-25.1,0-37.6,0     c-30.1,0-60.2,0-90.4,0c-36.4,0-72.9,0-109.3,0c-31.5,0-63.1,0-94.6,0c-15.4,0-30.8-0.4-46.1,0c-0.2,0-0.5,0-0.7,0     c-10.5,0-20.5,9.2-20,20C302.7,635.8,311,644.9,322.2,644.9L322.2,644.9z"/></g></g><g><g><path d="M322.2,773.1c25.7,0,51.5,0,77.2,0c41.2,0,82.5,0,123.7,0c9.4,0,18.9,0,28.3,0c10.5,0,20.5-9.2,20-20     c-0.5-10.8-8.8-20-20-20c-25.7,0-51.5,0-77.2,0c-41.2,0-82.5,0-123.7,0c-9.4,0-18.9,0-28.3,0c-10.5,0-20.5,9.2-20,20     C302.7,763.9,311,773.1,322.2,773.1L322.2,773.1z"/></g></g></g></svg>
              </div>
              <input type="text" name="nrodocument-memopay" id="nrodocument-memopay" autocomplete="false" class="cCRegister__cont--fCRegister--form--controls--input" placeholder="Nro. de documento" maxlength="15" required>
              <span id="msgerrorNounNroDocumentCli"></span>
            </div>
          </div>
          <div class="cCRegister__cont--fCRegister--form--controls">
            <div class="cCRegister__cont--fCRegister--form--controls--cSelItem" id="selListallTypeSex">
              <div class="cCRegister__cont--fCRegister--form--controls--cSelItem--cInputFake" id="newValTypeSex">
                <span class="cCRegister__cont--fCRegister--form--controls--cSelItem--cInputFake--placeholder">Selecciona tu sexo</span>
              </div>
              <input type="text" class="cCRegister__cont--fCRegister--form--controls--cSelItem--inputVal" readonly id="selListtypeSex--input">
              <img class="cCRegister__cont--fCRegister--form--controls--cSelItem--icon" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
              <span id="msgerrorNounSelTypeSex"></span>
              <ul class="cCRegister__cont--fCRegister--form--controls--cSelItem--MenuListTypeSex" id="listtypesSex"></ul>
            </div>
          </div>
          <div class="cCRegister__cont--fCRegister--form--cBtnsActions">
            <button class="cCRegister__cont--fCRegister--form--cBtnsActions--btnCRegister" id="btn-CompleteRegister" type="submit">Completar mi perfil</button>
            <p class="cCRegister__cont--fCRegister--form--cBtnsActions--whatsAccount">
              <a href="signin">Acceder con otra cuenta</a>
              <a href="#">¿Por qué me piden estos datos?</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?= $url ?>views/js/actions_pages/complete-register.js"></script>
</body>
</html>