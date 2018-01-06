var quotation = new Object();
localStorage.setItem("indice", 0);
var indice = 0;
var indice_actual = 0;
var indice_total = 0;
var nuevo_pro = true;
$("#solicitud").empty();
$("#next").click(function(){
  if ($("#dataprod").val() != '' && $("#solicitud").val() != '' && $("#cantidad").val() > 0 ) {
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
  $("#solicitud").empty();
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
        if (result=='No existe Este producto') {
                  $("#openModal").attr("disabled",true);
                  $("#dataprod").after('<div class="message">Este producto no existe</div>');
                  setTimeout(function(){
                    $("div.message").remove();
                  },3000);

              return ;
        }else{
            $("#openModal").attr("disabled",false);
        }
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

  var openModal = document.getElementById('openModal');
  openModal.onclick = function(){
    $.ajax({
        url: "guardar-cotizacion-session",
        type: "POST",
        dataType:'json',
        data: ({data : 'borrar'}),
        success: function(result){
             // console.log(result);
        },
        error: function(result){
             // console.log(result);
        }
    });
    $('#detalles').empty();
    modal.style.display = "flex";
      if (localStorage.indice== 0) {
        quotation[0]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        // for (var i = 0; i <= quotation.length; i++) {
        // }
        var i = 0;
        while (quotation[i]!=undefined) {
                  $.ajax({
                    url: "index.php?controller=config&a=selectServiceBy",
                    type: "POST",
                    dataType:'json',
                    data: ({data:quotation[i].servicio})
                  }).done(function(result){
                    $('#detalles').append('<p> Servicio: '+result.tip_ser_nombre+' Referencia: '+quotation[0].referencia+' Cantidad: '+quotation[0].cantidad+'</p>');
                          var nada = '<p> <b>Servicio:</b> '+result.tip_ser_nombre+'<b> Referencia:</b> '+quotation[0].referencia+' <b>Cantidad:</b> '+quotation[0].cantidad+'</p>';
                          $.ajax({
                              url: "guardar-cotizacion-session",
                              type: "POST",
                              dataType:'json',
                              data: ({data : nada}),
                              success: function(result){
                                   // console.log(result);
                              },
                              error: function(result){
                                   console.log(result);
                              }
                          });
                  });

          // console.log(i);
          i++;
        }
        // console.log(  quotation[3]);
      }else{
        quotation[(indice_total)]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        var i = 0;
        while (quotation[i]!=undefined) {
          var referencia = quotation[i].referencia;
          var can = quotation[i].cantidad;
          console.log(quotation);
          console.log(quotation[0].servicio);
          console.log(quotation[1].servicio);
            AddItem(quotation[i].servicio,referencia,can);
          i++;
        }
      }


  }
}


function AddItem(valor1,valor2,valor3){
  $.ajax({
    url: "index.php?controller=config&a=selectServiceBy",
    type: "POST",
    dataType:'json',
    data: ({data:valor1})
  }).done(function(result){
    // console.log(valor1);
    $('#detalles').append('<p> Servicio: '+result.tip_ser_nombre+' Referencia: '+valor2+' Cantidad: '+valor3+'</p>');
          var nada = '<p> <b>Servicio:</b> '+result.tip_ser_nombre+'<b> Referencia:</b> '+valor2+' <b>Cantidad:</b> '+valor3+'</p>';
          // console.log(referencia);
          // console.log(can);
          // console.log("---------");
          $.ajax({
              url: "guardar-cotizacion-session",
              type: "POST",
              dataType:'json',
              data: ({data : nada}),
              success: function(result){
                   // console.log(result);
              },
              error: function(result){
                   console.log(result);
              }
          });
  });
}
$("#sendQuotation").submit(function(e) {
    e.preventDefault();
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
                data: ({data : dataJson}),
                success: function(result){
                    modal.style.display = "none";
                    if (result==true) {
                        $("#openModal").after('<div class="message">Tu cotización ha sido enviada</div>');
                    }else{
                        $("#openModal").after('<div class="message">'+result+'</div>');
                    }
                    setTimeout(function(){
                      $("div.message").remove();
                    },6000);
                     // console.log(result);
                },
                error: function(result){
                     console.log(result);
                }
            });


});
