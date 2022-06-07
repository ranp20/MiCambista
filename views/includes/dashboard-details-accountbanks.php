<div class="cformDetailsAccount">
	<div class="cformDetailsAccount--contDetails" id="cont-DetailsAccountUser">
		<input type="hidden" id="input-idClientValUpdateAccount" value="<?= $_SESSION['cli_sessmemopay'][0]['id']; ?>">
		<input type="hidden" id="val-idaccountdetail">
		<div class="cformAddAccountBank--form--cBtnClose">
			<span id="icon_frmbtnCloseDetailsAcc">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" version="1.1" viewBox="0 0 700 700"><g> <path d="m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z" fill-rule="evenodd"/></g></svg>
			</span>
		</div>
		<div class="cformDetailsAccount--contDetails--cTitle">
			<h3 class="cformDetailsAccount--contDetails--cTitle--title">Detalle de la cuenta</h3>
		</div>
		<div class="cformDetailsAccount--contDetails--cDetailInfo">
			<ul class="cformDetailsAccount--contDetails--cDetailInfo--m">
				<li class="cformDetailsAccount--contDetails--cDetailInfo--m--item">
					<p>Banco</p>
					<div class="cformDetailsAccount--contDetails--cDetailInfo--m--item--cImgNameBank">
						<img src="" alt="" id="imgbank-accountdetail">
					</div>
					<p id="namebank-accountdetail"></p>
				</li>
				<li class="cformDetailsAccount--contDetails--cDetailInfo--m--item">
					<p>Tipo de cuenta</p>
					<span id="typeaccount-accountdetail"></span>
				</li>
				<li class="cformDetailsAccount--contDetails--cDetailInfo--m--item">
					<p>Moneda</p>
					<span id="typecurrency-accountdetail"></span>
				</li>
			</ul>
		</div>
		<div class="cformDetailsAccount--contDetails--cDetailNumAliasform">
			<div class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist" id="menuListUpdateAccount">
				<ul class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--m">
					<li class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--m--item">
						<p>Número de cuenta</p>
						<span id="numaccount-accountdetail"></span>
					</li>
					<li class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--m--item">
						<p>Alias de la cuenta</p>
						<span id="aliasaccount-accountdetail"></span>
					</li>
				</ul>
				<div class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--btns">
					<button type="button" class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--btns--cBtnUpdateAccount" id="btn-ShowUpdateAccount">
						<span>Editar cuenta</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 40" style="enable-background:new 0 0 32 32;" xml:space="preserve"><g><g><path d="M2.74,30.26c-0.26,0-0.52-0.1-0.71-0.29c-0.29-0.29-0.37-0.71-0.22-1.09l2.38-5.79c0.05-0.12,0.12-0.23,0.22-0.33    l18.5-18.5c1.33-1.33,3.5-1.33,4.83,0c1.33,1.33,1.33,3.5,0,4.83c0,0,0,0,0,0l-18.5,18.5c-0.09,0.09-0.2,0.17-0.33,0.22    l-5.79,2.38C3,30.24,2.87,30.26,2.74,30.26z M5.97,24.03l-1.39,3.4l3.4-1.39L26.32,7.68c0.55-0.55,0.55-1.45,0-2    c-0.55-0.55-1.45-0.55-2,0L5.97,24.03z M27.03,8.39L27.03,8.39L27.03,8.39z"/></g></g></svg>
					</button>
					<button type="button" class="cformDetailsAccount--contDetails--cDetailNumAliasform--clist--btns--cBtnDeleteNumAccount" id="btn-ShowDeleteAccount">
						<span>Eiminar cuenta</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 96 120" style="enable-background:new 0 0 96 96;" xml:space="preserve"><path d="M86.6,15H66.2v-3.1c0-4.3-3.5-7.9-7.9-7.9H37.6c-4.3,0-7.9,3.5-7.9,7.9V15H9.4c-1.8,0-3.1,1.3-3.1,3.1s1.3,3.1,3.1,3.1h5.9  v56.2c0,8,6.5,14.6,14.6,14.6h36.3c8,0,14.6-6.5,14.6-14.6V21.2h5.9c1.8,0,3.1-1.3,3.1-3.1S88.3,15,86.6,15z M60.1,12v3.1H36V12  c0-0.9,0.7-1.7,1.7-1.7h20.8C59.4,10.3,60.1,11.1,60.1,12z M74.5,77.4c0,4.6-3.7,8.3-8.3,8.3H29.9c-4.6,0-8.3-3.7-8.3-8.3V21.2h52.9  V77.4z"/></svg>
					</button>
				</div>
			</div>
			<form method="POST" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form" id="formListUpdateAccount">
				<div class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl">
					<label for="numaccountupdate-cli" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl--label">Número de cuenta</label>
					<input type="number" id="numaccountupdate-cli" required name="numaccountupdate-cli" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl--input" placeholder="Número de cuenta" maxlength="14">
					<span id="msgerrorNounNumbDetailAccount"></span>
				</div>
				<div class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl">
					<label for="aliasacccountupdate-cli" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl--label">Alias de la cuenta</label>
					<input type="text" id="aliasacccountupdate-cli" required name="aliasacccountupdate-cli" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cControl--input" placeholder="Alias de la cuenta">
					<span id="msgerrorNounAliasDetailAccount"></span>
				</div>
				<div class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cBtns">
					<button type="submit" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cBtns--cBtnUpdateAccount" id="btn-updateDetailsAccount">Editar cuenta</button>
					<a href="#" class="cformDetailsAccount--contDetails--cDetailNumAliasform--form--cBtns--cBtnCancelUpdateNumAccount" id="btn-HiddenupdateDetailsAccount">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="alert-DeleteAccount">
	<form method="POST" class="alert-DeleteAccount--c">
		<div class="alert-DeleteAccount--c--cIcon">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 50" x="0px" y="0px"><path fill-rule="evenodd" d="M20,36 C11.163444,36 4,28.836556 4,20 C4,11.163444 11.163444,4 20,4 C28.836556,4 36,11.163444 36,20 C36,28.836556 28.836556,36 20,36 Z M20,34 C27.7319865,34 34,27.7319865 34,20 C34,12.2680135 27.7319865,6 20,6 C12.2680135,6 6,12.2680135 6,20 C6,27.7319865 12.2680135,34 20,34 Z M20,28 C18.8954305,28 18,27.1045695 18,26 C18,24.8954305 18.8954305,24 20,24 C21.1045695,24 22,24.8954305 22,26 C22,27.1045695 21.1045695,28 20,28 Z M18.1904462,13.9044615 C18.0852656,12.8526565 18.8482971,12 19.9062805,12 L20.0937195,12 C21.1465291,12 21.9147406,12.8525944 21.8095538,13.9044615 L21.0995398,21.0046024 C21.0445655,21.5543453 20.5561352,22 20,22 C19.4477153,22 18.9557409,21.5574094 18.9004602,21.0046024 L18.1904462,13.9044615 Z"/></svg>
		</div>				
		<div class="alert-DeleteAccount--c--cTitle">
			<h3 class="alert-DeleteAccount--c--cTitle--title">Eliminar la cuenta</h3>
			<p class="alert-DeleteAccount--c--cTitle--desc">¿Seguro deseas eliminar la cuenta con alias <span><b id="aliasAccount-delete"></b></span>?</p>
		</div>
		<div class="alert-DeleteAccount--c--cBtns">
			<button type="submit" class="alert-DeleteAccount--c--cBtns--delete" id="btn-AceptDeleteAccount">Sí, eliminar</button>
			<button type="button" class="alert-DeleteAccount--c--cBtns--cancel" id="btn-cancelDeleteAccount">Cancelar</button>
		</div>
	</form>
</div>