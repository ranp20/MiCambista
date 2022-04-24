$(function(){
  listCoupons();
  listRates();
});
function listRates(){
  $.ajax({
    url: "../admin/controllers/c_list-rates.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done((e) => {
    if(e.length < 1){
      console.log("Sin datos");
    }else{
      var r = JSON.parse(e);
      var buy_at_original = r[0].buy_at;
      var sell_at_original = r[0].sell_at;
      $("#buy_price_original").val(buy_at_original);
      $("#buy_price_dismiss").val(buy_at_original);
      $("#buy_price_original-update").val(buy_at_original);
      $("#sell_price_original").val(sell_at_original);
      $("#sell_price_dismiss").val(sell_at_original);
      $("#sell_price_original-update").val(buy_at_original);
    }
  });
}
// ------------ FUNCIÓN - LIMITAR A DOS DECIMALES SIN REDONDEO
function fourdecimals(n) {
  let t = n.toString();
  let regex = /(\d*.\d{0,4})/;
  return t.match(regex)[0];
}
// ------------ FUNCIÓN - VALIDAR NÚMERO NEGATIVOS
function is_numeric(value) {
  return !isNaN(parseFloat(value)) && isFinite(value);
}
// ------------ ESCRITURA EN EL INPUT DE DESCUENTO (TARIFA DE COMPRA) - AGREGAR
$(document).on("input", "#buy_percent_desc", function(e){
  var val = e.target.value;
  var buy_price_original = $("#buy_price_original").val();
  var price_diss = $("#buy_price_dismiss").val();
  if($(this).val() == ""){
    $(this).val();
    $("#buy_price_dismiss").val(buy_price_original);
    $("#buy_price_dismiss").removeClass("invalid-format");
    $("#buy_price_dismiss").removeClass("valid-format");
  }else{
    $(this).val(fourdecimals(val));
    price_diss_calc = buy_price_original - val;
    if((is_numeric(price_diss_calc)) && (price_diss_calc<0)){
      $("#buy_price_dismiss").addClass("invalid-format");
      $("#buy_price_dismiss").removeClass("valid-format");
      $("#buy_price_dismiss").val(0);
      return false;
    }else{
      $("#buy_price_dismiss").removeClass("invalid-format");
      $("#buy_price_dismiss").addClass("valid-format");
      $("#buy_price_dismiss").val(fourdecimals(price_diss_calc));
    }
  }
});
// ------------ ESCRITURA EN EL INPUT DE DESCUENTO (TARIFA DE COMPRA) - ACTUALIZAR
$(document).on("input", "#buy_percent_desc-update", function(e){
  var val = e.target.value;
  var buy_price_original = $("#buy_price_original-update").val();
  var price_diss = $("#buy_price_dismiss-update").val();
  if($(this).val() == ""){
    $(this).val();
    $("#buy_price_dismiss-update").val(buy_price_original);
    $("#buy_price_dismiss-update").removeClass("invalid-format");
    $("#buy_price_dismiss-update").removeClass("valid-format");
  }else{
    $(this).val(fourdecimals(val));
    price_diss_calc = buy_price_original - val;
    if((is_numeric(price_diss_calc)) && (price_diss_calc<0)){
      $("#buy_price_dismiss-update").addClass("invalid-format");
      $("#buy_price_dismiss-update").removeClass("valid-format");
      $("#buy_price_dismiss-update").val(0);
      return false;
    }else{
      $("#buy_price_dismiss-update").removeClass("invalid-format");
      $("#buy_price_dismiss-update").addClass("valid-format");
      $("#buy_price_dismiss-update").val(fourdecimals(price_diss_calc));
    }
  }
});
// ------------ DESENFOQUE EN INPUT DE DESCUENTO (TARIFA DE COMPRA) - AGREGAR
$(document).on("blur", "#buy_percent_desc", function(){
  $("#buy_price_dismiss").removeClass("invalid-format");
  $("#buy_price_dismiss").removeClass("valid-format");
});
// ------------ DESENFOQUE EN INPUT DE DESCUENTO (TARIFA DE COMPRA) - ACTUALIZAR
$(document).on("blur", "#buy_percent_desc-update", function(){
  $("#buy_price_dismiss-update").removeClass("invalid-format");
  $("#buy_price_dismiss-update").removeClass("valid-format");
});
// ------------ ESCRITURA EN EL INPUT DE DESCUENTO (TARIFA DE VENTA) - AGREGAR
$(document).on("input", "#sell_percent_desc", function(e){
  var val = e.target.value;
  var sell_price_original = $("#sell_price_original").val();
  var price_diss = $("#sell_price_dismiss").val();
  if($(this).val() == ""){
    $(this).val();
    $("#sell_price_dismiss").val(sell_price_original);
    $("#sell_price_dismiss").removeClass("invalid-format");
    $("#sell_price_dismiss").removeClass("valid-format");
  }else{
    $(this).val(fourdecimals(val));
    price_diss_calc = sell_price_original - val;
    if((is_numeric(price_diss_calc)) && (price_diss_calc<0)){
      $("#sell_price_dismiss").addClass("invalid-format");
      $("#sell_price_dismiss").removeClass("valid-format");
      $("#sell_price_dismiss").val(0);
      return false;
    }else{
      $("#sell_price_dismiss").removeClass("invalid-format");
      $("#sell_price_dismiss").addClass("valid-format");
      $("#sell_price_dismiss").val(fourdecimals(price_diss_calc));
    }
  }
});
// ------------ ESCRITURA EN EL INPUT DE DESCUENTO (TARIFA DE COMPRA) - ACTUALIZAR
$(document).on("input", "#sell_percent_desc-update", function(e){
  var val = e.target.value;
  var sell_price_original = $("#sell_price_original-update").val();
  var price_diss = $("#sell_price_dismiss-update").val();
  if($(this).val() == ""){
    $(this).val();
    $("#sell_price_dismiss-update").val(sell_price_original);
    $("#sell_price_dismiss-update").removeClass("invalid-format");
    $("#sell_price_dismiss-update").removeClass("valid-format");
  }else{
    $(this).val(fourdecimals(val));
    price_diss_calc = sell_price_original - val;
    if((is_numeric(price_diss_calc)) && (price_diss_calc<0)){
      $("#sell_price_dismiss-update").addClass("invalid-format");
      $("#sell_price_dismiss-update").removeClass("valid-format");
      $("#sell_price_dismiss-update").val(0);
      return false;
    }else{
      $("#sell_price_dismiss-update").removeClass("invalid-format");
      $("#sell_price_dismiss-update").addClass("valid-format");
      $("#sell_price_dismiss-update").val(fourdecimals(price_diss_calc));
    }
  }
});
// ------------ DESENFOQUE EN INPUT DE DESCUENTO (TARIFA DE COMPRA) - AGREGAR
$(document).on("blur", "#sell_percent_desc", function(){
  $("#sell_price_dismiss").removeClass("invalid-format");
  $("#sell_price_dismiss").removeClass("valid-format");
});
// ------------ DESENFOQUE EN INPUT DE DESCUENTO (TARIFA DE COMPRA) - ACTUALIZAR
$(document).on("blur", "#sell_percent_desc-update", function(){
  $("#sell_price_dismiss-update").removeClass("invalid-format");
  $("#sell_price_dismiss-update").removeClass("valid-format");
});
// ------------ AGREGAR COUPON
$(document).on('submit', '#form-add-coupon', function(e){
  e.preventDefault();
  var formdata = new FormData();
  formdata.append("code_coupon", $('#code_coupon').val());
  formdata.append("larger_amounts", $('#larger_amounts').val());
  formdata.append("buy_percent_desc", $('#buy_percent_desc').val());
  formdata.append("buy_output_price", $('#buy_price_dismiss').val());
  formdata.append("sell_percent_desc", $('#sell_percent_desc').val());
  formdata.append("sell_output_price", $('#sell_price_dismiss').val());
  $.ajax({
    url: "../admin/controllers/c_add-coupon.php",
    method: "POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
  }).done((e) => {
    if(e == "true"){
      Swal.fire({
        title: 'Agregado!',
        text: 'El cupón se ha agregado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
      $('#form-add-coupon')[0].reset();
      listCoupons();
      $('#addcouponModal').modal("hide");
    }else if(e == "err_buy_percent_desc"){
      Swal.fire({
        title: 'Error!',
        text: 'El descuento de compra no puede ser menor o igual 0.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }else if(e == "err_sell_percent_desc"){
      Swal.fire({
        title: 'Error!',
        text: 'El descuento de venta no puede ser menor o igual 0.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }else{
      console.log("Error, no se pudo guardar el registro.");
    }
  });
});
// ------------ LISTAR RESULTADOS
function listCoupons(searchVal){ 
  $.ajax({
    url: "../admin/controllers/c_list-coupons.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: {searchList : searchVal},
  }).done( function (res) {
    var template = "";
    if(res == '[]'){
      template = `<tr>
          <td colspan="9">
            <div class="msg-non-results-res">
              <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="img_noun-img" class="msg-non-results-res__icon">
              <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
            </div>
          </td>
        </tr>`;
    }else{
      var response = JSON.parse(res);
      if(response.length == 0){
        template = `<tr>
            <td colspan="9">
              <div class="msg-non-results-res">
                <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="img_noun-img" class="msg-non-results-res__icon">
                <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
              </div>
            </td>
          </tr>`;
      }else{
        $.each(response, function(i,e){
          template += `<tr id="item-${e.id}">
              <td class='center'>${e.id}</td>
              <td class='center'>${e.code_coupon}</td>
              <td class='center'>${e.larger_amounts}</td>
              <td class='center'>
                <span class='format-bold-negative'> - ${e.buy_percent_desc}</span>
              </td>
              <td class='center'>
                <span class='format-bold-positive'> ${e.buy_output_price}</span>
              </td>
              <td class='center'>
                <span class='format-bold-negative'> - ${e.sell_percent_desc}</span>
              </td>
              <td class='center'>
                <span class='format-bold-positive'> ${e.sell_output_price}</span>
              </td>
              <td class="cont-btn-update">
                <a class="btn-update-coupon" data-toggle="modal" data-target="#updateModal"  href="#" 
                  data-id="${e.id}"
                  data-code_coupon="${e.code_coupon}"
                  data-larger_amounts="${e.larger_amounts}"
                  data-buy_percent_desc="${e.buy_percent_desc}"
                  data-buy_price_dismiss="${e.buy_output_price}"
                  data-sell_percent_desc="${e.sell_percent_desc}"
                  data-sell_price_dismiss="${e.sell_output_price}"
                  >Editar</a>
              </td>
              <td class="cont-btn-delete" id="cont-btn-delete">
                <a class="btn-delete-coupon" data-toggle="modal" data-target="#deleteModal" href="#"
                  data-id="${e.id}"
                  >Eliminar</a>
              </td>
            </tr>
            `;
        });
      }
    }
    $("#tbl_coupons").html(template);
  });
}
// ------------ BUSCADOR EN TIEMPO REAL
$(document).on('keyup', '#searchcoupons', function() {
  var searchVal = $(this).val();
  if(searchVal != ""){
    listCoupons(searchVal);
  }else{
    listCoupons();
  }
});
// ------------ LISTAR DATOS EN EL MODAL
$(document).on('click', '.btn-update-coupon', function(e){
  e.preventDefault();
  $.each($(this), function(i, v){
    var item_data = {
      id: $(this).attr('data-id'),
      code_coupon: $(this).attr('data-code_coupon'),
      larger_amounts: $(this).attr('data-larger_amounts'),
      buy_percent_desc: $(this).attr('data-buy_percent_desc'),
      buy_price_dismiss: $(this).attr('data-buy_price_dismiss'),
      sell_percent_desc: $(this).attr('data-sell_percent_desc'),
      sell_price_dismiss: $(this).attr('data-sell_price_dismiss'),
    };
    $('#idupdate-coupon').val(item_data['id']);
    $('#code_coupon-update').val(item_data['code_coupon']);
    $('#larger_amounts-update').val(item_data['larger_amounts']);
    $('#buy_percent_desc-update').val(item_data['buy_percent_desc']);
    $('#buy_price_dismiss-update').val(item_data['buy_price_dismiss']);
    $('#sell_percent_desc-update').val(item_data['sell_percent_desc']);
    $('#sell_price_dismiss-update').val(item_data['sell_price_dismiss']);
  });
});
// ------------ ACTUALIZAR POR ID
$(document).on('submit', '#form-update-coupon', function(e){
  e.preventDefault();
  var formdata = new FormData();
  formdata.append("code_coupon", $('#code_coupon-update').val());
  formdata.append("larger_amounts", $('#larger_amounts-update').val());
  formdata.append("buy_percent_desc", $('#buy_percent_desc-update').val());
  formdata.append("buy_output_price", $('#buy_price_dismiss-update').val());
  formdata.append("sell_percent_desc", $('#sell_percent_desc-update').val());
  formdata.append("sell_output_price", $('#sell_price_dismiss-update').val());
  formdata.append("id", $('#idupdate-coupon').val());

  $.ajax({
    url: "../admin/controllers/c_update-coupon.php",
    method: "POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false
  }).done((e) => {
    console.log(e);
    if(e == "true"){
      Swal.fire({
        title: 'Actualizado!',
        text: 'El cupón se ha actualizado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
      listCoupons();
      $('#updateModal').modal("hide");
    }else if(e == "err_buy_percent_desc"){
      Swal.fire({
        title: 'Error!',
        text: 'El descuento de compra no puede ser menor o igual 0.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }else if(e == "err_sell_percent_desc"){
      Swal.fire({
        title: 'Error!',
        text: 'El descuento de venta no puede ser menor o igual 0.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }else{
      console.log("Error, no se pudo actualizar el registro.");
    }
  });
});
// ------------ LISTAR ID DEL PAÍS EN EL MODAL
$(document).on('click', '.btn-delete-coupon', function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  $('#iddelete-coupon').val(id);
});
// ------------ ELIMINAR PAÍS
$(document).on('click', '#btndelete-coupon', function(e){
  e.preventDefault();
	var id = $('#iddelete-coupon').val();
  $.ajax({
    url: "../admin/controllers/c_delete-coupon.php",
    method: "POST",
    data: {id : id},
  }).done((e) => {
    if(e == "true"){
      $("#item-" + id).remove();
      $('#deleteModal').modal("hide");
      listCoupons();
    }else {
      console.log("Error, no se pudo eliminar el registro");
    }
  });
});