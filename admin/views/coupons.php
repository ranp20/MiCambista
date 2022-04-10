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
	<title>Mi Cambista | Cupones</title>
	<?php require_once 'includes/header_links.php' ?> 
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<?php require_once 'includes/sidebar_left.php';?>
		<div class="cDash-adm--containRight">
			<?php require_once 'includes/headertop.php';?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">CUPONES</h2>
					<button type="button" href="#" id="add-coupon" class="cDash-adm--containRight--cContain__addtitle--btn-add" data-toggle="modal" data-target="#addcouponModal"><span class="cDash-adm--containRight--cContain__addtitle--btn-add__hidden">Agregar&nbsp;</span>+</button>
				</div>
				<div class="cDash-adm--containRight--cContain__cBody">
					<div class="cDash-adm--containRight--cContain__cBody__cardBody">
						<div class="cDash-adm--containRight--cContain__cBody__cardBody__cCardBody">
							<div class="cDash-adm--containRight--cContain__inputsearch-table">
								<input type="text" class="cDash-adm--containRight--cContain__inputsearch-table--input" name="searchcoupons" id="searchcoupons" maxlength="100" placeholder="Buscar cupones...">
							</div>
							<div class="contain-table-responsive">
								<table class="cDash-adm--containRight--cContain__list-results">
									<thead>
										<tr>
											<th>ID</th>
											<th>Código</th>
											<th>Desc. de tarifa</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody id="tbl_coupons"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL - AGREGAR NUEVO PAÍS -->
				<div class="modal fade bootstrapmodal-custom" id="addcouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CUPÓN</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="cont-modalbootstrap">
					        <form action="" id="form-add-coupon" method="POST" class="cont-modalbootstrap__form" autocomplete="false" enctype="multipart/form-data">
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="code_coupon" class="cont-modalbootstrap__form--control__label">Código del cupón</label>
					        		<input id="code_coupon" class="cont-modalbootstrap__form--control__input" name="code_coupon" type="text" maxlength="100" required placeholder="Ingrese el código del cupón">
					        	</div>
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="percent_desc" class="cont-modalbootstrap__form--control__label">Descuento del cupón</label>
					        		<input id="percent_desc" class="cont-modalbootstrap__form--control__input" name="percent_desc" type="text" data-format="twodecimals" required placeholder="Ingrese el descuento del cupón">
					        	</div>
							      <div class="cont-modalbootstrap__footer">
							        <button type="button" class="cont-modalbootstrap__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrap__footer--btnadd" id="btnadd-coupon">GUARDAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- MODAL - EDITAR PAÍS -->
				<div class="modal fade bootstrapmodalupdate-custom" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="update-modal-label">ACTUALIZAR CUPÓN</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body cont-total-update-items">
				      	<div class="cont-modalbootstrapupdate">
					        <form action="" id="form-update-coupon" method="POST" class="cont-modalbootstrapupdate__form" autocomplete="false" enctype="multipart/form-data">
					        	<input type="hidden" id="idupdate-coupon">
					        	<div class="cont-modalbootstrapupdate__form--control">
					        		<label for="code_coupon-update" class="cont-modalbootstrapupdate__form--control__label complete">Código del cupón</label>
					        		<input id="code_coupon-update" class="cont-modalbootstrapupdate__form--control__input" name="code_coupon-update" type="text" maxlength="100" placeholder="Ingrese el código del cupón">
					        	</div>
					        	<div class="cont-modalbootstrapupdate__form--control">
					        		<label for="percent_desc-update" class="cont-modalbootstrapupdate__form--control__label complete">Descuento del cupón</label>
					        		<input id="percent_desc-update" class="cont-modalbootstrapupdate__form--control__input" name="percent_desc-update" type="text" data-format="twodecimals" placeholder="Ingrese el descuento del cupón">
					        	</div>
							      <div class="cont-modalbootstrapupdate__footer">
							        <button type="button" class="cont-modalbootstrapupdate__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrapupdate__footer--btnupdate" id="btnupdate-coupon">GUARDAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- MODAL - ELIMINAR RESTAURANTE -->
				<div class="modal fade bootstrapmodaldelete-custom" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="delete-modal-label">ELIMINAR CUPÓN</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body cont-total-update-items">
					      <h2 class="text-message-modalAlt">¿Seguro que desea eliminar este registro?</h2>
				      	<div class="cont-modalbootstrapupdate">
					        <form action="" id="form-delete-coupon" method="POST" class="cont-modalbootstrapupdate__form" autocomplete="false" enctype="multipart/form-data">
					        	<input type="hidden" id="iddelete-coupon">
							      <div class="cont-modalbootstrapupdate__footer">
							        <button type="button" class="cont-modalbootstrapupdate__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrapupdate__footer--btndelete" id="btndelete-coupon">ELIMINAR</button>
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
	<script type="text/javascript" src="<?= $url ?>js/actions_pages/coupons.js"></script>
</body>
</html>