var quotation = new Object();
localStorage.setItem("indice", 0);
var indice = 0;
var indice_actual = 0;
var indice_total = 0;
var nuevo_pro = true;

//validar si existe el producto
var pro_exist = false;
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
                  $("#solicitud").empty();
                  pro_exist = false;
                  $("#dataprod").after('<div class="message-quotation">Este producto no existe</div>');
                  setTimeout(function(){
                    $("div.message-quotation").remove();
                  },3000);

              return ;
        }else{
          pro_exist = true;
          $("#solicitud").empty();
          var selector = document.getElementById('solicitud');
          for (var i = 0; i < result.length; i++) {
            selector.options[i] = new Option(result[i].tip_ser_nombre,result[i].tip_ser_cod);
          }
        }
      }
  });
}
//mostrar botonoes
showButtons();
function showButtons(){
  //boton de enviar y otro producto
  if ( $("#dataprod").val()!='' &&  $("#cantidad").val() &&  $("#cantidad").val()>0 != '' && $("#solicitud").val() != "" && pro_exist == true) {
    $("#openModal").show();
    $("#next").show();
  }else{
    // $("#openModal").hide();
    $("#next").hide();
  }
//boton de anterior
  if (indice_actual==0) {
      $("#before").hide();
  }else{
    $("#before").show();
  }

  if (indice_actual>=(indice_total) || indice_total==1 || indice_actual==0) {
    $("#nextExis").hide();
  }else{
      $("#nextExis").show();
  }
  if (indice_actual==0 && indice_total>0) {
    $("#nextExis").show();
  }
  if (indice_actual==(indice_total-1)) {
    $("#nextExis").hide();
  }
  if (indice_actual==0) {
    if (quotation[0]==undefined) {
          nuevo_pro = true;
    }else{
      nuevo_pro = false;
    }
  }

}

$("#solicitud").empty();
//guardar
$("#next").click(function(){
  if ($("#dataprod").val() != '' && $("#solicitud").val() != '' && $("#cantidad").val() > 0 ) {
    if (quotation[indice_actual]==undefined) {
      quotation[indice]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
      localStorage.setItem("cotizacion", JSON.stringify(quotation));
      localStorage.setItem("indice", (indice+1));
      localStorage.setItem("indice_total", indice_total);
      indice ++;
      indice_actual = indice;
      indice_total++;
    }else{
      quotation[indice_actual]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
      //igualar inidice
      indice_actual=indice_total;
    }
    $("#quotationUser")[0].reset();
    console.log(quotation);
  }else{
    $("#quotationUser").after('<div class="message-quotation"> Campos Vacios</div>');
    setTimeout(function(){
       $('div.message-quotation').remove();
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





if (document.getElementById('closeConfir')) {
  var CloseModal = document.getElementById('closeConfir');
  var modal = document.getElementById('modalConfir');
  CloseModal.onclick= function(){
    modal.style.display = "none";

  };

  var openModal = document.getElementById('openModal');
  openModal.onclick = function(){
    if ($("#cantidad").val()<=0) {
      alert("Ingresa una cantidad valida");
      return;
    }
    if (indice_total==0 && $("#dataprod").val()!="" && $("#solicitud").val() !="" && $("#cantidad").val()!="") {

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
          if (quotation[(indice_actual)]==undefined) {
        quotation[(indice_total)]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };

        indice_total++;
      }else{
        quotation[indice_actual]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        indice_actual=indice_total;
      }
      var i = 0;
        console.log(quotation);
        while (quotation[i]!=undefined) {
          var referencia = quotation[i].referencia;
          var can = quotation[i].cantidad;
            AddItem(quotation[i].servicio,referencia,can);
          i++;
        }
        // AddItem($("#solicitud").val(),$("#dataprod").val(),$("#cantidad").val());
      }

    }else{
      $("#openModal").after("<div class='message-quotation'>por favor llena los campos</div>");
      setTimeout(function(){$("div.message-quotation").remove()},3000);
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
                beforeSend:function() {
                  $("#sendQuotation").after('<div class="message-quotation">Validando...</div>');
                },
                success: function(result){
                    modal.style.display = "none";
                    $("div.message-quotation").remove();
                    if (result==true) {
                        $("#sendQuotation")[0].reset();
                        $("#quotationUser")[0].reset();
                        showButtons();
                        delete quotation;
                        $("#openModal").after('<div class="message-quotation">Tu cotización ha sido enviada</div>');
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


});
