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
	<title>Mi Cambista | Clientes</title>
	<?php require_once 'includes/header_links.php' ?>
	<link href="../vendor/select2/select2/dist/css/select2.min.css" rel="stylesheet"/>
	<script src="../vendor/select2/select2/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<?php require_once 'includes/sidebar_left.php';?>
		<div class="cDash-adm--containRight">
			<?php require_once 'includes/headertop.php';?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">CLIENTES</h2>
					<!--<button type="button" href="#" id="add-category" class="cDash-adm--containRight--cContain__addtitle--btn-add" data-toggle="modal" data-target="#addcategoryModal"><span class="cDash-adm--containRight--cContain__addtitle--btn-add__hidden">Agregar&nbsp;</span>+</button>-->
				</div>
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cardBody">
						<div class="cDash-adm--containRight--cContain__cBody__cardBody__cCardBody">
							<div class="cDash-adm--containRight--cContain__inputsearch-table">
								<input type="text" class="cDash-adm--containRight--cContain__inputsearch-table--input" name="searchclients" id="searchclients" maxlength="100" placeholder="Buscar...">
							</div>
							<div class="contain-table-responsive">
								<table class="cDash-adm--containRight--cContain__list-results">
									<thead>
										<tr>
											<th>Id</th>
											<th>Email</th>
											<th>Teléfono</th>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>T. documento</th>
											<th>Nro. documento</th>
											<th class='center'>Sexo</th>
											<th class='center'>Coupon</th>
										</tr>
									</thead>
									<tbody id="tbl_clients"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL - EDITAR ITEMS -->
				<div class="modal fade bootstrapmodalupdate-custom" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="update-modal-label">ACTUALIZAR CLIENTE</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body cont-total-update-items">
				      	<div class="cont-modalbootstrapupdate">
					        <form action="" id="form-update-client" method="POST" class="cont-modalbootstrapupdate__form" autocomplete="false" enctype="multipart/form-data">
					        	<input type="hidden" name="idupdate-client" id="idupdate-client">
					        	<!--
					        	<div class="cont-modalbootstrapupdate__form--control">
					        		<label for="code_coupon-client-update" class="cont-modalbootstrapupdate__form--control__label complete">Cupones</label>
					        		<select class="js-example-basic-multiple" id="c-contSelectItems__selCoupons" name="cli_coupons[]" multiple="multiple">
					        			<option></option>
					        		</select>
					        	</div>
					        	-->
					        	<div class="cont-groupbox-controls">
					        		<label for="" class="cont-groupbox-controls__label">Cupones</label>
					        		<div id="cli_listCoupones"></div>
					        	</div>
							      <div class="cont-modalbootstrapupdate__footer">
							        <button type="button" class="cont-modalbootstrapupdate__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrapupdate__footer--btnupdate" id="btnupdate-coupon-client">GUARDAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- FIN MODALS-->
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url ?>js/main.js"></script>
	<script type="text/javascript" src="<?= $url ?>js/actions_pages/clients.js"></script>
</body>
</html>