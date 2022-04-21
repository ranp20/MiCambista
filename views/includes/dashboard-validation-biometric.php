<div class="cControlP__cont--containDash--c--validBiom--cont">
	<div class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus" id="c_statusPointSteps_validBiom">
		<a href="javascript:void(0);" class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep active">
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">1</span>
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">VERIFICACIÓN DE IDENTIDAD</span>
		</a>
		<a href="javascript:void(0);" class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep">
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">2</span>
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">GRABAR VIDEO SELFIE</span>
		</a>
		<a href="javascript:void(0);" class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep">
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--point">3</span>
			<span class="cControlP__cont--containDash--c--validBiom--cont--cLeftStatus--pointStep--text">VERIFICACIÓN</span>
		</a>
	</div>
	<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity">
		<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step enabledSlide" id="c-stepOne_ValBiom">
			<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle">
				<h2 class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--title">Verificación de identidad</h2>
				<p class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cTitle--desc">Por favor, proporcione una foto de su documento de identidad</p>
			</div>
			<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto">
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item">
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cImg">
						<img src="<?= $url ?>views/assets/img/utilities/imagen_frontal-DNI.png" alt="" width="100" height="100" id="view-upPhotoDoc_front" class="">
					</div>
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cDesc">
						<button type="button">FOTO DE DNI FRONTAL</button>
						<span>Min 1MB, Máx 5MB, .jpeg, .jpg, .png</span>
					</div>
					<label for="photo_dni-front"></label>
					<input type="file" id="photo_dni-front" name="imagen[]" accept="img/*" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--iptfilePhoto" required>
				</div>
				<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item">
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cImg">
						<img src="<?= $url ?>views/assets/img/utilities/imagen_trasero-DNI.png" alt="" width="100" height="100" id="view-upPhotoDoc_back" class="">
					</div>
					<div class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--cDesc">
						<button type="button">FOTO DE DNI POSTERIOR</button>
						<span>Min 1MB, Máx 5MB, .jpeg, .jpg, .png</span>
					</div>
					<label for="photo_dni-back"></label>
					<input type="file" id="photo_dni-back" name="imagen[]" accept="img/*" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--cPhoto--item--iptfilePhoto" required>
				</div>
			</div>
			<button type="button" class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step--btnOneToNextStep" id="btn_stepNext_validBiom">CONTINUAR</button>
		</section>
		<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step" id="c-stepTwo_ValBiom"></section>
		<section class="cControlP__cont--containDash--c--validBiom--cont--cRightValIdentity--step" id="c-stepThree_ValBiom"></section>
	</div>
</div>
