$(() => {
  listClients();
  //listAllCoupons();
});
// ------------ LISTAR TODOS LOS CUPONES
/*
var selCoupons = $('#c-contSelectItems__selCoupons');
selCoupons.select2({
  placeholder: "Seleccione un cupón",
  allowClear: true,
  language: {
    noResults: function(){
      return "No existen resultados";  
    },
    searching: function(){
      return "Buscando...";
    }
  }
});
*/
// ------------ LISTAR DATOS EN EL MODAL
$(document).on('click', `a.btn-update-client`, function(e){
  e.preventDefault();
  var item_data = {};
  $.each($(this), function(i, v){
    item_data = {
      id: $(this).attr('data-id'),
      list_AllCoupons: $(this).attr('data-list-coupons')
    };
    $('#idupdate-client').val(item_data['id']);
  });

  var list_AllCoupons = JSON.parse(item_data['list_AllCoupons']);
  //console.log(list_AllCoupons);

  $.ajax({
    url: "../admin/controllers/c_list-coupons.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
  }).done((e) => {
    if(e == "[]"){
      console.log("No tiene cupones");
    }else{
      var r = JSON.parse(e);
      var tmp_coupons = "";
      var tmp_coupons_nonselect = "";
      var sel_coupons = $("#cli_listCoupones");
      var listCoupoesjson = {};

      var result = r.reduce(function (prev, v) {
        var isDuplicate = false;
        for (var i = 0; i < list_AllCoupons.length; i++) {
          if (v.id == list_AllCoupons[i]) {
            isDuplicate = true;
            break;
          }
        }
        if (!isDuplicate) {
          prev.push(v);
        }
        
        return prev;
         
      }, []);
      console.log(result.concat(list_AllCoupons));

      // ------------ LISTAR DATOS EN EL MODAL
      //console.log(list_AllCoupons);
      if(list_AllCoupons.length != 0){
        for (var i = 0; i < r.length; i++){
          for (var j = 0; j < list_AllCoupons.length; j++){
            var coupon_name = $.trim(r[i].code_coupon);
            console.log(list_AllCoupons);
            if(r[i].id == list_AllCoupons[j]){
              console.log("Tiene cupones");
              tmp_coupons += `<div>
                <input type="checkbox" data-id="${r[i].id}" id="coupon-${r[i].id}" name="cli_listcoupons[]" value="${r[i].id}" checked>
                <label for="coupon-${r[i].id}">${coupon_name}</label>
              </div>`;
            }else{
              tmp_coupons += `<div>
                <input type="checkbox" data-id="${r[i].id}" id="coupon-${r[i].id}" name="cli_listcoupons[]" value="${r[i].id}">
                <label for="coupon-${r[i].id}">${coupon_name}</label>
              </div>`;
            }
          }
        }
        sel_coupons.html("");
        sel_coupons.html(tmp_coupons);
        /*
        $.each(r.concat(list_AllCoupons),function(i,v){
          // if(list_AllCoupons[i] != undefined && list_AllCoupons[i] != "undefined"){
          //   listCoupoesjson.push(v);
          // }
          if(v != null){
            listCoupoesjson.push(v);
          };
        });
        console.log(listCoupoesjson);
        */
      }else{
        console.log("No tiene cupones");
        for (var i = 0; i < r.length; i++){
          var coupon_name = $.trim(r[i].code_coupon);
          tmp_coupons += `<div>
            <input type="checkbox" data-id="${r[i].id}" id="coupon-${r[i].id}" name="cli_listcoupons[]" value="${r[i].id}">
            <label for="coupon-${r[i].id}">${coupon_name}</label>
          </div>`;
        }
        sel_coupons.html("");
        sel_coupons.append(tmp_coupons);
      }

      //console.log(listCoupoesjson);
    }
  });
  
});
/*
$.ajax({
  url: "../admin/controllers/c_list-coupons.php",
  method: "POST",
  datatype: "JSON",
  contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
}).done((e) => {
  if(e == "[]"){
    console.log("No hay datos");
  }else{
    var r = JSON.parse(e);
    var item_data = {};
    var tmp_coupons = "";
    var sel_coupons = $("#cli_listCoupones");
    // ------------ LISTAR DATOS EN EL MODAL
    if(e == "[]"){
      console.log("No tiene cupones");
    }else{
      var rcli = JSON.parse(e);
      //if(first_coupons != null && first_coupons != "null" && first_coupons != "" && first_coupons != 0){
        //var id_cupones = JSON.parse(first_coupons);
        $.each(r, function(i,v){
          var coupon_name = $.trim(v.code_coupon);
          var coupon_id = v.id;
          //var id_insert = rcli[i];
          var idcouponcli = rcli[i]['id_coupon'];
          console.log(rcli[i]['id_coupon']);
          //console.log(id_insert.idcoupon);
          if(idcouponcli == coupon_id){
            tmp_coupons += `<div>
              <input type="checkbox" data-id="${v.id}" id="coupon-${v.id}" name="cli_listcoupons[]" value="${v.id}" checked>
              <label for="coupon-${v.id}">${coupon_name}</label>
            </div>`;
          }else{
            tmp_coupons += `<div>
              <input type="checkbox" data-id="${v.id}" id="coupon-${v.id}" name="cli_listcoupons[]" value="${v.id}">
              <label for="coupon-${v.id}">${coupon_name}</label>
            </div>`;
          }
        });
      //}
      sel_coupons.html("");
      sel_coupons.html(tmp_coupons);
    }

    
    $(document).on('click', `a.btn-update-client`, function(e){
      e.preventDefault();
      $.each($(this), function(i, v){
        item_data = {
          id: $(this).attr('data-id')
        };
        $('#idupdate-client').val(item_data['id']);
      });
      console.log(item_data);

      var tmp_coupons = "";
      var sel_coupons = $("#cli_listCoupones");
      $.ajax({
        url: "../admin/controllers/c_list-coupons_byIdClient.php",
        method: "POST",
        datatype: "JSON",
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: {id_client : item_data['id']},
      }).done((e) => {
        if(e == "[]"){
          console.log("No tiene cupones");
        }else{
          var rcli = JSON.parse(e);
          //if(first_coupons != null && first_coupons != "null" && first_coupons != "" && first_coupons != 0){
            //var id_cupones = JSON.parse(first_coupons);
            $.each(r, function(i,v){
              var coupon_name = $.trim(v.code_coupon);
              var coupon_id = v.id;
              //var id_insert = rcli[i];
              var idcouponcli = rcli[i]['id_coupon'];
              console.log(rcli[i]['id_coupon']);
              //console.log(id_insert.idcoupon);
              if(idcouponcli == coupon_id){
                tmp_coupons += `<div>
                  <input type="checkbox" data-id="${v.id}" id="coupon-${v.id}" name="cli_listcoupons[]" value="${v.id}" checked>
                  <label for="coupon-${v.id}">${coupon_name}</label>
                </div>`;
              }else{
                tmp_coupons += `<div>
                  <input type="checkbox" data-id="${v.id}" id="coupon-${v.id}" name="cli_listcoupons[]" value="${v.id}">
                  <label for="coupon-${v.id}">${coupon_name}</label>
                </div>`;
              }
            });
          //}
          sel_coupons.html("");
          sel_coupons.html(tmp_coupons);
        }
      });
    });
    
  }
});
*/
// ------------ LISTAR BANCOS
function listClients(searchVal){ 
  $.ajax({
    url: "../admin/controllers/c_list-clients.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: {searchList : searchVal},
  }).done((e) => {
    var r = JSON.parse(e);
    var template = "";
    if(r.length == 0){
      template = `
      <tr>
        <td colspan="9">
          <div class="msg-non-results-res">
            <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="" class="msg-non-results-res__icon">
            <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
          </div>
        </td>
      </tr>`;
      $("#tbl_clients").html(template);
    }else{
      $.each(r, function(i,v){
        template += `
        <tr id="item-${v.id}">
          <td class='center'>${v.id}</td>
          <td>${v.email}</td>
          <td class='center'>${v.telephone}</td>
          <td>${v.name}</td>
          <td>${v.lastname}</td>
          <td class='center'>${v.type}</td>
          <td class='center'>${v.document}</td>
          <td class='center'>${v.sex}</td>
          <td class='cont-btn-update center'>
            <a class="btn-update-client" data-toggle="modal" data-target="#updateModal" href="javascript:void(0);"
              data-id='${v.id}'
              data-list-coupons='${v.id_coupons}'
            >Editar</a>
          </td>
          <td class='cont-btn-details center'>
            <a class="btn-update-detail" href="detallecliente/${v.id}">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27px" height="27px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m495.6 43.512h-291.2c-16.336 0-32.004 6.4922-43.555 18.043-11.555 11.551-18.043 27.219-18.043 43.559v349.77c0 16.34 6.4883 32.008 18.043 43.559 11.551 11.551 27.219 18.043 43.555 18.043h291.2c16.336 0 32.004-6.4922 43.555-18.043 11.555-11.551 18.043-27.219 18.043-43.559v-349.77c0-16.34-6.4883-32.008-18.043-43.559-11.551-11.551-27.219-18.043-43.555-18.043zm28 411.38c0 7.4258-2.9531 14.551-8.2031 19.801s-12.371 8.1992-19.797 8.1992h-291.2c-7.4258 0-14.547-2.9492-19.797-8.1992s-8.2031-12.375-8.2031-19.801v-349.77c0-7.4258 2.9531-14.551 8.2031-19.801s12.371-8.1992 19.797-8.1992h291.2c7.4258 0 14.547 2.9492 19.797 8.1992s8.2031 12.375 8.2031 19.801z"/><path d="m251.16 266h-27.719c-6.0039 0-11.551 3.2031-14.551 8.3984-3 5.1992-3 11.605 0 16.801 3 5.1992 8.5469 8.4023 14.551 8.4023h27.719c6 0 11.547-3.2031 14.551-8.4023 3-5.1953 3-11.602 0-16.801-3.0039-5.1953-8.5508-8.3984-14.551-8.3984z"/><path d="m476.56 266h-164.13c-6.0039 0-11.551 3.2031-14.551 8.3984-3 5.1992-3 11.605 0 16.801 3 5.1992 8.5469 8.4023 14.551 8.4023h164.13c6.0039 0 11.551-3.2031 14.551-8.4023 3-5.1953 3-11.602 0-16.801-3-5.1953-8.5469-8.3984-14.551-8.3984z"/><path d="m251.16 165.2h-27.719c-6.0039 0-11.551 3.2031-14.551 8.4023-3 5.1953-3 11.602 0 16.797 3 5.1992 8.5469 8.4023 14.551 8.4023h27.719c6 0 11.547-3.2031 14.551-8.4023 3-5.1953 3-11.602 0-16.797-3.0039-5.1992-8.5508-8.4023-14.551-8.4023z"/><path d="m476.56 165.2h-164.13c-6.0039 0-11.551 3.2031-14.551 8.4023-3 5.1953-3 11.602 0 16.797 3 5.1992 8.5469 8.4023 14.551 8.4023h164.13c6.0039 0 11.551-3.2031 14.551-8.4023 3-5.1953 3-11.602 0-16.797-3-5.1992-8.5469-8.4023-14.551-8.4023z"/><path d="m251.16 366.8h-27.719c-6.0039 0-11.551 3.2031-14.551 8.3984-3 5.1992-3 11.602 0 16.801s8.5469 8.3984 14.551 8.3984h27.719c6 0 11.547-3.1992 14.551-8.3984 3-5.1992 3-11.602 0-16.801-3.0039-5.1953-8.5508-8.3984-14.551-8.3984z"/><path d="m476.56 366.8h-164.13c-6.0039 0-11.551 3.2031-14.551 8.3984-3 5.1992-3 11.602 0 16.801s8.5469 8.3984 14.551 8.3984h164.13c6.0039 0 11.551-3.1992 14.551-8.3984s3-11.602 0-16.801c-3-5.1953-8.5469-8.3984-14.551-8.3984z"/></g></svg>
              </span>
            </a>
          </td>
        </tr>`;
      });
      $("#tbl_clients").html(template);
    }
  });
}
// ------------ BUSCADOR DE RESTAURANTES
$(document).on('keyup', '#searchclients', function(e) {
  var searchVal = e.target.value;
  if(searchVal != ""){
    listClients(searchVal);
  }else{
    listClients();
  }
});
// ------------ ACTUALIZAR POR ID
$(document).on('submit', '#form-update-client', function(e){
  e.preventDefault();
  var formdata = $(this).serializeArray();
  //var formdata = new FormData();
  /*
  $.each($("input[name=cli_listcoupons]"), function(i, v){
    if($(this).checked){
      console.log($(this).attr("data-id"));
      //form.append("id_cupones", $(this).attr("data-id"));
    }
  });
  */
  /*
  formdata.append("id_cupones", $("input[name=cli_listcoupons]").val());
  formdata.append("id_client", $("#idupdate-client").val());
  */
  $.ajax({
    url: "../admin/controllers/c_update-client-coupon.php",
    method: "POST",
    dataType: 'JSON',
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: formdata,
    // method: "POST",
    // data: formdata,
    // contentType: false,
    // cache: false,
    // processData: false
  }).done((e) => {
    console.log(e);    
    //window.location.href = "clientes";
    
    if(e.res == "updated"){
      listClients();
      $('#updateModal').modal("hide");
      Swal.fire({
        title: 'Éxito!',
        text: 'El cupón se ha actualizado correctamente.',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
      window.location.href = "clientes";
    }else{
      Swal.fire({
        title: 'Error!',
        text: 'El cupón no se ha actualizado.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  });
});