$("#form--login").submit(function(e) {
  e.preventDefault();
  dataJson = [];
   dataJson = $("input[name=data]").each(function(){
      structure = {}
      structure = $(this).val();
      dataJson.push(structure);
  });
  $.ajax({
    url: "validar-inicio-sesion",
    type: "POST",
     dataType:'json',
     data: ({data: dataJson}),
     success: function(result){
         if (result==true) {
            alert('sad');
         }
     },
     error: function(result) {
                    // result = JSON.parse(result);
                    console.log(result.responseText);
                }
  });

});
