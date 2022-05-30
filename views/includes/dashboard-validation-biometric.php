<div class="cControlP__cont--containDash--c--validBiom--cont">
	<form action="" method="POST" id="mcamb_frm-validbiometric" enctype="multipart/form-data">
		<ul class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus" id="c_statusPointSteps_validBiom">
			<li class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep active">
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">1</span>
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">VERIFICACIÓN DE IDENTIDAD</span>
			</li>
			<!-- 
			<li class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep">
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">2</span>
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">GRABAR VIDEO SELFIE</span>
			</li>
 			-->
			<li class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep">
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">3</span>
				<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">VERIFICACIÓN</span>
			</li>
		</ul>
		<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity" id="c-listStepsValidation">
			<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step active" id="anchor_step_one">
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
					<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">Verificación de identidad</h2>
					<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">Por favor, proporcione una foto de su documento de identidad</p>
				</div>
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto">
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item">
						<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cImg" id="c_ImgUploadDocFront">
							<img src="<?= $url ?>views/assets/img/utilities/imagen_frontal-DNI.png" alt="" width="100" height="100" id="view-upPhotoDoc_front" class="">
						</div>
						<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cDesc">
							<button type="button">FOTO DE DNI FRONTAL</button>
							<span>Min 1MB, Máx 5MB, .jpeg, .jpg, .png</span>
						</div>
						<label for="photo_dni-front"></label>
						<input type="file" id="photo_dni-front" name="imagen_front[]" accept="img/*" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--iptfilePhoto imagen_front" required>
					</div>
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item">
						<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cImg" id="c_ImgUploadDocBack">
							<img src="<?= $url ?>views/assets/img/utilities/imagen_trasero-DNI.png" alt="" width="100" height="100" id="view-upPhotoDoc_back" class="">
						</div>
						<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cDesc">
							<button type="button">FOTO DE DNI POSTERIOR</button>
							<span>Min 1MB, Máx 5MB, .jpeg, .jpg, .png</span>
						</div>
						<label for="photo_dni-back"></label>
						<input type="file" id="photo_dni-back" name="imagen_back[]" accept="img/*" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--iptfilePhoto imagen_back" required>
					</div>
				</div>
				<button type="button" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--btnOneToNextStep" id="btn_stepNext_validBiom">CONTINUAR</button>
			</section>
			<!-- 
			<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step" id="anchor_step_two">
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
					<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">INSTRUCCIONES</h2>
					<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">Colocate de frente en el marco de color, haz click en grabar y espera 5 segundos.</p>
				</div>
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cVideo" id="v-cVideoAuthorizeValidation">
					<button type="button" id="btn-stop_recordbiometric" class="btn-pri_theme-def">Subir video</button>
				</div>
			</section>
 			-->
			<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step" id="anchor_step_three">
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
					<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">COMPLETADO</h2>
					<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">Felicidades, completaste la verificación biométrica.</p>
				</div>
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cVideo">
					<button type="button" id="btn-finalVerifyValidBiom" class="btn-pri_theme-def">ACEPTAR</button>
				</div>
			</section>
		</div>		
	</form>
</div>
