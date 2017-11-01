$("#form--login").submit(function(e) {
    e.preventDefault();
  dataJson = [];
  $("input[name=data-login]").each(function(){
      structure = {};
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
            location.href = 'dashboard';
        }
     }
  });

});
