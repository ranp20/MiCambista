$(() => {
	listAllTransactions();
});
$(document).on('change', '#selOpts-OperationsFilter', function(e){
  var optionSel = $(this).find("option:selected").attr("data-short");
  var optionSelText = $(this).find("option:selected").text();
 	$("#title-shortOption").text(optionSelText);
  if(optionSel == "Recents" || optionSel == "Pendings" || optionSel == "Processed"){
  	$("#title-shortOption").removeClass("completed");
  	$("#title-shortOption").removeClass("cancel");
  	$("#title-shortOption").addClass("processed");
  }else if(optionSel == "Completed"){
		$("#title-shortOption").removeClass("processed");
		$("#title-shortOption").removeClass("cancel");
		$("#title-shortOption").addClass("completed");
  }else{
  	$("#title-shortOption").removeClass("completed");
  	$("#title-shortOption").removeClass("processed");
  	$("#title-shortOption").addClass("cancel");
  }
  listAllTransactions(optionSel);
});
var listAllTransactions = (optionSel = null) => {
	var tblOperations = $("#tbl_operations").DataTable({
		"destroy": true,
		"ajax":{
			"url": "../admin/controllers/c_list-operations_byTypeFilter.php",
			"data": { option : optionSel },
    	"type": "POST",
		},
		"columns":[
			{"data":"id"},
			{"data":"code_order"},
			{"data":"amount_send",
	      "render": function ( data, type, row ){
	      	var valOriginal = row.amount_send;
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
	        return row.prefix_send + " " + valFormat;
				}
      },
			{"data":"amount_received",
	      "render": function ( data, type, row ){
	      	var valOriginal = row.amount_received;
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
	        return row.prefix_received + " " + valFormat;
				}
      },
			{"data":"tasa_change"},
			{"data":"status_send",
	      "render": function ( data, type, row ){
	        let statustmp = "";
	        if(data == "Pending"){
	        	statustmp = `<div class='st_transacOpe'>
	        								<span class='st_transacOpe__pending'></span>
	        								<span class='st_transacOpe__pending__text'>En Espera</span>
	        							</div>`;
	        }else if(data == "Completed"){
	        	statustmp = `<div class='st_transacOpe'>
	        								<span class='st_transacOpe__completed'></span>
	        								<span class='st_transacOpe__completed__text'>Finalizado</span>
	        							</div>`;
	        }else if(data == "Cancel"){
	        	statustmp = `<div class='st_transacOpe'>
	        								<span class='st_transacOpe__cancel'></span>
	        								<span class='st_transacOpe__cancel__text'>Cancelada</span>
	        							</div>`;
	        }else{
	        	return row.estado;
	        }
	        return statustmp;
				}
			},
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
		}
	});
};
// ------------ EDITAR LOS ITEMS SELECCINADOS
var listItemSelected = [];
function pushItemSeleted(listItems, idItem){
	var listSel = {
		id: idItem
	}
	listItems.push(listSel);
}
function removeItemSelected(listItems, idItem){
	$.each(listItems, function(i,v){
		if(listItems[i].id == idItem){
			listItems.splice([i],1);
		}
	});
}
$(document).on("click", "#tbl_operations tbody tr", function(e){
	$.each($(this), function(i,v){
		$(this).toggleClass("selected");
		var idItem = $(this).find("td:first-child").text();
		if($(this).hasClass("selected")){
			pushItemSeleted(listItemSelected, idItem);
		}else{
			removeItemSelected(listItemSelected, idItem);
		}
	});

	if(listItemSelected.length != 0 && listItemSelected != "[]"){
		$("#c-action-buttons").addClass("activeSelected");
	}else{
		$("#c-action-buttons").removeClass("activeSelected");
	}
});

$(document).on("click", "#c-allActionsButtons button", function(e){
	var attrIndexButton = "";
	$.each($(this), function(i,v){
		attrIndexButton = $(this).attr("data-action");
	});
	listUpdateItems(listItemSelected, attrIndexButton);
});
// ------------ ACTUALIZAR ITEMS
function listUpdateItems(listAllItems, action){
	let formdata = new FormData();
	formdata.append("id_list", JSON.stringify(listAllItems));
	formdata.append("action", action);
	var optionSel = $("#selOpts-OperationsFilter option:selected").attr("data-short");
	$.ajax({
		url: "../admin/controllers/c_update-operations.php",
		type: "POST",
		data: formdata,
		contentType: false,
    cache: false,
    processData: false,
	}).done((e) => {
		var r = JSON.parse(e);
		if(r.response == "updated"){
			Swal.fire({
        title: 'Acualizado!',
        text: 'El/Los registro(s) se han actualizado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        timer: 3500
      });
      listAllTransactions(optionSel);
		}else{
			Swal.fire({
        title: 'Error!',
        text: 'Lo sentimos, no se pudo actualizar el/los registro(s).',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
      listAllTransactions(optionSel);
		}
	});
}