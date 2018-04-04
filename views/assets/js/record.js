$(".datatable").DataTable();
$( function() {
    $( "#tabs" ).tabs();
});

$("#closeOrderListo").click(function() {
  $(".modales").hide()
});
$("#closeCancel").click(function(){
  $("#modalCancel").hide()
});
//cancelar pedido
var orderToCancel;
function viewCancelOrder(cod){
  orderToCancel = cod;
  $("#modalCancel").show();
}
$("#frmCancelOrder").submit(function(e) {
  if (confirm("¿Desea cancelar este pedido?")) {
      e.preventDefault();
      var reason = $("#motivo").val();
      $.ajax({
        url:"cambiar_estado",
        type:"POST",
        data:({ data : 5 , order : orderToCancel , obs : reason}),
        dataType:"json",
        success:function(result){
          if (result==true) {
            $("#dataOrdenUser").load("index.php?controller=datatables&a=dataTableOrdersUsers");
            $("#frmCancelOrder").after("<div class='message'>Pedido Cancelado</div>");
          }else{
            $("#frmCancelOrder").after("<div class='message'>"+result+"</div>");
          }
          $("#modalCancel").hide();
          setTimeout(function(){$("div.message").remove()},3000);
        },
        error:function(result){
          console.log(result);
        }
      });
      return true;
  }else{
    return false;
  }
});
//eliminar cotizacion
function cancelQuotation(cot){
  if (confirm("¿Deseas eliminar esta cotización?")) {
    $.ajax({
      url:"eliminar-cotizacion",
      type:"post",
      dataType:"json",
      data:({data:cot}),
      success:function(response){
        $("#dataOrdenUser").load("index.php?controller=datatables&a=dataTableQuotation");
        $("#dataQuotrationUser").after("<div class='message'>"+response+"</div>");
        setTimeout(function(){$("div.message").remove()},3000);
      },
      error:function(response){
        console.log(response);
      }
    });
    return true;
  }else{
    return false;
  }
  console.log(cot);
}
