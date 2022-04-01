<div class="cListDetailsTransactions">
	<div class="cListDetailsTransactions--contDetails">
		<input type="hidden" id="input-idClientValListTransac" value="<?= $_SESSION['cli_micambista'][0]['id']; ?>">
		<div class="cListDetailsTransactions--contDetails--iconclose" id="btnCloseTransacRight">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</div>
		<div class="cListDetailsTransactions--contDetails--c">
			<div class="cListDetailsTransactions--contDetails--c--DetailOP">
				<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
					<h3>Detalles de la operación</h3>
				</div>
				<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
					<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
						<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
							<p>Estado:</p>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus">
							 <span id="t-statusTransCli"></span>
							</div>
						</li>
						<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
							<p>Pedido:</p>
							<span id="t-codigoTransCli"></span>
						</li>
						<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
							<p>Solicitado:</p>
							<p id="t-solicitedTransCli"></p>
						</li>
						<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
							<p>Tasa de cambio:</p>
							<span id="t-tasaTransCli"></span>
						</li>
						<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
							<p>Cuenta que recibe:</p>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
								<img src="" alt="" id="t-imgbankTransCli">
								<span id="t-naccountTransCli"></span>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="cListDetailsTransactions--contDetails--c--CompleteOP">
				<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cTitle">
					<h3>Completa tu operación</h3>
					<input type="hidden" id="t-idTransferBank">
				</div>
				<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails">
					<ul class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m">
						<li class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item">
							<p>Cuenta a transferir:</p>
							<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank">
								<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
									<img src="" alt="" id="t-imgbankPlatformtransfer">
									<p>
										<span id="t-numbankPlatformtransfer"></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
									</p>
								</div>
								<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
									<p>Mi Cambista S.A.C - RUC <span id="t-rucbankPlatformtransfer"></span></p>
								</div>
								<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
									<p>Monto a enviar:</p>
									<p>
										<span id="t-transferedTransCli"></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
									</p>
								</div>
							</div>
						</li>
					</ul>
					<form method="POST" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form">
						<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control">
							<input type="text" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control--input" placeholder="Número de transferencia">
							<button type="submit" class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--form--control--btnCTransac">Agregar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<a href="#" class="cListDetailsTransactions--contDetails--c--btnclose">Aceptar</a>
	</div>
</div>