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
    dataAssis = [];
    rol_maxi = false;
    var modUser = false;
    var modProducts = false;
    var modOrder = false;
    var modQuation = false;
    var modRoute = false;
    var modAsis = false;


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
  if ($("#checkassistance").prop("checked")) {
    modAsis=true;
  }
    dataReal = new Object();
    dataReal['rol_name']=rolName;
    dataReal['rol_maxi']=rol_maxi;
if (modUser==true || modProducts==true || modOrder==true || modQuation==true || modRoute==true || modAsis ==true) {
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
    if (modAsis==true) {
      dataReal["mod_assis"]={"ver": 1 , "crear":1,"modificar":1 , "eliminar":1};
    }
    $.ajax({
      url: "nuevo-rol",
      type: "POST",
      dataType:'json',
      data: ({data: dataReal}),
      success: function(result){
        console.log(result);
        if (result==true) {
          $('#frmNewRol').after('<div class="message">Registrado Exitosamente</div>');
          $('#frmNewRol')[0].reset();
          $('#datatableRoles').load('index.php?controller=datatables&a=roles');
          $(".wrap--perms").addClass("perms--hide");
          $(".wrap--permsprod").addClass("perms--prod");
          $(".wrap--permspedi").addClass("perms--pedi");
          $(".wrap--permscot").addClass("perms--cot");
          $(".wrap--permsruta").addClass("perms--ruta");
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

}else{
  $('#frmNewRol').after('<div class="message">Selecciona minimo un módulo </div>');
  setTimeout(function(){
    $('div.message').remove();
  }, 2000);
}

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
      var ini = $("#inicio").val();
      var fin = $("#fin").val();
      if (primerNumero!=""&& secundoNumero!=""&&  whatsapp!=""&&  correo!=""&&  direccion!="" && ini!="" && fin !="") {
        $.ajax({
          url: "nuevo_dato_contacto",
          type: "POST",
          dataType : "json",
          data: ({num1:primerNumero, num2:secundoNumero, wpp:whatsapp, correo:correo, dirc:direccion,inicio : ini , fi:fin }),
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
      $("#inicio").val(response[0].gw_hora_inicio);
      $("#fin").val(response[0].gw_hora_fin);
    },
    error:function(response) {
      console.log(response);
    }
  });
}

//Update Bussines
$("#micro_des").on("keyup", function() {
  var caracterMicro=$('#micro_des').val().length;
  console.log(caracterMicro);
  if (caracterMicro > 100 || caracterMicro <= 0) {
    alert("el contenido no debe tener mas de 100 caracteres")
  }
});
$("#mision").on("keyup", function() {
  var caracterMision = $("#mision").val();
  console.log(caracterMision.length);
  if (caracterMision>300|| caracterMicro <= 0) {
    alert("el contenido no debe tener mas de 300 caracteres")
  }
});
$("#vision").on("keyup", function() {
  var caracterVision = $("#vision").val().length;
  console.log(caracterVision);
  if (caracterVision>340|| caracterMicro <= 0) {
    alert("el contenido no debe tener mas de 340 caracteres")
  }
});
$("#pma").on("keyup", function() {
  var caracterPma = $("#pma").val().length;
  console.log(caracterPma);
  if (caracterPma>300|| caracterPma <= 0) {
    alert("el contenido no debe tener mas de 300 caracteres")
  }
});
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


// modificar rol
$("#frmUpdateRol").submit(function(e) {
    e.preventDefault();
    dataUser = [];
    dataProducts = [];
    dataOrder = [];
    dataQuation = [];
    dataRoutes = [];
    dataAssis = [];
    rol_maxi = false;
    var modUser = false;
    var modProducts = false;
    var modOrder = false;
    var modQuation = false;
    var modRoute = false;
    var modAsis = false;


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
  if ($("#checkassistance").prop("checked")) {
    modAsis=true;
  }
    dataReal = new Object();
    dataReal['rol_name']=rolName;
    dataReal['rol_maxi']=rol_maxi;
if (modUser==true || modProducts==true || modOrder==true || modQuation==true || modRoute==true || modAsis ==true) {
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
    if (modAsis==true) {
      dataReal["mod_assis"]={"ver": 1 , "crear":1,"modificar":1 , "eliminar":1};
    }
    $.ajax({
      url: "modificar-rol",
      type: "POST",
      dataType:'json',
      data: ({data: dataReal}),
      success: function(result){
        console.log(result);
        if (result==true) {
          $('#frmUpdateRol').after('<div class="message">Modificado Exitosamente, algunos cambios se veran reflejados cuando ingreses al sistema de nuevo.</div>');
        }else{
          $('#frmNewRol').after('<div class="message">'+result+'</div>');
        }
        setTimeout(function(){
          $('div.message').remove();
        }, 6000);
      },
      error: function(result){
        console.log(result);
      }
    });
}else{
  $('#frmUpdateRol').after('<div class="message">Selecciona minimo un módulo </div>');
  setTimeout(function(){
    $('div.message').remove();
  }, 3000);
}

});
// eliminar rol
function confirmDeleteRole(rol){
  if (confirm("¿Eliminar este rol?")) {
    $.ajax({
      url:"eliminar-rol",
      type:"post",
      dataType:"json",
      data:({rol:rol}),
      success:function(result){
        console.log(result);
        if (result==true) {
          $('#datatableRoles').after('<div class="message">Eliminado Exitosamente </div>');
          $('#datatableRoles').load('index.php?controller=datatables&a=roles');
        }else{
          $('#datatableRoles').after('<div class="message">'+result+' </div>');
        }
        setTimeout(function(){
          $('div.message').remove();
        }, 4000);
      },
      error:function(result){console.log(result);}
    });
  }
}
