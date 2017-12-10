var quotation = new Object();
var indice = 0;
var indice_actual = 0;
var indice_total = 0;
var nuevo_pro = true;
$("#next").click(function(){
  if (nuevo_pro==true) {
    quotation[indice]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
    indice ++;
    indice_actual = indice;
    indice_total++;
    console.log(quotation);
    $("#quotationUser")[0].reset();
  }else{
    $("#quotationUser")[0].reset();
    indice_actual=indice_total;
  }
  showButtons();
});
$("#before").click(function(){
  indice_actual = indice_actual-1;
  $("#dataprod").val(quotation[indice_actual].referencia);
  $("#solicitud").val(quotation[indice_actual].servicio);
  $("#cantidad").val(quotation[indice_actual].cantidad);
  showButtons();

});
$("#nextExis").click(function(){
  indice_actual = indice_actual+1;
  $("#dataprod").val(quotation[indice_actual].referencia);
  $("#solicitud").val(quotation[indice_actual].servicio);
  $("#cantidad").val(quotation[indice_actual].cantidad);
  showButtons();

});

//mostrar botonoes
showButtons();
function showButtons(){
  if (indice_actual==0) {
      $("#before").hide();
      nuevo_pro = false;
  }else{
    $("#before").show();
    nuevo_pro = false;
  }
  if (indice_actual>=(indice_total)) {
    $("#nextExis").hide();
    nuevo_pro = true;
  }else{
      $("#nextExis").show();
      nuevo_pro = false;
  }

}


$("#dataprod").blur(function(){
      $.ajax({
          url: "index.php?controller=config&a=selectServices",
          type: "POST",
          dataType:'json',
          data: ({data: $("#dataprod").val()}),
          success: function(result){
            console.log(result);
            $("#solicitud").empty();
              var selector = document.getElementById('solicitud');
              for (var i = 0; i < result.length; i++) {
                  selector.options[i] = new Option(result[i].tip_ser_cod,result[i].tip_ser_cod);
              }
          }
      });
});
