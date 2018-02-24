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
//quotation
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
  if ($("#producto").val()!=""  && $("#servicio").val()!="" && $("#cant").val()!="") {
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
$("#sendQuotation").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url:"vista-previa",
      type:"post",
      dataType:"json",
      data:({data:order}),
      success: function(result){
        dataJson = [];
        $("input[name=data_user]").each(function(){
            structure = {};
            structure = $(this).val();
            dataJson.push(structure);
        });
        dataJson.push($("#obser").val());
        $.ajax({
            url: "realizar-cotizacion-usuario",
            type: "POST",
            dataType:'json',
            data: ({data : dataJson ,all : result}),
            beforeSend:function() {
              $("#sendQuotation").after('<div class="message-quotation">Validando...</div>');
            },
            success: function(result){
                // modal.style.display = "none";
                $("div.message-quotation").remove();
                if (result==true) {
                    $("#sendQuotation")[0].reset();
                    $("#frmNewOrder")[0].reset();
                    delete quotation;
                    $("#sendQuotation").after('<div class="message-quotation">Tu cotización ha sido enviada</div>');
                    //ocultar inputs
                    $(".hide--service").hide();
                    $(".hide--cantidad").hide();
                    $(".hide--obs").hide();
                    $("#orderSiguiente").hide();
                    //OCULTAR BOTONES DE NAVEGACION
                    $("#next").hide();
                    $("#back").hide();
                    $("#otroProducto").hide();

                    setTimeout(function(){$("#modalConfir").hide();},3000);
                }else{
                    $("#openModal").after('<div class="message-quotation">'+result+'</div>');
                }
                setTimeout(function(){
                  $("div.message-quotation").remove();
                },6000);
                 // console.log(result);
            },
            error: function(result){
                 console.log(result);
            }
        });
      },
      error: function(result){
        console.log(result);
      }
    });
});
