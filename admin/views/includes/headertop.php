<?php 
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $urlAdmin =  $actual_link . "/MiCambista/admin/";
?>
<div class="cDash-adm--containRight--cTop">
	<div class="cDash-adm--containRight--cTop--cont">
		<div class="cDash-adm--containRight--cTop--cont--item">
			<span id="openbtnToggSideNav_icon" class="cDash-adm--containRight--cTop--cont--item--btniconOpen">
		  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
		  </span>
		</div>
		<div class="cDash-adm--containRight--cTop--cont--item__liveWeb" id="btnLiveinSite">
			<a href="../" target="_blank" class="cDash-adm--containRight--cTop--cont--item__liveWeb__link">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
			</a>
		</div>
		<div class="cDash-adm--containRight--cTop--cont--item">
			<div class="cDash-adm--containRight--cTop--cont--item--user" id="menu-Optsuser">
				<img src="<?= $url ?>assets/img/images/user_default.png" alt="">
			</div>
			<ul class="cDash-adm--containRight--cTop--cont--item--m" id="m-OptsuserList">
				<li class="cDash-adm--containRight--cTop--cont--item--m--item"><a href="#" class="cDash-adm--containRight--cTop--cont--item--m--link">Mi perfil</a>
				</li>
				<li class="cDash-adm--containRight--cTop--cont--item--m--item"><a href="<?= $urlAdmin ?>php/process_logout-adm.php" class="cDash-adm--containRight--cTop--cont--item--m--link">Cerrar sesión</a>
				</li>
			</ul>
		</div>
	</div>
</div>