if (document.getElementById('cuidad')) {
    $.ajax({
        url: "index.php?controller=config&a=selectCity",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('cuidad');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].ciu_nombre,result[i].id_ciudad);
            }
        }
    });
}
if (document.getElementById('tipo_usu')) {
            var selector = document.getElementById('tipo_usu');
            selector.options[0] = new Option('Persona natural',1);
            selector.options[1] = new Option('Persona juridica',3);
    }
    if (document.getElementById('tip_doc')) {
        $.ajax({
            url: "index.php?controller=config&a=selectTipDoc",
            type: "POST",
            dataType:'json',
            success: function(result){
                var selector = document.getElementById('tip_doc');
                for (var i = 0; i < result.length; i++) {
                    selector.options[i] = new Option(result[i].tip_doc_nombre,result[i].id_tipo_documento);
                }
            }
        });
    }


$("#frmNewUser").submit(function(e) {
     e.preventDefault();
     var rol = $('#tipo_usu').val();
     if (rol != 3) {
             dataJson = [];
             dataJson.push(rol);
             $(".dataCl").each(function(){
                               structure = {}
                               structure = $(this).val();
                               dataJson.push(structure);
                           });
             captcha =  grecaptcha.getResponse();
             // console.log(dataJson);
               $.ajax({
                       url: "guardar-cliente",
                       type: "POST",
                        dataType:'json',
                        data: ({data: dataJson , get_captcha : captcha}),
                        success: function(result){
                         if (result==true) {
                           $("#frmNewUser").after("<div class='message'>Registrado Exitosamente</div>");
                         }else{
                           $("#frmNewUser").after("<div class='message'>"+result+"</div>");
                         }
                          setTimeout(function(){
                             $('div.message').remove();
                           }, 2000);
                        },
                        error: function(result){
                           console.log(result);
                        }
               });

     }
 });




 var num_doc = false;
 var contra = false;
 $('#rep_contra').attr('disabled',true);
 // numero de documento
 $('#numDoc').keyup(function(){
     var value = $('#numDoc').val();
     $.ajax({
       url: 'validar_documento',
       type:'post',
       data:'data='+value,
   }).done(function(response){
     if (response=='true') {
         $('#numDoc').after('<div class="no-usu">usuario no valido</div>');
          num_doc = false;
      }else{
           $('.no-usu').remove();
         num_doc = true;
      }
       enable(num_doc,contra);
   });
 });
 //contraseñas
 $('#contra').keyup(function(){
   var contra_ingresada = $('#contra').val().length;
   $('.contra-no-valid').remove();
   if (contra_ingresada<8) {
     $('#contra').after('<div class="contra-no-valid">La clave debe tener al menos 8 caracteres');
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (contra_ingresada>25) {
     $('#contra').after('<div class="contra-no-valid">La clave no puede tener más de 25 caracteres');
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (minusculas($('#contra').val())==0) {
     $('#contra').after('<div class="contra-no-valid">La clave debe tener al menos una letra minúscula');
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (mayusculas($('#contra').val())==0) {
     $('#contra').after('<div class="contra-no-valid">La clave debe tener al menos una letra mayuscula');
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (numeros($('#contra').val())==0) {
     $('#contra').after('<div class="contra-no-valid">La clave debe tener al menos un caracter numérico');
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if ($('#contra').val().indexOf(" ")!=-1) {
    $('#contra').after( "<div class='contra-no-valid'>La clave no debe tener espacios en blaco");
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
   }
   $('#rep_contra').attr('disabled',false);

 });

 //repetir contra
 $('#rep_contra').keyup(function(){
     $('.rep_contrasena').remove();
   var rep_contra = $('#rep_contra').val();
   if (rep_contra===$('#contra').val()) {
     contra=true;
     $('.rep_contrasena').remove();
   }else{
     contra=false;
     $('#rep_contra').after('<div class="rep_contrasena">las contraseñas no coinciden</div>');
   }
     enable(num_doc,contra);

 });

 function mayusculas(contra_validate){
 var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
    for(i=0; i<contra_validate.length; i++){
       if (letras_mayusculas.indexOf(contra_validate.charAt(i),0)!=-1){
          return 1;
       }
    }
    return 0;
 }
 function minusculas(contra_validate){
 var letras_mayusculas="abcdefghyjklmnñopqrstuvwxyz";
    for(i=0; i<contra_validate.length; i++){
       if (letras_mayusculas.indexOf(contra_validate.charAt(i),0)!=-1){
          return 1;
       }
    }
    return 0;
 }

 function numeros(contra_validate){
 var numeros="0123456789";
    for(i=0; i<contra_validate.length; i++){
       if (numeros.indexOf(contra_validate.charAt(i),0)!=-1){
          return 1;
       }
    }
    return 0;
 }
 //desabilitar boton
 function enable(num_doc,contra){
   if (num_doc==true && contra==true) {
     $('#registrar').attr('disabled',false);
   }else{
     $('#registrar').attr('disabled',true);
   }
 }
