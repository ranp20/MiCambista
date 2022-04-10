$(function(){
  listCoupons();
});
// ------------ FUNCIÓN - LIMITAR A DOS DECIMALES SIN REDONDEO
function twodecimals(n) {
  let t = n.toString();
  let regex = /(\d*.\d{0,2})/;
  return t.match(regex)[0];
}
// ------------ ESCRITURA EN EL INPUT DE DESCUENTO
$(document).on("input", "input[data-format='twodecimals']", function(e){
  ($(this).val() == "") ? $(this).val() : $(this).val(twodecimals(e.target.value));
});
// ------------ AGREGAR BANCO
$(document).on('submit', '#form-add-coupon', function(e){
  e.preventDefault();
  var formdata = new FormData();
  formdata.append("code_coupon", $('#code_coupon').val());
  formdata.append("percent_desc", $('#percent_desc').val());
  $.ajax({
    url: "../admin/controllers/c_add-coupon.php",
    method: "POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
  }).done((e) => {
    if(e == "true"){
      $('#form-add-coupon')[0].reset();
      listCoupons();
      $('#addcouponModal').modal("hide");
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
      template = `
        <tr>
          <td colspan="7">
            <div class="msg-non-results-res">
              <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="img_noun-img" class="msg-non-results-res__icon">
              <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
            </div>
          </td>
        </tr>
      `;
    }else{
      var response = JSON.parse(res);
      if(response.length == 0){
        template = `
          <tr>
            <td colspan="7">
              <div class="msg-non-results-res">
                <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="img_noun-img" class="msg-non-results-res__icon">
                <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
              </div>
            </td>
          </tr>
        `;
      }else{
        $.each(response, function(i,e){
          template += `
            <tr id="item-${e.id}">
              <td class='center'>${e.id}</td>
              <td class='center'>${e.code_coupon}</td>
              <td class='center'>${e.percent_desc}</td>
              <td class="cont-btn-update">
                <a class="btn-update-coupon" data-toggle="modal" data-target="#updateModal"  href="#" 
                  data-id="${e.id}"
                  data-code_coupon="${e.code_coupon}"
                  data-percent_desc="${e.percent_desc}"
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
      percent_desc: $(this).attr('data-percent_desc'),
    };
    $('#idupdate-coupon').val(item_data['id']);
    $('#code_coupon-update').val(item_data['code_coupon']);
    $('#percent_desc-update').val(item_data['percent_desc']);
  });
});
// ------------ ACTUALIZAR POR ID
$(document).on('submit', '#form-update-coupon', function(e){
  e.preventDefault();
  var formdata = new FormData();
  formdata.append("code_coupon", $('#code_coupon-update').val());
  formdata.append("percent_desc", $('#percent_desc-update').val());
  formdata.append("id", $('#idupdate-coupon').val());

  $.ajax({
    url: "../admin/controllers/c_update-coupon.php",
    method: "POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false
  }).done((e) => {
    if(e == "true"){
      listCoupons();
      $('#updateModal').modal("hide");
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