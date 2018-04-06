// ver todos los productos
$("#viewAllProducts").click(function(){
  $("#modalProductsCustomer").css({"display":"flex"});
});
$("#close_modal_producto").click(function(){
  $("#modalProductsCustomer").css({"display":"none"});
});
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
                  $("#error--quoRef").after('<div class="message-red">Este producto no existe</div>');
                  $("#producto").addClass('inputred');
                  $(".labelyellow.error").addClass('alertRed')
                  setTimeout(function(){
                    $("div.message-red").remove();
                  },3000);
                  $(".hide--service").hide();
                  $(".hide--cantidad").hide();
                  $(".hide--obs").hide();
                  $("#orderSiguiente").hide();
        }else{
          //mostrar y llenar el select de servicios
          $(".labelyellow.error").removeClass('alertRed')
          $("#producto").removeClass('inputred')
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
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cant").val()!="" && $("#cant").val()>0) {
    guardar();
  }
  $("#modalConfir").toggle();
  $.ajax({
    url:"vista-previa",
    type:"post",
    dataType:"json",
    data:({data:order}),
    success: function(result){
      console.log(result);
      $("#detalles").empty();
      $("#detalles").append(result);
    },
    error: function(result){
      console.log(result);
    }
  });
});
//cuando le de orderAtras
$("#orderAtras").click(function(){
  indice_actual=indice_actual-1;
  $("#modalConfir").hide();
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
        $("#modal_dir").toggle();
          $("#modalConfir").toggle();
      }
  });
});
//enviar los datos a PHP
$("#confirmOrder").click(function(){
  $.ajax({
      url: "realizar-cotizacion",
      type: "POST",
      dataType:'json',
      data: ({data: order, ciudad: $("#ciudad").val() ,dir : direccion}),
      success: function(result){
        if (result==true) {
          $("#frmNewOrder")[0].reset();
          delete order;
          location.href = "historial";
        }else{
          $("#orderAtras").after("<div class='message'>Ocurrio un error</div>");
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
      $("#viewDetail").after(result);
    },
    error: function(result){
      console.log(result);
    }
  });
});

// modals
if (document.getElementById("modal_dir")) {
var openModal_dir = document.getElementById('btnOtraDir');
var closeModal_dir = document.getElementById('closemodal_dir');
var modal_dir = document.getElementById('modal_dir');
openModal_dir.onclick = function() {
  modal_dir.style.display = "flex";
  console.log('sad');
  $(".modal--dir").toggle();
    $("#modalConfir").toggle();
}
closeModal_dir.onclick = function() {
  modal_dir.style.display= "none";
  $("#modal--dir").toggle();
    $("#modalConfir").toggle();
}
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
//campos numericos
function eliminarLetras(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
if ($("#producto").val()!="") {
  $("#searchPro").click();
}
