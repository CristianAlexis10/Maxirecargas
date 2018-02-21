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
// cambiar datos de contacto
//que cuando lo envie se cree la variable e tine todos los metodos de form
$("#form_contacto").submit(function(e){
  e.preventDefault();
  if (confirm("¿Modificar datos de contacto?")) {
      var primerNumero = $("#numer1").val();
      var secundoNumero = $("#numer2").val();
      var whatsapp = $("#wpp").val();
      var correo = $("#correocos").val();
      var direccion = $("#direccion").val();
      if (primerNumero!=""&& secundoNumero!=""&&  whatsapp!=""&&  correo!=""&&  direccion!="") {
        $.ajax({
          url: "nuevo_dato_contacto",
          type: "POST",
          dataType : "json",
          data: ({num1:primerNumero, num2:secundoNumero, wpp:whatsapp, correo:correo, dirc:direccion, }),
          success: function(result){
            if (result==true) {
              $("#form_contacto")[0].reset();
            }
              $("#btn-coso").after("<div class='message'>"+result+"</div>");
          },
          error: function(result) {
            console.log(result);
          }
        });
      }else {
        $("#btn-coso").after("<div class='message'>todos los campos son requeridos</div>");
      }
    }
      setTimeout(function(){
        $(".message").remove();
      },3000);
    });
//llenar datos
if (document.getElementById('numer1')) {
  $.ajax({
    url:"index.php?controller=config&a=dataContact",
    type:"post",
    dataType:"json",
    data:({}),
    success:function(response) {
      $("#numer1").val(response[0].gw_ct_telefono);
      $("#numer2").val(response[0].gw_ct_telefono_2);
      $("#wpp").val(response[0].gw_ct_whatsapp);
      $("#correocos").val(response[0].gw_ct_correo);
      $("#direccion").val(response[0].gw_ct_direccion);
    },
    error:function(response) {
      console.log(response);
    }
  });
}

//Update Bussines
$("#frmProfileBusi").submit(function(e){
    e.preventDefault();
    var data = [];
    $(".dataUptadeBusi").each(function(){
        data.push($(this).val());
    });
    if (confirm("¿Realizar Cambios?")) {
        $.ajax({
            url:"actualizar-datos-empresa",
            type:"post",
            dataType:"json",
            data:({data:data}),
            success:function(result){
                $("#frmProfileBusi").after("<div class='message'>"+result+"</div>");
                setTimeout(function(){
                    $("div.message").remove();
                },3000);
            },
            error:function(result){console.log(result);}
        });
    }
});
