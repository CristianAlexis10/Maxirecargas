$('#password').attr('disabled',true);
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
		    $('#password').attr('disabled',false);
	     }else{
	     	$(".message").remove();
		$("#document").after("<div class='message-red'>Documento no valido</div>");
		$('#password').attr('disabled',true);
	     }

	  });
    }else{
    	$(".message").remove();
    }
    setTimeout(function(){
       $('div.message-red').remove();
     }, 2000);
});
//capturar el evento submit
$("#form--login").submit(function(e) {
    e.preventDefault();
    if ($(this).parsley().isValid()) {
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
                 }else  if (result==true) {
                      location.href = 'dashboard';
                      return;
                  }
                  $('#form--login').after('<div class="message-red">'+result+'</div>');
                  setTimeout(function(){
                     $('div.message-red').remove();
                   }, 2000);
               },
               error: function(result){
                  console.log(result);
               }
            });
  }
});

// dasboard nuevo cliente
// dataJson=[];
// $(input[name="dataCl"]).each(function(){
//   structure={}
//   structure= $(this).val();
//   dataJson.push(structure);
// });
// $.ajax({
//   url:"",
//   type ="POST",
//   dataType ='json',
//   data=({customer:dataJson}),
//   success: function(result) {
//     $("form").after(result);
//   }
// })
