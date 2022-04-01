<?php	
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url =  $actual_link . "/" ."micambista/admin/";
session_start();
if(!isset($_SESSION['admin_micambista'])){
	header("Location: admin");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Instakash | Clientes</title>
	<?php require_once 'views/includes/header_links.php' ?> 
</head>
<body>
	<main class="cDash-adm">
		<div class="result"></div>
		<?php require_once 'views/includes/sidebar_left.php';?>
		<div class="cDash-adm--containRight">
			<?php require_once 'views/includes/headertop.php';?>
			<div class="cDash-adm--containRight--cContain">
				<div class="cDash-adm--containRight--cContain__addtitle">
					<h2 class="cDash-adm--containRight--cContain__addtitle--title">CLIENTES</h2>
					<!--<button type="button" href="#" id="add-category" class="cDash-adm--containRight--cContain__addtitle--btn-add" data-toggle="modal" data-target="#addcategoryModal"><span class="cDash-adm--containRight--cContain__addtitle--btn-add__hidden">Agregar&nbsp;</span>+</button>-->
				</div>
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
								<th>Sexo</th>
							</tr>
						</thead>
						<tbody id="tbl_clients">
								
						</tbody>
					</table>
				</div>
				<!-- MODAL - AGREGAR NUEVO RESTAURANTE -->
				<!--<div class="modal fade bootstrapmodal-custom" id="addcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CATEGORÍA</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div class="cont-modalbootstrap">
					        <form action="" id="form-add-category" method="POST" class="cont-modalbootstrap__form" autocomplete="false" enctype="multipart/form-data">
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="name" class="cont-modalbootstrap__form--control__label">Nombre de la categoría</label>
					        		<input id="name" class="cont-modalbootstrap__form--control__input" name="name" type="text" required>
					        	</div>
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="imagen">Foto de la categoría</label>
					        		<input id="images" class="cont-modalbootstrap__form--control__input-photo images" name="imagen[]" type="file" accept="img/*" required>
					        	</div>
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="selrestaurant">Restaurante</label>
						        	<select class="cont-modalbootstrap__form--control__select one-hidden" name="selrestaurant" id="selrestaurant" required>
						        		<option value="0">Elija una opción</option>
						        		<?php 

						        			/*
						        			foreach ($restaurants as $key => $value) {
						        				echo "
						        					<option value='{$value['id']}'>{$value['name']}</option>
						        				";
						        			}
						        			*/

						        		?>
						        	</select>
					        	</div>
							      <div class="cont-modalbootstrap__footer">
							        <button type="button" class="cont-modalbootstrap__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="button" class="cont-modalbootstrap__footer--btnadd" id="btnadd-category" type="submit">GUARDAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>-->
				<!-- MODAL - EDITAR NUEVO RESTAURANTE -->
				<!--<div class="modal fade bootstrapmodal-custom" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="update-modal-label">ACTUALIZAR CATEGORÍA</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body cont-total-update-items">
				      	<div class="cont-modalbootstrapupdate">
					        <form action="" id="form-update-category" method="POST" class="cont-modalbootstrapupdate__form" autocomplete="false" enctype="multipart/form-data">
					        	<input type="hidden" id="idupdate-category">
					        	<div class="cont-modalbootstrapupdate__form--control">
					        		<label for="name-update" class="cont-modalbootstrapupdate__form--control__label complete">Nombre de la categoría</label>
					        		<input id="name-update" class="cont-modalbootstrapupdate__form--control__input" name="name-update" type="text">
					        	</div>
					        	<div class="cont-modalbootstrapupdate__form--control">
					        		<label for="imagen">Foto de la categoría</label>
					        		<a href="#" id="photo-update" class="cont-modalbootstrapupdate__form--control__linkphoto" target="_blank">(Ver Imagen)</a>
					        		<input id="images" class="cont-modalbootstrap__form--control__input-photo images-update" name="imagen[]" type="file" accept="img/*">
					        	</div>
					        	<div class="cont-modalbootstrap__form--control">
					        		<label for="selrestaurant">Restaurante</label>
						        	<select class="cont-modalbootstrap__form--control__select one-hidden" name="selrestaurant-update" id="selrestaurant-update" required>
						        		<option value="0">Elija una opción</option>
						        		<?php 

						        			/*
						        			foreach ($restaurants as $key => $value) {
						        				echo "
						        					<option value='{$value['id']}'>{$value['name']}</option>
						        				";
						        			}
						        			*/

						        		?>
						        	</select>
					        	</div>
							      <div class="cont-modalbootstrapupdate__footer">
							        <button type="button" class="cont-modalbootstrapupdate__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrapupdate__footer--btnupdate" id="btnupdate-category">GUARDAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>-->
				<!-- MODAL - ELIMINAR RESTAURANTE -->
				<!--<div class="modal fade bootstrapmodal-custom" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="delete-modal-label">ELIMINAR CATEGORÍA</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body cont-total-update-items">
					      <h2 class="text-message-modalAlt">¿Seguro que desea eliminar este registro?</h2>
				      	<div class="cont-modalbootstrapupdate">
					        <form action="" id="form-delete-category" method="POST" class="cont-modalbootstrapupdate__form" autocomplete="false" enctype="multipart/form-data">
					        	<input type="hidden" id="iddelete-category">
							      <div class="cont-modalbootstrapupdate__footer">
							        <button type="button" class="cont-modalbootstrapupdate__footer--btncancel" data-dismiss="modal">CANCELAR</button>
							        <button type="submit" class="cont-modalbootstrapupdate__footer--btndelete" id="btndelete-category">ELIMINAR</button>
							      </div>
					        </form>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>-->
				<!-- FIN MODALS-->
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?= $url ?>views/js/main.js"></script>
	<script type="text/javascript" src="<?= $url ?>views/js/actions_pages/clients.js"></script>
</body>
</html>