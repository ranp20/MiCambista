<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['cli_micambista'])){
	header("Location: signin");
}
require_once '../php/process_data-list.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Panel de control</title>
	<?php require_once 'includes/header_links.php';?>
	<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<div class="cControlP">
		<div class="msgAlertLogin" id="msgAlertLogin"></div>
		<div class="cControlP__cont">
			<?php require_once 'includes/dashboard-header-top.php'; ?>
			<?php require_once 'includes/dashboard-sidebarleft.php'; ?>
			<?php require_once 'includes/dashboard-sidebarright.php'; ?>
			<section class="cControlP__cont--containDash" id="page-indexusercontrol">
				<div class="cControlP__cont--containDash--c" id="cont-initial-page">
					<div class="cControlP__cont--containDash--c__ctitle">
						<h2>¡Nos alegra que estés aquí!</h2>
						<h3>Selecciona el perfil que usarás hoy</h3>
					</div>
					<div class="cControlP__cont--containDash--c__cBtnsOpts-m" id="c_listTypeProfileOfUser">
						<?php
							$tmp_multiprofiles = "";
							if($dataCli[0]['multiple_profiles'] == "YES"){
								require_once '../php/class/client.php';
								$cli = new Client();
								$list_profiles = $client->get_enterprise_data($dataCli[0]['id']);
								if(!empty($list_profiles)){
									$tmp_multiprofiles .= "
										<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
											<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
														<img src='{$url}views/assets/img/svg/male-dark.svg' alt='' width='100' height='100'>
													</span>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
														<span>{$name}</span>
													</span>
												</span>
											</a>
										</div>
										<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
											<span class='cControlP__cont--containDash--c__cBtnsOpts-m--item__cIconClose'>
												<span>
													<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='30px' height='30px' version='1.1' viewBox='0 0 700 700'><g><path d='m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z' fill-rule='evenodd'/></g></svg>
												</span>
											</span>
											<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link' data-id='{$list_profiles[0]['id']}' data-token='{$list_profiles[0]['_token']}'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
														<img src='{$url}views/assets/img/svg/company-or-enterprise.svg' alt='' width='100' height='100'>
													</span>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
														<span>{$list_profiles[0]['name_enterprise']}</span>
													</span>
												</span>
											</a>
										</div>
									";
								}else{
									$tmp_multiprofiles .= "
										<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
											<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
														<img src='{$url}views/assets/img/svg/male-dark.svg' alt='' width='100' height='100'>
													</span>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
														<span>{$name}</span>
													</span>
												</span>
											</a>
										</div>
										<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item c-NotBackground'>
											<a href='javascript:void(0);' class='cControlP__cont--containDash--c__cBtnsOpts-m--link' id='btn-addAccountEnterpriseShow'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
														<img src='{$url}views/assets/img/svg/add-profile.svg' alt='' width='100' height='100' style='width:auto;height:auto;padding:1.75rem;'>
													</span>
													<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
														<span>Agregar empresa</span>
													</span>
												</span>
											</a>
										</div>
									";	
								}
							}else{
								$tmp_multiprofiles .= "
									<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item'>
										<a href='convert-divise' class='cControlP__cont--containDash--c__cBtnsOpts-m--link'>
											<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
													<img src='{$url}views/assets/img/svg/male-dark.svg' alt='' width='100' height='100'>
												</span>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
													<span>{$name}</span>
												</span>
											</span>
										</a>
									</div>
									<div class='cControlP__cont--containDash--c__cBtnsOpts-m--item c-NotBackground'>
										<a href='javascript:void(0);' class='cControlP__cont--containDash--c__cBtnsOpts-m--link' id='btn-addAccountEnterpriseShow'>
											<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile'>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__cIcon'>
													<img src='{$url}views/assets/img/svg/add-profile.svg' alt='' width='100' height='100' style='width:auto;height:auto;padding:1.75rem;'>
												</span>
												<span class='cControlP__cont--containDash--c__cBtnsOpts-m--link__cInfoProfile__ctitle'>
													<span>Agregar empresa</span>
												</span>
											</span>
										</a>
									</div>
								";
							}
							echo $tmp_multiprofiles;
						?>
					</div>
				</div>
			</section>
			<?php require_once 'includes/dashboard-formaddenterprise.php'; ?>
		</div>
	</div>		
	<script src="<?= $url ?>views/js/actions_pages/dashboard-client.js"></script>
	<script src="<?= $url ?>views/js/actions_pages/select-profile.js"></script>
</body>
</html>