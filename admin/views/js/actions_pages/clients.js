$(function(){
  listClients();
});
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
      template = `<tr>
          <td colspan="8">
            <div class="msg-non-results-res">
              <img src="../admin/views/assets/img/icons/icon-sad-face.svg" alt="" class="msg-non-results-res__icon">
              <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
            </div>
          </td>
        </tr>`;
      $("#tbl_clients").html(template);
    }else{
      $.each(r, function(i,v){
        template += `<tr id="item-${v.id}">
            <td class='center'>${v.id}</td>
            <td>${v.email}</td>
            <td class='center'>${v.telephone}</td>
            <td>${v.name}</td>
            <td>${v.lastname}</td>
            <td class='center'>${v.type}</td>
            <td class='center'>${v.document}</td>
            <td class='center'>${v.sex}</td>
            <td class='cont-btn-update center'>
              <a class="btn-update-coupon" href="javascript:void(0);">Editar</a>
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