$(function(){
  listClients();
});
/************************** LISTAR BANCOS **************************/
function listClients(searchVal){ 
  $.ajax({
    url: "admin/controllers/c_list-clients.php",
    method: "POST",
    datatype: "JSON",
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: {searchList : searchVal},
  }).done( function (res) {

    var response = JSON.parse(res);
    var template = "";

    if(response.length == 0){
      template = `
        <tr>
          <td colspan="8">
            <div class="msg-non-results-res">
              <img src="admin/assets/img/icons/icon-sad-face.svg" alt="" class="msg-non-results-res__icon">
              <h3 class="msg-non-results-res__title">No se encontraron resultados...</h3>
            </div>
          </td>
        </tr>
      `;

      $("#tbl_clients").html(template);
    }else{
      response.forEach(e => {

      template += `
        <tr id="item-${e.id}">
          <td class='center'>${e.id}</td>
          <td class='center'>${e.email}</td>
          <td class='center'>${e.telephone}</td>
          <td class='center'>${e.name}</td>
          <td class='center'>${e.lastname}</td>
          <td class='center'>${e.type}</td>
          <td class='center'>${e.document}</td>
          <td class='center'>${e.sex}</td>
        </tr>
        `;
      });
      
      $("#tbl_clients").html(template);
    }

  });
}

// /************************** BUSCADOR DE RESTAURANTES **************************/
$(document).on('keyup', '#searchclients', function() {
  var searchVal = $(this).val();

  if(searchVal != ""){
    listClients(searchVal);
  }else{
    listClients();
  }
});