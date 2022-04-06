<div class="cformAddAccountBank">
	<form method="POST" class="cformAddAccountBank--form" id="form-AddAccountBank">
		<div class="cformAddAccountBank--form--cTitle">
			<h3 class="cformAddAccountBank--form--cTitle--title">Agregar cuenta bancaria</h3>
		</div>
		<div class="cformAddAccountBank--form--cControl">
			<input type="hidden" id="input-idClientVal" value="<?= $_SESSION['cli_micambista'][0]['id']; ?>">
			<label for="typecurrent-cli" class="cformAddAccountBank--form--cControl--label">Banco</label>
			<div class="cformAddAccountBank--form--cControl--cSelItem" id="selListallBanks">
				<div class="cformAddAccountBank--form--cControl--cSelItem--cInputFake" id="selListAllBanks--img">
					<span class="cformAddAccountBank--form--cControl--cSelItem--cInputFake--placeholder">Selecciona tu banco</span>
					<img src="" alt="" class="cformAddAccountBank--form--cControl--cSelItem--cInputFake--imgbank">
				</div>
				<input type="text" class="cformAddAccountBank--form--cControl--cSelItem--inputVal" readonly id="selListallBanks--input">
				<img class="cformAddAccountBank--form--cControl--cSelItem--icon" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
				<span id="msgerrorNounSelBank"></span>
				<ul class="cformAddAccountBank--form--cControl--cSelItem--MenuListBanks" id="listAllsBanks"></ul>
			</div>
		</div>
		<div class="cformAddAccountBank--form--cControl">
			<label for="numaccount-cli" class="cformAddAccountBank--form--cControl--label">Número de cuenta</label>
			<input type="text" id="numaccount-cli" maxlength="14" required name="numaccount-cli" class="cformAddAccountBank--form--cControl--input" placeholder="Ingresa tu nro. de cuenta">
			<span id="msgerrorNounNumAccount"></span>
			<span class="cformAddAccountBank--form--cControl--span">* Entre 13 y 14 caracteres</span>
		</div>
		<div class="cformAddAccountBank--form--cControl">
			<label for="typeaccount-cli" class="cformAddAccountBank--form--cControl--label">Tipo de cuenta</label>
			<div class="cformAddAccountBank--form--cControl--cSelItem" id="selListallTypeAccouts">
				<div class="cformAddAccountBank--form--cControl--cSelItem--cInputFake" id="newValTypeAccount">
					<span class="cformAddAccountBank--form--cControl--cSelItem--cInputFake--placeholder">Selecciona el tipo de cuenta</span>
				</div>
				<input type="text" class="cformAddAccountBank--form--cControl--cSelItem--inputVal" readonly id="selListtypeAccount--input">
				<img class="cformAddAccountBank--form--cControl--cSelItem--icon" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
				<span id="msgerrorNounSelTypeAccount"></span>
				<ul class="cformAddAccountBank--form--cControl--cSelItem--MenuListTypeAccounts" id="listtypesAccount"></ul>
			</div>
		</div>
		<div class="cformAddAccountBank--form--cControl">
			<label for="typecurrent-cli" class="cformAddAccountBank--form--cControl--label">Moneda</label>
			<div class="cformAddAccountBank--form--cControl--cSelItem" id="selListallCurrencyTypes_by_tcurrent">
				<div class="cformAddAccountBank--form--cControl--cSelItem--cInputFake" id="newValCurrencyType">
					<span class="cformAddAccountBank--form--cControl--cSelItem--cInputFake--placeholder">Selecciona la moneda</span>
				</div>
				<input type="text" class="cformAddAccountBank--form--cControl--cSelItem--inputVal" readonly id="selListcurrencyType--input">
				<img  class="cformAddAccountBank--form--cControl--cSelItem--icon" src="<?= $url ?>views/assets/img/svg/arrow-bottom-dashboard.svg" alt="">
				<span id="msgerrorNounSelCurrentType"></span>
				<ul class="cformAddAccountBank--form--cControl--cSelItem--MenuListCurrencyTypes" id="listcurrencytypes"></ul>
			</div>
		</div>
		<div class="cformAddAccountBank--form--cControl">
			<label for="aliasaccount-cli" class="cformAddAccountBank--form--cControl--label">Alias de la cuenta</label>
			<input type="text" id="aliasaccount-cli" required name="aliasaccount-cli" class="cformAddAccountBank--form--cControl--input" placeholder="nombre + banco + moneda">
			<span id="msgerrorNounAliasAccount"></span>
		</div>
		<div class="cformAddAccountBank--form--cControlcheck">
			<input type="checkbox" id="checkaccount-cli" required>
			<label for="checkaccount-cli">Declaro que es mi cuenta personal o de mi empresa.</label>
			<span id="msgerrorNouncheckedAccount"></span>
		</div>
		<button type="submit" class="cformAddAccountBank--form--cBtnAddAccount" id="btn-AddAccountBank">Agregar cuenta</button>
	</form>
</div>