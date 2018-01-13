//asignar pedidos
var assignVar;
$("#modal-assign").hide();
function assign(order){
  assignVar=order;
  $("#modal-assign").toggle();
}
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
$("#changeStatus").click(function(){
  $(".modal-status").toggle();
});
var pedCod ;
function changeStatus(token){
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
     $.ajax({
       url:"cambiar_estado",
       type:"POST",
       data:({ data : status , order : pedCod , obs : obser}),
       dataType:"json",
       success:function(result){
         loadDataTables();
       },
       error:function(result){
         console.log(result);
       }
     });
  }else if(status == 4){
    var all = $("#total").val();
    $.ajax({
      url:"cambiar_estado",
      type:"POST",
      data:({ data : status , order : pedCod , total : all}),
      dataType:"json",
      success:function(result){
        loadDataTables();
      },
      error:function(result){
        console.log(result);
      }
    });
  }else{
    $.ajax({
      url:"cambiar_estado",
      type:"POST",
      data:({ data : status , order : pedCod}),
      dataType:"json",
      success:function(result){
          loadDataTables();
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
