<div class="cformValidMediaBiometric">
	<div class="cformValidMediaBiometric--form" id="form-ValidMediaBiometric">
		<div class="cformValidMediaBiometric--form--cBtnClose">
			<span id="icon_frmbtnClose">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" version="1.1" viewBox="0 0 700 700"><g><path d="m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z" fill-rule="evenodd"/></g></svg>
			</span>
		</div>
		<div class="cformValidMediaBiometric--form--cTitle">
			<h3 class="cformValidMediaBiometric--form--cTitle--title">Subir video de verificación</h3>
		</div>
		<div class="cformValidMediaBiometric--form--cControl">
			<input type="hidden" id="ipt-idClientVal" value="<?= $_SESSION['cli_micambista'][0]['id']; ?>">
			<div class="cformValidMediaBiometric--form--cControl--cVideo" id="c_videoAuthorizeValidation">
				<div class="cformValidMediaBiometric--form--cControl--cVideo__cVideos">
					<div class="cformValidMediaBiometric--form--cControl--cVideo__cVideos__video">
						<div class="cformValidMediaBiometric--form--cControl--cVideo__cVideos__video__cvideo">
							<video id="c_video-valididentity" width="100" height="100" autoplay muted></video>
						</div>
						<button class="cformValidMediaBiometric--form--cControl--cVideo__cVideos__video__btnRecord btn-pri_theme-def" id="init_vidValidationBio">Iniciar grabación</button>
					</div>
					<div class="cformValidMediaBiometric--form--cControl--cVideo__cVideos__video" id="c_playVideoRecording">
						<div class="cformValidMediaBiometric--form--cControl--cVideo__cVideos__video__cvideo">
							<video id="c_video-valididentity__opViewVideo" width="100" height="100" controls playsinline></video>
						</div>
					</div>
				</div>
				<span id="gif-load-validvideo">
					<span></span>
				</span>
			</div>
		</div>
		<button type="submit" class="cformValidMediaBiometric--form--cBtnSubmit btn-pri_theme-def" id="btn-ValidMediaBiometric">Enviar video</button>
	</div>
</div>