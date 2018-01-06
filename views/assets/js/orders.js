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
$("#producto").keyup(function(){
  $.ajax({
      url: "index.php?controller=config&a=selectServices",
      type: "POST",
      dataType:'json',
      data: ({data: $("#producto").val()}),
      success: function(result){
        if (result=='No existe Este producto') {
                  $("#frmNewOrder").after('<div class="message">Este producto no existe</div>');
                  setTimeout(function(){
                    $("div.message").remove();
                  },3000);
                  $(".hide--service").hide();
                  $(".hide--cantidad").hide();
                  $(".hide--obs").hide();
                  $("#orderSiguiente").hide();
        }else{
          //mostrar y llenar el select de servicios
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
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cant").val()!="") {
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
  //guardar en el array
  console.log(indice_actual);
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
