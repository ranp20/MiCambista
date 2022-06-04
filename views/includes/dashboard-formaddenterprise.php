<div class="cformAddAccountEnterprise">
	<form method="POST" class="cformAddAccountEnterprise--form" id="form-AddAccountEnterprise">
		<div class="cformAddAccountBank--form--cBtnClose">
			<span id="icon_frmbtnCloseFrmEnterprise">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" version="1.1" viewBox="0 0 700 700"><g><path d="m535.61 94.387c-102.45-102.45-268.78-102.45-371.23 0-102.45 102.45-102.45 268.78 0 371.23 102.45 102.45 268.78 102.45 371.23 0 102.45-102.45 102.45-268.78 0-371.23zm-24.746 24.746c88.785 88.785 88.785 232.95 0 321.74-88.785 88.785-232.95 88.785-321.74 0s-88.785-232.95 0-321.74c88.785-88.785 232.95-88.785 321.74 0zm-185.61 160.87-68.199-68.199c-6.832-6.8242-6.832-17.922 0-24.746 6.8242-6.832 17.922-6.832 24.746 0l68.199 68.199 68.199-68.199c6.8242-6.832 17.922-6.832 24.746 0 6.832 6.8242 6.832 17.922 0 24.746l-68.199 68.199 68.199 68.199c6.832 6.8242 6.832 17.922 0 24.746-6.8242 6.832-17.922 6.832-24.746 0l-68.199-68.199-68.199 68.199c-6.8242 6.832-17.922 6.832-24.746 0-6.832-6.8242-6.832-17.922 0-24.746z" fill-rule="evenodd"/></g></svg>
			</span>
		</div>
		<div class="cformAddAccountEnterprise--form--cTitle">
			<h3 class="cformAddAccountEnterprise--form--cTitle--title">Agrega tu perfil de empresa</h3>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<label for="rucenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa el RUC de tu empresa</label>
			<input type="text" id="rucenpterprise-cli" required name="rucenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="RUC de la empresa" maxlength="11" autocomplete="off" spellcheck="false">
			<span id="msgerrorNounRUCEnterprise"></span>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<input type="hidden" id="input-idClientValEnterprise" value="<?= $_SESSION['cli_sessmemopay'][0]['id']; ?>">
			<label for="nameenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa el nombre de tu empresa</label>
			<input type="text" id="nameenpterprise-cli" required name="nameenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="Nombre de la empresa" autocomplete="off" spellcheck="false">
			<span id="msgerrorNounNameEnterprise"></span>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<label for="addressenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa la dirección fiscal de tu empresa</label>
			<input type="text" id="addressenpterprise-cli" required name="addressenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="Dirección fiscal de la empresa" autocomplete="off" spellcheck="false">
			<span id="msgerrorNounAddressEnterprise"></span>
		</div>
		<div class="cformAddAccountEnterprise--form--cControlcheck">
			<input type="checkbox" id="checkenterprise-cli" required>
			<label for="checkenterprise-cli">Declaro que soy el representante legal de la empresa.</label>
			<span id="msgerrorNouncheckedEnterprise"></span>
		</div>
		<button type="submit" class="cformAddAccountEnterprise--form--cBtnAddAccount" id="btn-addAccountEnterprise">Agregar empresa</button>
	</form>
</div>