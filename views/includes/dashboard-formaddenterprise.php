<div class="cformAddAccountEnterprise">
	<form method="POST" class="cformAddAccountEnterprise--form" id="form-AddAccountEnterprise">
		<div class="cformAddAccountEnterprise--form--cTitle">
			<h3 class="cformAddAccountEnterprise--form--cTitle--title">Agrega tu perfil de empresa</h3>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<input type="hidden" id="input-idClientValEnterprise" value="<?= $_SESSION['cli_micambista'][0]['id']; ?>">
			<label for="nameenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa el nombre de tu empresa</label>
			<input type="text" id="nameenpterprise-cli" required name="nameenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="Nombre de la empresa">
			<span id="msgerrorNounNameEnterprise"></span>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<label for="rucenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa el RUC de tu empresa</label>
			<input type="number" id="rucenpterprise-cli" required name="rucenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="RUC de la empresa" maxlength="13">
			<span id="msgerrorNounRUCEnterprise"></span>
		</div>
		<div class="cformAddAccountEnterprise--form--cControl">
			<label for="addressenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--label">Ingresa la dirección fiscal de tu empresa</label>
			<input type="text" id="addressenpterprise-cli" required name="addressenpterprise-cli" class="cformAddAccountEnterprise--form--cControl--input" placeholder="Dirección fiscal de la empresa">
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