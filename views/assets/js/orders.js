// $(".close--modal").click(function() {
//   $("#viewDetail").hide();
//   console.log("putos");
// });
//autocomplete
$.ajax({
  url:"todas-referencias",
  type:"post",
  dataType:"json",
  success:function(result){
    $( "#producto" ).autocomplete({
      source: result
    });
  },
  error:function(result){console.log(result);}
});
//ocultar inputs
$(".hide--service").hide();
$(".hide--cantidad").hide();
$(".hide--obs").hide();
$("#orderSiguiente").hide();
$("#orderSiguiente-mobile").hide();
//OCULTAR BOTONES DE NAVEGACION
$("#next").hide();
$("#back").hide();
$("#otroProducto").hide();

//VALIDAR SI EXISTE LA REFERENCIA
$("#searchPro").click(function(){
  $.ajax({
      url: "index.php?controller=config&a=selectServices",
      type: "POST",
      dataType:'json',
      data: ({data: $("#producto").val()}),
      success: function(result){
        if (result=='No existe Este producto') {
                  $("#producto").after('<div class="message-red">Este producto no existe</div>');
                  $("#producto").addClass("inputred");
                  $("#labelProducto").addClass("alertRed");
                  setTimeout(function(){
                    $("div.message-red").remove();
                  },3000);
                  $(".hide--service").hide();
                  $(".hide--cantidad").hide();
                  $(".hide--obs").hide();
                  $("#orderSiguiente").hide();
        }else{
          //mostrar y llenar el select de servicios
          $("#producto").removeClass("inputred");
          $("#labelProducto").removeClass("alertRed");
          $(".hide--service").show();
          $(".hide--cantidad").show();
          $(".hide--obs").show();
          $("#servicio").empty();
            var selector = document.getElementById('servicio');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].tip_ser_nombre,result[i].tip_ser_cod);
            }
        }
      }
  });
});
//VALIDAR SI LOS CAMPOS ESTAN LLENOS
$("#cant").keyup(function(){
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cant").val()!="" && $("#cant").val()>0) {
      $("#orderSiguiente").show();
      $("#otroProducto").show();
  }else{
    $("#orderSiguiente").hide();
    $("#otroProducto").hide();
  }
});
$("#cantMobile").keyup(function(){
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cantMobile").val()!="" && $("#cantMobile").val()>0) {
      $("#orderSiguiente-mobile").show();
      $("#otroProducto").show();
  }else{
    $("##orderSiguiente-mobile").hide();
    $("#otroProducto").hide();
  }
});

//GUARDAR
var order = new Object();
var indice = 0;
var indice_actual = 0;
$("#otroProducto").click(function(){
  //funcion guardar
  guardar();
  //borrar campos y ocultarlos
  $("#producto").val("");
  $("#servicio").val("");
  $("#cant").val("");
  $("#cantMobile").val("");
  $("#observ").val("");
  $(".hide--service").hide();
  $(".hide--cantidad").hide();
  $(".hide--obs").hide();
  $("#otroProducto").hide();
  //mostrar boton "back"
  $("#back").show();
  //ocultar next
  $("#next").hide();
  console.log(order);
});
//MOSTRAR ANTERIOR
$("#back").click(function(){
  //validar pagina
  if (indice_actual==1) {
    indice_actual = (indice_actual-1);
    $("#back").hide();
  }else{
    indice_actual = (indice_actual-1);
    $("#back").show();
  }
  $("#producto").val(order[indice_actual].producto);
  $("#servicio").val(order[indice_actual].servicio);
  $("#cant").val(order[indice_actual].cantidad);
  $("#observ").val(order[indice_actual].obs);
  $(".hide--service").show();
  $(".hide--cantidad").show();
  $(".hide--obs").show();
  $("#otroProducto").show();
  //boton next
  showNext();
});
//MOSTRAR SIGUIENTE
$("#next").click(function(){
  //validar pagina
    indice_actual = indice_actual+1;
    $("#producto").val(order[indice_actual].producto);
    $("#servicio").val(order[indice_actual].servicio);
    $("#cant").val(order[indice_actual].cantidad);
    $("#observ").val(order[indice_actual].obs);
    $(".hide--service").show();
    $(".hide--cantidad").show();
    $(".hide--obs").show();
    $("#otroProducto").show();
    showNext();
  //mostrar boton back
  if (indice_actual==0) {
    $("#back").hide();
  }else{
    $("#back").show();
  }
});
//MOSTRAR BOTON NEXT
function showNext(){
  if (indice_actual==(indice-1)) {
    $("#next").hide();
  }else{
    $("#next").show();
  }
}
//BOTON TERMINAR
$("#orderSiguiente").click(function(){
  //validar si hay que guardar
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cant").val()!=""  && $("#cant").val()>0) {
    guardar();
  }
});
//cuando le de orderAtras
$("#orderAtras").click(function(){
  indice_actual=indice_actual-1;
});
//guardar en el array
function guardar() {
  if (order[indice_actual]==undefined) {
        //si no existe
        order[indice]={'producto':$("#producto").val(), 'servicio':$("#servicio").val(), 'cantidad':$("#cant").val() ,'obs':$("#observ").val()};
        //Aumentar indice
        indice++;
        indice_actual++;
  }else{
    // si existe
    order[indice_actual]={'producto':$("#producto").val(), 'servicio':$("#servicio").val(), 'cantidad':$("#cant").val() ,'obs':$("#observ").val()};
    //igualar inidice
    indice_actual=indice;
  }
}
//NUEVA direccion
var direccion = "default";
//llenar el select de Ciudad
if (document.getElementById('ciudad')) {
    $.ajax({
        url: "index.php?controller=config&a=selectCity",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('ciudad');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].ciu_nombre,result[i].id_ciudad);
            }
        }
    });
}
//consultar ciudad
$("#newDir").click(function(){
  direccion = $("#dirSent").val();
  $.ajax({
      url: "index.php?controller=config&a=selectCityBy",
      type: "POST",
      dataType:'json',
      data : ({ id: $("#ciudad").val() }),
      success: function(result){
        $("#orderDir").html(result.ciu_nombre+', '+$("#dirSent").val());
        $("#modal_dir").hide();
      }
  });
});
//enviar los datos a PHP
$("#confirmOrder").click(function(){
  $.ajax({
      url: "realizar-pedido",
      type: "POST",
      dataType:'json',
      data: ({data: order, ciudad: $("#ciudad").val() ,dir : direccion , dia : $("#fechaEntrega").val() , hora : $("#horaEntrega").val()}),
      success: function(result){
        console.log(result);
        if (result==true) {
          $("#frmNewOrder")[0].reset();
          delete order;
          location.href = "historial" ;
        }else{
          // $("div.message").remove()
          $(".form-groupuser-btnBlue").after("<div class='container-red'>"+result+"</div>");
          setTimeout(function(){$("div.container-red").remove()},5000);
        }
      },
      error:function(result) {
        console.log(result);
      }
  });
});
//ver pedido
$("#viewOrder").click(function() {
  $.ajax({
    url:"vista-previa",
    type:"post",
    dataType:"json",
    data:({data:order}),
    success: function(result){
      console.log(result);
      $("#wrap-detail").remove();
      $("#viewDetail").after("<div class='modal detailOrder'><div class='modal--container'>"+result+"</div></div>");
    },
    error: function(result){
      console.log(result);
    }
  });
});


