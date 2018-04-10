// $('#password').attr('disabled',true);
//validar si el usuario existe
$('#pass').focus(function(){
    var value = $('#document').val();
    if (value!='') {
	    $.ajax({
	      url: 'validar_documento',
	      type:'post',
	      dataType:'json',
	      data:'data='+value,
	  }).done(function(response){
       if(response==true) {
		    $(".message").remove();
	     }else{
	     	$(".message").remove();
		    $("#error").after("<div class='message-red'>Documento no valido</div>");
        $("#error .input--login").addClass("inputLoginRed");
	     }
	  });
    }else{
    	$(".message").remove();
      $("#error .input--login").removeClass("inputLoginRed");
    }
    setTimeout(function(){
       $('div.message-red').remove();
     }, 3000);
});
//capturar el evento submit
$("#form--login").submit(function(e) {
    e.preventDefault();
    if ($('#document').val() != '' || $('#pass').val() != '' ) {
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
                 if (result=='customer') {
                   location.href = 'maxirecargas';
                    return;
                 }else if (result==true) {
                      location.href = 'dashboard';
                      return;
                  }else{
                      $('#error-password').after('<div class="message-red">'+result+'</div>');
                      setTimeout(function(){
                          $('div.message-red').remove();
                      }, 3000);
                      $("#error-password .input--login").addClass("inputLoginRed");

                  }
               },
               error: function(result){
                  console.log(result);
               }
            });
  }else{
    $('#form--login').after('<div class="message-red">Valores Requeridos</div>');
    setTimeout(function(){
        $('div.message-red').remove();
    }, 2000);
  }
});
// mobile

$('#contra2').focus(function(){
    var value = $('#dociden').val();
    if (value!='') {
	    $.ajax({
	      url: 'validar_documento',
	      type:'post',
	      dataType:'json',
	      data:'data='+value,
	  }).done(function(response){
       if(response==true) {
		    $(".message").remove();
	     }else{
	     	$(".message").remove();
		    $("#form_mobile").after("<div class='message-red'>Documento no valido</div>");
        $("#form_mobile .input--login").addClass("inputLoginRed");
	     }
	  });
    }else{
    	$(".message").remove();
      $("#error .input--login").removeClass("inputLoginRed");
    }
    setTimeout(function(){
       $('div.message-red').remove();
     }, 3000);
});
$("#form_mobile").submit(function(e) {
    e.preventDefault();
    if ($('#dociden').val() != '' || $('#contra2').val() != '' ) {
            dataJson = [];
            // $("input[name=data-login]").each(function(){
            //     structure = {};
            //     structure = $(this).val();
                dataJson.push($('#dociden').val());
                dataJson.push($('#contra2').val());
            // });
            console.log(dataJson);
            $.ajax({
              url: "validar-inicio-sesion",
              type: "POST",
               dataType:'json',
               data: ({data: dataJson}),
               success: function(result){
                 if (result=='customer') {
                   location.href = 'maxirecargas';
                    return;
                 }else if (result==true) {
                      location.href = 'dashboard';
                      return;
                  }else{
                      $('#form_mobile').after('<div class="message-red">'+result+'</div>');
                      setTimeout(function(){
                          $('div.message-red').remove();
                      }, 2000);
                  }
               },
               error: function(result){
                  console.log(result);
               }
            });
  }else{
    $('#form_mobile').after('<div class="message-red">Valores Requeridos</div>');
    setTimeout(function(){
        $('div.message-red').remove();
    }, 2000);
  }
});
