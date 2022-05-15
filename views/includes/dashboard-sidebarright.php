<section class="cControlP__cont--sdRight">
	<div class="cControlP__cont--sdRight--c">
		<div class="cControlP__cont--sdRight--c--iconclose" id="btnCloseSdRight">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</div>
		<div class="cControlP__cont--sdRight--c--cNamecli">
			<div class="cControlP__cont--sdRight--c--cNamecli--cImg">
				<img src="<?= $url ?>views/assets/img/svg/user-male.svg" alt="icon_user-male" width="100" height="100">
			</div>
			<div class="cControlP__cont--sdRight--c--cNamecli--cnamcli">
				<p><?= $name; ?></p>
				<span>Usuario</span>
			</div>
		</div>
		<ul class="cControlP__cont--sdRight--c--m">
			<li class="cControlP__cont--sdRight--c--m--item">
				<a href="my-profile" class="cControlP__cont--sdRight--c--m--link" id="control-panel">
					<img src="<?= $url ?>views/assets/img/svg/profiles-3.svg" alt="icon_user-profiles" width="100" height="100">
					<span>Ver perfil</span>
				</a>
			</li>
			<li class="cControlP__cont--sdRight--c--m--item">
				<a href="#" class="cControlP__cont--sdRight--c--m--link" id="control-panel">
					<img src="<?= $url ?>views/assets/img/svg/profiles-1.svg" alt="icon_user-change-profile" width="100" height="100">
					<span>Cambiar perfil</span>
				</a>
			</li>
			<li class="cControlP__cont--sdRight--c--m--item">
				<a href="logout" class="cControlP__cont--sdRight--c--m--link">
					<img src="<?= $url ?>views/assets/img/svg/profiles-2.svg" alt="icon_close_session" width="100" height="100">
					<span>Cerrar sesión</span>
				</a>
			</li>
		</ul>
	</div>
</section>