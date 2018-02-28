//asignar pedidos
var assignVar;
$("#modal-assign").hide();
function assign(order){
  assignVar=order;
    $("#modal-assign").show();
}
$("#clAssig").click(function() {
$("#modal-assign").hide();
})
$("#confirmAssign").click(function(){
  var employe = $("#addOrder").val();
  $.ajax({
    url:"asignar-pedido",
    type :"post",
    dataType : "json",
    data:({order: assignVar ,emplo : employe}),
    success: function(response){
      console.log(response);
      if (response==true) {
        $("#modal-assign").hide();
      loadDataTables();
          $("#dataPending").after("<div class='message'>Existoso.</div>");
          if (document.getElementById('detail-reload')) {
            location.reload();
          }
      }else{
        $("#modal-assign").after("<div class='message'>"+response+"</div>");
      }
      setTimeout(function(){
         $('div.message').remove();
       }, 2000);
  }
  });
});
//cambiar estado
$("#closeStatus").click(function(){
  $(".modal-status").hide();
});
var pedCod ;
function changeStatus(token){
  $(".modal-status").show();
    pedCod= token;
}
$("#newStatus").change(function() {
  if (this.value==3 || this.value == 5) {
     $("#modal-motive").show();
     $("#modal-total").hide();

  }else{
    $("#modal-total").hide();
    $("#modal-motive").hide();
  }
  if (this.value==4) {
      $("#modal-total").show();
      $("#modal-motive").hide();
  }
});

//guardar cambios
$("#saveStarus").click(function(){
  var status = $("#newStatus").val();
  if (status==3 || status == 5) {
     var obser = $("#motive").val();
     if (confirm("¿Guardar Cambios?")) {
       $.ajax({
         url:"cambiar_estado",
         type:"POST",
         data:({ data : status , order : pedCod , obs : obser}),
         dataType:"json",
         success:function(result){
           loadDataTables();
           $("#motive").val("")
           // $("#modal-motive").hide();
           if (document.getElementById("chan")) {
             location.reload();
           }
           $(".modal-status").hide();
         },
         error:function(result){
           console.log(result);
         }
       });
     }
  }else if(status == 4){
    var all = parseInt($("#total").val());
    if (all>0) {
      if (confirm("¿Registrar Pedido terminado con un total de "+all+"?")) {
        $.ajax({
          url:"cambiar_estado",
          type:"POST",
          data:({ data : status , order : pedCod , total : all}),
          dataType:"json",
          success:function(result){
            loadDataTables();
            $("#total").val("");
            if (document.getElementById("chan")) {
              location.reload();
            }
            $(".modal-status").hide();
            console.log(result);
          },
          error:function(result){
            console.log(result);
          }
        });
      }
    }else{
      $("#saveStarus").after("<div class='message'>Cantidad no valida</div>");
      setTimeout(function(){$("div.message").remove()},3000);
    }
  }else{
    $.ajax({
      url:"cambiar_estado",
      type:"POST",
      data:({ data : status , order : pedCod}),
      dataType:"json",
      success:function(result){
          loadDataTables();
          if (document.getElementById("chan")) {
            location.reload();
          }
      },
      error:function(result){
        console.log(result);
      }
    });
  }
});

function loadDataTables(){
  $('#dataPending').load('index.php?controller=datatables&a=dataTableOrderPending');
  $('#dataAssign').load('index.php?controller=datatables&a=dataTableOrderAssing');
  $('#dataFinished').load('index.php?controller=datatables&a=dataTableFinished');
  $('#dataCancelled').load('index.php?controller=datatables&a=dataTableCancelled');
  $('#dataPostpone').load('index.php?controller=datatables&a=dataTablePostpone');
}
