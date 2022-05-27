$(() => {
	listAllTransactions();
});
var idClient = $("#input-idClientValListTransac").val();
let listAllTransactions = () => {
	var table = $("#all_transac-cli").DataTable({
		"destroy": true,
		"ajax":{
			"url": "controllers/c_list-all-transactions-byIdClient-all.php",
			"data": { id_client : idClient },
    	"type": "POST",
		},
		"columns":[
			{"data":"estado",
	      "render": function ( data, type, row ){
	        let statustmp = "";
	        if(data == "Pending"){
	        	statustmp = `<div class='statusPoint_transac'>
	        								<span class='statusPoint_transac__pending'></span>
	        								<span>espera de pago</span>
	        							</div>`;
	        }else if(data == "Completed"){
	        	statustmp = `<div class='statusPoint_transac'>
	        								<span class='statusPoint_transac__completed'></span>
	        								<span>finalizado</span>
	        							</div>`;
	        }else if(data == "Cancel"){
	        	statustmp = `<div class='statusPoint_transac'>
	        								<span class='statusPoint_transac__cancel'></span>
	        								<span>cancelada</span>
	        							</div>`;
	        }else{
	        	return row.estado;
	        }
	        return statustmp;
				}
			},
			{"data":"codigo"},
			{"data":"fecha"},
			{"data":"solicitado",
	      "render": function ( data, type, row ){
	      	var valOriginal = row.solicitado;
	      	var valOriginalsplit = valOriginal.split(".");
	      	var valOriginalFinal = "";
					var valFormat = "";
					if(valOriginalsplit[1] == undefined || valOriginalsplit[1] == 'undefined' || valOriginalsplit[1] == ""){
						valOriginalFinal = valOriginalsplit[0]+'.00';
					}else	if(valOriginalsplit[1].length < 2){
						valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1]+'0';
					}else{
						valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1];
					}
	      	valFormat = valOriginalFinal.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	        return row.prefijorequest + " " + valFormat;
				}
      },
      {"render": function ( data, type, row ) {
	      return `<a href="javascript:void(0);" data-id="${row.id}" class="btn_ItemEditReg cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--showDetail">
	      					<span class="hidden-xs"> Ver más</span>
	      				</a>`;
	    }},
		],
		"language":{
	    "processing": "Procesando...",
	    "lengthMenu": "Mostrar _MENU_ registros",
	    "zeroRecords": "No se encontraron resultados",
	    "emptyTable": "Ningún dato disponible en esta tabla",
	    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	    "search": "Buscar:",
	    "infoThousands": ",",
	    "loadingRecords": "Cargando...",
	    "paginate": {
	        "first": "Primero",
	        "last": "Último",
	        "next": "Siguiente",
	        "previous": "Anterior"
	    },
	    "aria": {
	        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
	        "sortDescending": ": Activar para ordenar la columna de manera descendente"
	    },
	    "buttons": {
	        "copy": "Copiar",
	        "colvis": "Visibilidad",
	        "collection": "Colección",
	        "colvisRestore": "Restaurar visibilidad",
	        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
	        "copySuccess": {
	            "1": "Copiada 1 fila al portapapeles",
	            "_": "Copiadas %d fila al portapapeles"
	        },
	        "copyTitle": "Copiar al portapapeles",
	        "csv": "CSV",
	        "excel": "Excel",
	        "pageLength": {
	            "-1": "Mostrar todas las filas",
	            "1": "Mostrar 1 fila",
	            "_": "Mostrar %d filas"
	        },
	        "pdf": "PDF",
	        "print": "Imprimir"
	    },
	    "autoFill": {
	        "cancel": "Cancelar",
	        "fill": "Rellene todas las celdas con <i>%d<\/i>",
	        "fillHorizontal": "Rellenar celdas horizontalmente",
	        "fillVertical": "Rellenar celdas verticalmentemente"
	    },
	    "decimal": ",",
	    "searchBuilder": {
	        "add": "Añadir condición",
	        "button": {
	            "0": "Constructor de búsqueda",
	            "_": "Constructor de búsqueda (%d)"
	        },
	        "clearAll": "Borrar todo",
	        "condition": "Condición",
	        "conditions": {
	            "date": {
	                "after": "Despues",
	                "before": "Antes",
	                "between": "Entre",
	                "empty": "Vacío",
	                "equals": "Igual a",
	                "notBetween": "No entre",
	                "notEmpty": "No Vacio",
	                "not": "Diferente de"
	            },
	            "number": {
	                "between": "Entre",
	                "empty": "Vacio",
	                "equals": "Igual a",
	                "gt": "Mayor a",
	                "gte": "Mayor o igual a",
	                "lt": "Menor que",
	                "lte": "Menor o igual que",
	                "notBetween": "No entre",
	                "notEmpty": "No vacío",
	                "not": "Diferente de"
	            },
	            "string": {
	                "contains": "Contiene",
	                "empty": "Vacío",
	                "endsWith": "Termina en",
	                "equals": "Igual a",
	                "notEmpty": "No Vacio",
	                "startsWith": "Empieza con",
	                "not": "Diferente de"
	            },
	            "array": {
	                "not": "Diferente de",
	                "equals": "Igual",
	                "empty": "Vacío",
	                "contains": "Contiene",
	                "notEmpty": "No Vacío",
	                "without": "Sin"
	            }
	        },
	        "data": "Data",
	        "deleteTitle": "Eliminar regla de filtrado",
	        "leftTitle": "Criterios anulados",
	        "logicAnd": "Y",
	        "logicOr": "O",
	        "rightTitle": "Criterios de sangría",
	        "title": {
	            "0": "Constructor de búsqueda",
	            "_": "Constructor de búsqueda (%d)"
	        },
	        "value": "Valor"
	    },
	    "searchPanes": {
	        "clearMessage": "Borrar todo",
	        "collapse": {
	            "0": "Paneles de búsqueda",
	            "_": "Paneles de búsqueda (%d)"
	        },
	        "count": "{total}",
	        "countFiltered": "{shown} ({total})",
	        "emptyPanes": "Sin paneles de búsqueda",
	        "loadMessage": "Cargando paneles de búsqueda",
	        "title": "Filtros Activos - %d"
	    },
	    "select": {
	        "1": "%d fila seleccionada",
	        "_": "%d filas seleccionadas",
	        "cells": {
	            "1": "1 celda seleccionada",
	            "_": "$d celdas seleccionadas"
	        },
	        "columns": {
	            "1": "1 columna seleccionada",
	            "_": "%d columnas seleccionadas"
	        }
	    },
	    "thousands": ".",
	    "datetime": {
	        "previous": "Anterior",
	        "next": "Proximo",
	        "hours": "Horas",
	        "minutes": "Minutos",
	        "seconds": "Segundos",
	        "unknown": "-",
	        "amPm": [
	            "am",
	            "pm"
	        ]
	    },
	    "editor": {
	        "close": "Cerrar",
	        "create": {
	            "button": "Nuevo",
	            "title": "Crear Nuevo Registro",
	            "submit": "Crear"
	        },
	        "edit": {
	            "button": "Editar",
	            "title": "Editar Registro",
	            "submit": "Actualizar"
	        },
	        "remove": {
	            "button": "Eliminar",
	            "title": "Eliminar Registro",
	            "submit": "Eliminar",
	            "confirm": {
	                "_": "¿Está seguro que desea eliminar %d filas?",
	                "1": "¿Está seguro que desea eliminar 1 fila?"
	            }
	        },
	        "error": {
	            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
	        },
	        "multi": {
	            "title": "Múltiples Valores",
	            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
	            "restore": "Deshacer Cambios",
	            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
	        }
	    },
	    "info": "Mostrando _START_ - _END_ de _TOTAL_ registros"
		},
		//"responsive": "false"
	});
};
// ------------ TROZO DE VANILLA JS
((d) => {
	// ------------ CERRAR LA VENTANA - DETALLE DE TRANSACCIÓN
	d.querySelector("#btnCloseTransacRight").addEventListener("click", function(){
		d.querySelector(".cListDetailsTransactions").classList.remove("show");
		d.querySelector(".cListDetailsTransactions--contDetails").classList.remove("show");
	});
	let contsidebarRight = document.querySelector('.cListDetailsTransactions');
	contsidebarRight.addEventListener('click', e => {
		if(e.target === contsidebarRight)	contsidebarRight.classList.remove('show');
	});
})(document);
// ------------ LISTADO DE DETALLES DE LA TRANSACCIÓN - SIDEBARLEFT
$(document).on("click", ".cControlP__cont--containDash--c--cCDashboard--cLeftBoxsLandscape--cLastChange--cList--m--item--showDetail", function(e){
	e.preventDefault();
	$(".cListDetailsTransactions").addClass("show");
	$(".cListDetailsTransactions--contDetails").addClass("show");
	var idTransac = $(this).data("id");
	$.ajax({
		url: "controllers/c_list-details-transac-byIdTrans.php",
		method: "POST",
		dataType: "JSON",
		contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
		data: { id_transaction : idTransac }
	}).done((e) => {
		if(e.length != "" && e.length > 0){
			var tmpDetailTrans = "";
			$.each(e, function(i,v){
				var estado;
				var cuentarequest = v.cuentarequest;
				var limitecuenta = (cuentarequest.length >= 4) ? cuentarequest.replace(cuentarequest.substring(0, 10), "*******") : cuentarequest;
				var pathimgbank = "./admin/views/assets/img/banks/"+v.imgbanksolicitado;
				var pathimgtransferbank = "./admin/views/assets/img/transferbanks/"+v.imgbankplatform;
				// VALOR - SOLICITADO
				let valOriginal = v.solicitado;
      	let valOriginalsplit = valOriginal.split(".");
      	let valOriginalFinal = "";
				let valFormat = "";
				if(valOriginalsplit[1] == undefined || valOriginalsplit[1] == 'undefined' || valOriginalsplit[1] == ""){
					valOriginalFinal = valOriginalsplit[0]+'.00';
				}else	if(valOriginalsplit[1].length < 2){
					valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1]+'0';
				}else{
					valOriginalFinal = valOriginalsplit[0]+"."+valOriginalsplit[1];
				}
      	valFormat = valOriginalFinal.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      	// VALOR - TRANSFERIDO
				let valOriginal_trans = v.transferido;
      	let valOriginal_transsplit = valOriginal_trans.split(".");
      	let valOriginal_transFinal = "";
				let valFormat_trans = "";
				if(valOriginal_transsplit[1] == undefined || valOriginal_transsplit[1] == 'undefined' || valOriginal_transsplit[1] == ""){
					valOriginal_transFinal = valOriginal_transsplit[0]+'.00';
				}else	if(valOriginal_transsplit[1].length < 2){
					valOriginal_transFinal = valOriginal_transsplit[0]+"."+valOriginal_transsplit[1]+'0';
				}else{
					valOriginal_transFinal = valOriginal_transsplit[0]+"."+valOriginal_transsplit[1];
				}
      	valFormat_trans = valOriginal_transFinal.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");

				if(v.estado == "Pending"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus process">
											<span id="t-statusTransCli">espera de pago</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="cListDetailsTransactions--contDetails--c--CompleteOP">
							<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cTitle">
								<h3>Completa tu operación</h3>
								<input type="hidden" id="t-idTransferBank" value="${v.id_transferbank}">
							</div>
							<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item">
										<p>Cuenta a transferir:</p>
										<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank">
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<img src="${pathimgtransferbank}" alt="" id="t-imgbankPlatformtransfer">
												<p>
													<span id="t-numbankPlatformtransfer">${v.naccplatform}</span>
													<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 cursor-pointer"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
												</p>
											</div>
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<p>Mi Cambista S.A.C - RUC <span id="t-rucbankPlatformtransfer">${v.rucplatform}</span></p>
											</div>
											<div class="cListDetailsTransactions--contDetails--c--CompleteOP--cDetails--m--item--cAccBank--item">
												<p>Monto a enviar:</p>
												<p>
													<span id="t-transferedTransCli">${v.prefijosend+" "+valFormat_trans}</span>
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
					`;

				}else if(v.estado == "Cancel"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus cancel">
											<span id="t-statusTransCli">cancelada</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					`;
				}else if(v.estado == "Completed"){
					estado = `<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cStatus complete">
											<span id="t-statusTransCli">finalizada</span>
										</div>`;
					tmpDetailTrans = `
						<div class="cListDetailsTransactions--contDetails--c--DetailOP">
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cTitle">
								<h3>Detalles de la operación</h3>
							</div>
							<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails">
								<ul class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m">
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Estado:</p>
										${estado}
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Pedido:</p>
										<span id="t-codigoTransCli">${v.codigo}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Solicitado:</p>
										<p id="t-solicitedTransCli">${v.prefijorequest+" "+valFormat_trans}</p>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Tasa de cambio:</p>
										<span id="t-tasaTransCli">${v.tasa}</span>
									</li>
									<li class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item">
										<p>Cuenta que recibe:</p>
										<div class="cListDetailsTransactions--contDetails--c--DetailOP--cDetails--m--item--cAccBank">
											<img src="${pathimgbank}" alt="" id="t-imgbankTransCli">
											<span id="t-naccountTransCli">${limitecuenta}</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					`;
				}else{
					estado = "ERROR!";
					tmpDetailTrans = ``;
				}
				
				// $("#t-statusTransCli").text(estado);
				// $("#t-codigoTransCli").text(v.codigo);
				// $("#t-solicitedTransCli").text(v.prefijorequest+" "+v.solicitado);
				// $("#t-tasaTransCli").text(v.tasa);
				// $("#t-naccountTransCli").text(limitecuenta);
				// $("#t-transferedTransCli").text(v.prefijosend+" "+v.transferido);
				// $("#t-imgbankTransCli").attr("src", pathimgbank);
				// $("#t-idTransferBank").val(v.id_transferbank);
				// $("#t-imgbankPlatformtransfer").attr("src", pathimgtransferbank);
				// $("#t-numbankPlatformtransfer").text(v.naccplatform);
				// $("#t-rucbankPlatformtransfer").text(v.rucplatform);
				
			});

			$("#c-detailTransacCli").html(tmpDetailTrans);
		}else{
			console.log('No se envió la respuesta');
		}
	});
});