$("#saveStyle").click(function() {
  if ($("#styleButton").prop("checked")) {
      var style = new Object();
      style = {"menu":'main--navdark ',"navigator" : 'navigatordark' ,"menu_top" : 'menu--toposcuro'};
  }else{
    style = {"menu":' ',"navigator" : '  ' ,"menu_top" : ' '};
  }
  $.ajax({
    url: "cambiar-estilo",
    type: "POST",
     dataType:'json',
     data: ({data: style}),
     success: function(result){
        console.log(result);
        if (result==true) {
          $('#saveStyle').after('<div class="message">Disfurta de tu nuevo estilo!</div>');
          // $('#frmNewRol')[0].reset();
        }else{
          $('#saveStyle').after('<div class="message">'+result+'</div>');
        }
        setTimeout(function(){
           $('div.message').remove();
         }, 2000);
     },
     error: function(result){
        console.log(result);
     }
  });
});

$("#frmNewRol").submit(function(e) {
    e.preventDefault();
    dataUser = [];
    dataProducts = [];
    dataOrder = [];
    dataQuation = [];
    dataRoutes = [];
    rol_maxi = false;
    var modUser = false;
    var modProducts = false;
    var modOrder = false;
    var modQuation = false;
    var modRoute = false;


    $("input[name=data-rol-maxi]").each(function(){
      if ($(this).prop("checked")) {
            rol_maxi = true;
        }else{
            rol_maxi = false;
        }
    });





    var rolName = $("input[name=data-rol-name]").val();
    $("input[name=data-rol-users]").each(function(){
        if ($(this).prop("checked")) {
            dataUser.push($(this).val());
            modUser = true;
        }else{
             dataUser.push(0);
        }
    });
    $("input[name=data-rol-products]").each(function(){
        if ($(this).prop("checked")) {
            dataProducts.push($(this).val());
            modProducts = true;
        }else{
             dataProducts.push(0);
        }
    });
    $("input[name=data-rol-order]").each(function(){
        if ($(this).prop("checked")) {
            dataOrder.push($(this).val());
            modOrder = true;
        }else{
             dataOrder.push(0);
        }
    });
    $("input[name=data-rol-quoation]").each(function(){
        if ($(this).prop("checked")) {
            dataQuation.push($(this).val());
            modQuation = true;
        }else{
             dataQuation.push(0);
        }
    });
    $("input[name=data-rol-routes]").each(function(){
        if ($(this).prop("checked")) {
            dataRoutes.push($(this).val());
            modRoute = true;
        }else{
             dataRoutes.push(0);
        }
    });
    dataReal = new Object();
    dataReal['rol_name']=rolName;
    dataReal['rol_maxi']=rol_maxi;

    if (modUser==true) {
        dataReal["mod_user"]={"ver": 1 , "crear":dataUser[0],"modificar":dataUser[1] , "eliminar":dataUser[2]};
    }
    if (modProducts==true) {
         dataReal["mod_products"]={"ver": 1 , "crear":dataProducts[0],"modificar":dataProducts[1] , "eliminar":dataProducts[2]};
    }
    if (modOrder==true) {
        dataReal["mod_orders"]={"ver": 1 , "crear":dataOrder[0],"modificar":dataOrder[1] , "eliminar":dataOrder[2]};
    }
    if (modQuation==true) {
        dataReal["mod_quoation"]={"ver": 1 , "crear":dataQuation[0],"modificar":dataQuation[1] , "eliminar":dataQuation[2]};
    }
    if (modRoute==true) {
        dataReal["mod_routes"]={"ver": 1 , "crear":dataRoutes[0],"modificar":dataRoutes[1] , "eliminar":dataRoutes[2]};
    }
    // dataReal.push(rol_maxi);
    // console.log(dataReal);
    // dataReal = {"e":"sa"};
            $.ajax({
              url: "nuevo-rol",
              type: "POST",
               dataType:'json',
               data: ({data: dataReal}),
               success: function(result){
                  console.log(result);
                  if (result==true) {
                    $('#frmNewRol').after('<div class="message">Registrado Exitosamente</div>');
                    // $('#frmNewRol')[0].reset();
                  }else{
                    $('#frmNewRol').after('<div class="message">'+result+'</div>');
                  }
                  setTimeout(function(){
                     $('div.message').remove();
                   }, 2000);
               },
               error: function(result){
                  console.log(result);
               }
            });

});
