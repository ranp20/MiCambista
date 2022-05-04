<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['admin_micambista'])){
	header("Location: admin");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi Cambista | Operaciones</title>
	<?php require_once 'includes/header_links.php';?>
	<!-- INCLUIR DATATABLES -->
	<link rel="stylesheet" type="text/css" href="<?= $urlCli; ?>views/js/DataTables/datatables.min.css">
	<script type="text/javascript" charset="utf8" src="<?= $urlCli; ?>views/js/DataTables/datatables.min.js"></script>
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<?php require_once 'includes/sidebar_left.php';?>
		<div class="cDash-adm--containRight">
			<?php require_once 'includes/headertop.php';?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">OPERACIONES</h2>
					<!--<button type="button" href="#" id="add-category" class="cDash-adm--containRight--cContain__addtitle--btn-add" data-toggle="modal" data-target="#addcategoryModal"><span class="cDash-adm--containRight--cContain__addtitle--btn-add__hidden">Agregar&nbsp;</span>+</button>-->
				</div>
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cardBody">
						<div class="cDash-adm--containRight--cContain__cBody__cardBody__cCardBody">
							<div class="cDash-adm--containRight--cContain__cSelOptions">
								<select id="selOpts-OperationsFilter" class="one-hidden">
									<option selected>Seleccione una opción</option>
									<option value="1" data-short="Recents">Recientes</option>
									<option value="2" data-short="Processed">Procesadas</option>
								</select>
							</div>
							<div class="cDash-adm--containRight--cContain__title-OptionShort">
								<h3 id="title-shortOption" class="cDash-adm--containRight--cContain__title-OptionShort__title processed">Recientes</h3>
							</div>
							<!--<div class="cDash-adm--containRight--cContain__inputsearch-table">
								<input type="text" class="cDash-adm--containRight--cContain__inputsearch-table--input" name="searchclients" id="searchclients" maxlength="100" placeholder="Buscar...">
							</div>-->
							<div class="contain-table-responsive">
								<table id="tbl_operations" class="cDash-adm--containRight--cContain__list-results" cellpadding="0" width="100%">
									<thead>
										<tr>
											<th>Id</th>
											<th>Cod. Orden</th>
											<th>Prefijo Enviado</th>
											<th>Monto Enviado</th>
											<th>Prefijo Recibido</th>
											<th>Monto Recibido</th>
											<th class='center'>Tasa de Cambio</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<!-- FIN MODALS-->
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url ?>js/main.js"></script>
	<script type="text/javascript" src="<?= $url ?>js/actions_pages/operations.js"></script>
</body>
</html>