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
    $.ajax({
        url: "index.php?controller=config&a=selectRole",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('tipo_usu');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].tip_usu_rol,result[i].tip_usu_codigo);
            }
        }
    });
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

if(document.getElementById('sexo')){
  $.ajax({
    url: "",
    type:"POST",
    dataType:'json',
    success: function(result){
      var selector = document.getElementById('sexo')
    }
  })
}


// if(document.getElementById('valores')){
//     $('#valores').click(function(){
//     var servicios= [];
//            $("input[name=ch-tip-ser").each(function(){
//                 if ($( this ).is( ":checked" )  ) {
//                    servicios.push($(this).val());
//                 }
//             });
//                    console.log(servicios);

//     });

// }



//REGISTRAR PERSONA NATURAL
   $("#frmNewUser").submit(function(e) {
        e.preventDefault();
        var rol = $('#tipo_usu').val();
        if (rol != 3) {
                dataJson = [];


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
                               $('#datatableUser').load('index.php?controller=datatables&a=dataTableUser');
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

    //REGISTRAR PERSONA JURIDICA
   $("#frmNewBusi").submit(function(e) {
        e.preventDefault();
        var rol = $('#tipo_usu').val();
        if (rol == 3) {
                dataJson = [];
                $(".dataEmp").each(function(){
                          structure = {}
                          structure = $(this).val();
                          dataJson.push(structure);
                });
                console.log(dataJson);
                  $.ajax({
                          url: "guardar-usuario",
                          type: "POST",
                           dataType:'json',
                           data: ({data: dataJson}),
                           success: function(result){
                            if (result==true) {
                              $("#frmNewBusi").after("<div class='message'>Registrado Exitosamente</div>");
                            }else{
                              $("#frmNewBusi").after("<div class='message'>"+result+"</div>");
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



//
// //contraseña empresarial
// var num_nit = true;
// var contra = false;
//  $('#rep_contraEmp').attr('disabled',true);
// $('#contraEmp').keyup(function(){
//   var contra_ingresada = $('#contraEmp').val().length;
//   $('.contra-no-valid').remove();
//   if (contra_ingresada<8) {
//     $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos 8 caracteres');
//     contra=false;
//     $('#rep_contraEmp').attr('disabled',true);
//     return ;
//   }
//   if (contra_ingresada>25) {
//     $('#contraEmp').after('<div class="contra-no-valid">La clave no puede tener más de 25 caracteres');
//     contra=false;
//     $('#rep_contraEmp').attr('disabled',true);
//     return ;
//   }
//   if (minusculas($('#contraEmp').val())==0) {
//     $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos una letra minúscula');
//     contra=false;
//     $('#rep_contraEmp').attr('disabled',true);
//     return ;
//   }
//   if (mayusculas($('#contraEmp').val())==0) {
//     $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos una letra mayuscula');
//     contra=false;
//     $('#rep_contraEmp').attr('disabled',true);
//     return ;
//   }
//   if (numeros($('#contraEmp').val())==0) {
//     $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos un caracter numérico');
//     contra=false;
//     $('#rep_contraEmp').attr('disabled',true);
//     return ;
//   }
//   if ($('#contraEmp').val().indexOf(" ")!=-1) {
//    $('#contraEmp').after( "<div class='contra-no-valid'>La clave no debe tener espacios en blaco");
//    contra=false;
//    $('#rep_contraEmp').attr('disabled',true);
//    return ;
//   }
//   $('#rep_contraEmp').attr('disabled',false);
//
// });
//
// //repetir contra
// $('#rep_contraEmp').keyup(function(){
//     $('.rep_contrasena').remove();
//   var rep_contra = $('#rep_contraEmp').val();
//   if (rep_contra===$('#contraEmp').val()) {
//     contra=true;
//     $('.rep_contrasena').remove();
//   }else{
//     contra=false;
//     $('#rep_contraEmp').after('<div class="rep_contrasena">las contraseñas no coinciden</div>');
//   }
//     enable(num_nit,contra);
//
// });
//
// function mayusculas(contra_validate){
// var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
//    for(i=0; i<contra_validate.length; i++){
//       if (letras_mayusculas.indexOf(contra_validate.charAt(i),0)!=-1){
//          return 1;
//       }
//    }
//    return 0;
// }
// function minusculas(contra_validate){
// var letras_mayusculas="abcdefghyjklmnñopqrstuvwxyz";
//    for(i=0; i<contra_validate.length; i++){
//       if (letras_mayusculas.indexOf(contra_validate.charAt(i),0)!=-1){
//          return 1;
//       }
//    }
//    return 0;
// }
//
// function numeros(contra_validate){
// var numeros="0123456789";
//    for(i=0; i<contra_validate.length; i++){
//       if (numeros.indexOf(contra_validate.charAt(i),0)!=-1){
//          return 1;
//       }
//    }
//    return 0;
// }
// //desabilitar boton
// function enable(num_doc,contra){
//   if (num_doc==true && contra==true) {
//     $('#registrarEmp').attr('disabled',false);
//   }else{
//     $('#registrarEmp').attr('disabled',true);
//   }
// }
