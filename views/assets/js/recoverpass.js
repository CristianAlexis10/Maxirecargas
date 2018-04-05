$("#ingresarCodigo").hide();
$("#recoverPas").submit(function(e){
  e.preventDefault();
  if ($("#documento").val()>0 ) {
      $.ajax({
        url:"enviar-token",
        type:"post",
        dataType:"json",
        data:({documento:$("#documento").val()}),
        beforeSend:function(){
          $("#recoverPas").after("<div class='message'>Validando...</div>");
        },
        success:function(result){
          $("div.message").remove();
          console.log(result);
          if (result==true) {
            $("#recoverPas").hide();
            $("#ingresarCodigo").show();

          }else{
            $("#recoverPas").after("<div class='message'>"+result+"</div>");
          }
          setTimeout(function(){$("div.message").remove()},4000);
        },
        error:function(result){console.log(result);}
      });
  }else{
    alert("Campos requeridos");
  }
});
$("#ingresarCodigo").submit(function(e){
  e.preventDefault();
  if ($("#codigo").val()!="") {
    $.ajax({
      url:"comparar-token",
      type:"post",
      dataType:"json",
      data:({token:$("#codigo").val(),documento:$("#documento").val(),contra:$("#new").val(),contra2:$("#new2").val()}),
      success:function(result){
        console.log(result);
        if (result=="cliente" || result=="admin" ) {
          if (result=="cliente") {
            location.href="maxirecargas";
          }else if(result=="admin"){
            location.href="dashboard";
          }
        }else{
          $("#ingresarCodigo").after("<div class='message'>"+result+"</div>");
        }
        setTimeout(function(){$("div.message").remove()},4000);
      },
      error:function(result){console.log(result);}
    });
  }else{
    alert("Campo Requerido");
  }
});
