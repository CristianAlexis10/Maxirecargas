var quotation = new Object();
var indice = 0;
var indice_actual = 0;
var indice_total = 0;
var nuevo_pro = true;
$("#next").click(function(){
  if ($("#dataprod").val() != '' && $("#solicitud").val() != '' && $("#cantidad").val() > 0 ) {
      $("#solicitud").empty();
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
  }else{
    console.log('Campos Vacios');
  }
  showButtons();
});
$("#before").click(function(){
  indice_actual = indice_actual-1;
  $("#dataprod").val(quotation[indice_actual].referencia);
  services($("#dataprod").val());
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
  if (indice_actual>=(indice_total) || indice_total==1 || indice_actual==0) {
    $("#nextExis").hide();
    // if ( indice_actual==0 && quotation[0]==undefined ) {
    //     nuevo_pro = true;
    // }else{
    //   console.log('a');
      nuevo_pro = true;
    // }
  }else{
      $("#nextExis").show();
      nuevo_pro = false;
  }
  if (indice_actual==0) {
    if (quotation[0]==undefined) {
          nuevo_pro = true;
    }else{
      nuevo_pro = false;
    }
  }

}


$("#dataprod").blur(function(){
        services($("#dataprod").val());
});

function services(pro){
  $.ajax({
      url: "index.php?controller=config&a=selectServices",
      type: "POST",
      dataType:'json',
      data: ({data: pro}),
      success: function(result){
        console.log(result);
        $("#solicitud").empty();
          var selector = document.getElementById('solicitud');
          for (var i = 0; i < result.length; i++) {
              selector.options[i] = new Option(result[i].tip_ser_cod,result[i].tip_ser_cod);
          }
      }
  });
}
