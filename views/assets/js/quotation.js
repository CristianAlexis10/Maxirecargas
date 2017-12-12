var quotation = new Object();
localStorage.setItem("indice", 0);
var indice = 0;
var indice_actual = 0;
var indice_total = 0;
var nuevo_pro = true;
$("#solicitud").empty();
$("#next").click(function(){
  if ($("#dataprod").val() != '' && $("#solicitud").val() != '' && $("#cantidad").val() > 0 ) {
      $("#solicitud").empty();
    if (nuevo_pro==true) {
      quotation[indice]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
      localStorage.setItem("cotizacion", JSON.stringify(quotation));
      localStorage.setItem("indice", (indice+1));
      localStorage.setItem("indice_total", indice_total);
      indice ++;
      indice_actual = indice;
      indice_total++;
      // console.log(quotation);
      $("#quotationUser")[0].reset();
    }else{
      $("#quotationUser")[0].reset();
      indice_actual=indice_total;
    }
  }else{
    $("#quotationUser").after('<div class="message"> Campos Vacios</div>');
    setTimeout(function(){
       $('div.message').remove();
     }, 2000);


  }
  showButtons();
});
$("#before").click(function(){
  $("#solicitud").empty();
  indice_actual = indice_actual-1;
  $("#dataprod").val(quotation[indice_actual].referencia);
  services($("#dataprod").val());
  $("#solicitud").val(quotation[indice_actual].servicio);
  $("#cantidad").val(quotation[indice_actual].cantidad);
  showButtons();

});
$("#nextExis").click(function(){
  $("#solicitud").empty();
  indice_actual = indice_actual+1;
  $("#dataprod").val(quotation[indice_actual].referencia);
  $("#solicitud").val(quotation[indice_actual].servicio);
  $("#cantidad").val(quotation[indice_actual].cantidad);
  showButtons();

});
$("#cantidad").keyup(function(){
  showButtons();
});
$("#dataprod").keyup(function(){
  showButtons();
});
//mostrar botonoes
showButtons();
function showButtons(){
  if (indice_total==0 && $("#dataprod").val() == '' &&  $("#cantidad").val() == ''  ) {
    $("#openModal").attr("disabled",true);
  }else{
    $("#openModal").attr("disabled",false);
  }
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
              selector.options[i] = new Option(result[i].tip_ser_nombre,result[i].tip_ser_cod);
          }
      }
  });
}


if (document.getElementById('closeConfir')) {
  var CloseModal = document.getElementById('closeConfir');
  var modal = document.getElementById('modalConfir');
  CloseModal.onclick= function(){
    modal.style.display = "none";
  };
  function vvv(value){
    $.ajax({
      url: "index.php?controller=config&a=selectServiceBy",
      type: "POST",
      dataType:'json',
      data: ({data:value})
    }).done(function(result){
      localStorage.setItem("ser", result.tip_ser_nombre);
    });
  }
  var openModal = document.getElementById('openModal');
  openModal.onclick = function(){
    $('#detalles').empty();
    modal.style.display = "flex";
      if (localStorage.indice== 0) {
        quotation[0]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        // for (var i = 0; i <= quotation.length; i++) {
        // }
        var i = 0;
        while (quotation[i]!=undefined) {
                vvv(quotation[i].servicio);
              $('#detalles').append('<p> Servicio: '+localStorage.getItem("ser")+' Referencia: '+quotation[i].referencia+' Cantidad: '+quotation[i].cantidad+'</p>');

          // console.log(i);
          i++;
        }
        // console.log(  quotation[3]);
      }else{
        quotation[(indice_total)]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        var i = 0;
        while (quotation[i]!=undefined) {
          vvv(quotation[i].servicio);
          $('#detalles').append('<p> Servicio: '+localStorage.getItem("ser")+' Referencia: '+quotation[i].referencia+' Cantidad: '+quotation[i].cantidad+'</p>');
          // console.log(i);
          i++;
        }
        // console.log(quotation);
      }

  }
}
