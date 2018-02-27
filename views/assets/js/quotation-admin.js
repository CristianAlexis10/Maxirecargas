$("#saveResponse").click(function(){
  var dataResponse = new Object;
    $("input[name=dataQuotation]").each(function(){
        var refe = $("#"+this.id).attr("class").split(' ');
        dataResponse[this.id]={"referencia":refe[0],"cantidad":parseInt(refe[1]),"servicio":parseInt(refe[2]),"valor":parseInt(this.value)};
    });
    $.ajax({
      url:"reponder-cotizacion",
      type:"post",
      dataType:"json",
      data:({quotation:dataResponse}),
      success:function(result){
        console.log(result);
      },
      error:function(error){console.log(error);}
    });
});