if (document.getElementById('typeProduct')) {
  $.ajax({
      url: "index.php?controller=config&a=selectAllServices",
      type: "POST",
      dataType:'json',
      success: function(result){
          var selector = document.getElementById('typeProduct');
          for (var i = 0; i < result.length; i++) {
              selector.options[i] = new Option(result[i].tip_pro_nombre,result[i].tip_pro_codigo);
          }
      },
      error:function(result){
        console.log(result);
      }
  });
}
//search opction

$("#close_modal_search").click(function(){
  $("#modalSearch").css({"display":"none"});
});
$("#openSearch").click(function(){
  $("#modalSearch").css({"display":"flex"});
});
//ocultar elemento
$(".result").hide();
$("#tabla").hide();
$("#frmOptionSearch").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:"opciones-busqueda-referencia",
    type:"post",
    dataType:"json",
    data:({data:$("#optionSearch").val()}),
    success:function(result){
      $(".itemResult").remove();
      if (result.length>0) {
            //añadir tds
            var i = 0;
            $.each(result,function(){
              var tds=$("#tabla tr:first td").length;
              var trs=$("#tabla tr").length;
              var nuevaFila="<tr class='itemResult'>";
              nuevaFila+="<td>"+result[i].pro_referencia+"</td>";
              nuevaFila+="<td>"+result[i].tip_pro_nombre+"</td>";
              nuevaFila+="<td>"+result[i].mar_nombre+"</td>";
              nuevaFila+="<td>"+result[i].pro_descripcion+"</td>";
              nuevaFila+="<td>"+result[i].opc_bus_tags+"</td>";
              nuevaFila+='<td> <a href="#" id="'+result[i].pro_referencia+'" onclick="seleccionarProducto(this)">Agregar</a></td>';
              nuevaFila+="</tr>";
              $("#tabla").append(nuevaFila);
              i++;
            });
            $("#tableResult").remove();
            $(".result").append(result);
            console.log(result);
            $("#tabla").show();
            $("#message").html("Cual es tu Producto?");
            $(".result").show();
      }else{
          $("#tabla").hide();
          $("#message").html("No se encontrarón resultados.");
          $(".result").show();

      }
      },
    error:function(result){
      console.log(result);
    }
  });
});
function seleccionarProducto(ele){
  $("#optionSearch").val(" ");
  $("#producto").val(ele.id);
  $("#modalSearch").css({"display":"none"});
  $(".hide--service").hide();
  $(".hide--cantidad").hide();
  $(".hide--obs").hide();
}
if ($("#producto").val()!="") {
  $("#searchPro").click();
}
