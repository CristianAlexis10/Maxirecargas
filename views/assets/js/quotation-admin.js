$("#saveResponse").click(function(){
  var dataResponse = new Object;
    $("input[name=dataQuotation]").each(function(){
        var refe = $("#"+this.id).attr("class").split(' ');
        dataResponse[this.id]={"referencia":refe[0],"cantidad":parseInt(refe[1]),"servicio":parseInt(refe[2]),"valor":parseInt(this.value)};
    });
    if ($("#condi").val()!="" && $("#iva").val()!="" && $("#plazo").val()!="" && $("#entrega").val()!="") {
        $.ajax({
          url:"reponder-cotizacion",
          type:"post",
          dataType:"json",
          data:({quotation:dataResponse, obs : $("#aditionalObs").val(),condi:$("#condi").val(),iva:$("#iva").val(),plazo:$("#plazo").val(),entrega:$("#entrega").val()}),
          success:function(result){
            console.log(result);
            if (result==true) {
              $("#saveResponse").after("<div class='message'>Proceso exitoso.</div>");
              setTimeout(function(){
                $("div.message").remove();
                location.reload();
              },1000);
            }else{
              $("#saveResponse").after("<div class='message'>"+result+"</div>");
              setTimeout(function(){$("div.message").remove()},3000);
            }
          },
          error:function(error){console.log(error);}
        });

    }else{
      alert("Campos vacios");
    }
});
