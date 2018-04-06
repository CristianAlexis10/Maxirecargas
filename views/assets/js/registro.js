$('#moveleft').click(function() {
    $('#formularios--run').animate({
    'marginLeft':"0"
    });

    $('.contenido--run').animate({
    'marginLeft' : "100%"
    });
});

$('#moveright').click(function() {
    $('#formularios--run').animate({
    'marginLeft' : "50%"
    });

    $('.contenido--run').animate({
    'marginLeft': "0"
    });
});

$(".input--login").focus(function(){
  $(this).parent().addClass("clr-label-login mov-label-login");
});

$(".input--login").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-login");
    $(this).parent().removeClass("clr-label-login");
});

$(".input").focus(function(){
  $(this).parent().addClass("clr-label mov-label");
});

$(".input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label");
    $(this).parent().removeClass("clr-label");
});


var customerPart1 = document.getElementById("customers--normal--part1");
var customerPart2 = document.getElementById('customers--normal--part2');
var customerPart3 = document.getElementById('customers--normal--part3') ;
var irParte2 = document.getElementById('normalIrParte2');
var irParte3 = document.getElementById('normalIrParte3');
var irAtras = document.getElementById('irAtras');
var irAtras2 = document.getElementById('irAtras2');



irAtras.onclick = function(){
  customerPart2.style.display= "none"
  customerPart1.style.display= "block";
}

irAtras2.onclick = function(){
  customerPart3.style.display= "none"
  customerPart2.style.display= "block";
}
var businessPart1 = document.getElementById('business--parte1');
var businessPart2 = document.getElementById('business--parte2');
var businessPart3 = document.getElementById('business--parte3');
var businessPart4 = document.getElementById('business--parte4');

var irParte2busi = document.getElementById('businessIrParte2');

var irAtras2busi = document.getElementById('irAtrasbusi');
var irParte3busi = document.getElementById('businessIrParte3');

var irAtras3busi = document.getElementById('irAtras3busi');
var irParte4busi = document.getElementById('businessIrParte4');

var irAtras4busi = document.getElementById('irAtras4busi');



irAtras2busi.onclick = function(){
  businessPart2.style.display= "none"
  businessPart1.style.display= "block";
}

irAtras3busi.onclick = function(){
  businessPart3.style.display= "none"
  businessPart2.style.display= "block";
}
irAtras4busi.onclick = function(){
  businessPart4.style.display= "none";
  businessPart3.style.display= "block"
}


// if (document.getElementById('cuidad')) {
//     $.ajax({
//         url: "index.php?controller=config&a=selectCity",
//         type: "POST",
//         dataType:'json',
//         success: function(result){
//             var selector = document.getElementById('cuidad');
//             for (var i = 0; i < result.length; i++) {
//                 selector.options[i] = new Option(result[i].ciu_nombre,result[i].id_ciudad);
//             }
//         }
//     });
// }
//
// if (document.getElementById('cuidad2')) {
//     $.ajax({
//         url: "index.php?controller=config&a=selectCity",
//         type: "POST",
//         dataType:'json',
//         success: function(result){
//             var selector = document.getElementById('cuidad');
//             for (var i = 0; i < result.length; i++) {
//                 selector.options[i] = new Option(result[i].ciu_nombre,result[i].id_ciudad);
//             }
//         }
//     });
// }

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
    if (document.getElementById('tip_doc2')) {
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
             // captcha =  grecaptcha.getResponse();
             // console.log(dataJson);
               $.ajax({
                       url: "guardar-cliente",
                       type: "POST",
                        dataType:'json',
                        data: ({data: dataJson }),
                        beforeSend: function() {
                            $("#frmNewBusi").after("<div id='message-load'>Validando...</div>");
                        },
                        success: function(result){
                         if (result==true) {
                           $("#frmNewUser").after("<div class='message'>Revisa tu correo para activar tu cuenta.</div>");
                           $("#frmNewUser")[0].reset();
                         }else{
                           $("#frmNewUser").after("<div class='message'>"+result+"</div>");
                         }
                          setTimeout(function(){
                             $('div.message').remove();
                           }, 3000);
                        },
                        error: function(result){
                           console.log(result);
                        },
                        complete: function() {
                          $("#message-load").remove();
                       }
               });

     }
 });


//validaciones
 // $("#normalIrParte2").attr("disabled",true);
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
        $('.message-red').remove();
         $('#error-ndoc').after('<div class="message-red">Usuario no valido</div>');
         $('#numDoc').addClass("inputLoginRed")
          num_doc = false;

      }else{
           $('.message-red').remove();
           $('#numDoc').removeClass("inputLoginRed")
         num_doc = true;
      }
   });
 });
irParte2.onclick = function(){
   primerpaso(num_doc);
}

 function primerpaso(doc){
   if (doc==true && $("#priNom").val() !='' && $('#priApe').val() != '') {
        customerPart1.style.display= "none"
        customerPart2.style.display= "block";
   }else{
     $("#normalIrParte2").after("<div class='message'>Todos los campos son requeridos</div>");
     setTimeout(function(){
       $("div.message").remove();
     },3000);
   }
 }
 function valida(e){
     tecla = (document.all) ? e.keyCode : e.which;
     //Tecla de retroceso para borrar, siempre la permite
     if (tecla==8){
         return true;
     }
     // Patron de entrada, en este caso solo acepta numeros
     patron =/[0-9]/;
     tecla_final = String.fromCharCode(tecla);
     return patron.test(tecla_final);
 }
 //segundo
 // $("#normalIrParte3").attr("disabled",true);
var usu_correo = false;
 function validarEmail( email ) {
     expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     if ( expr.test(email) ){
       return true;
     }else{
       return false;
     }
 }

$("#correo").keyup(function(){
     var value = $('#correo').val();
     $.ajax({
       url: 'validar_correo',
       type:'post',
       data:'data='+value,
   }).done(function(response){
     if (response=='true') {
       $('.message-red').remove();
         $('#error-regCorreo').after('<div class="message-red">Correo no valido</div>');
         $('#correo').addClass("inputLoginRed")
          usu_correo = false;
      }else{
           $('.message-red').remove();
           $('#correo').removeClass("inputLoginRed")

         usu_correo = true;
      }
   });
 });
 irParte3.onclick = function(){
   segundoPaso();
 }
 function segundoPaso(){
   if (validarEmail($("#correo").val())==true && usu_correo==true && $("#tel").val() != '' && $("#dir").val() != '') {
     customerPart2.style.display= "none"
     customerPart3.style.display= "block";
   }else if(validarEmail($("#correo").val())==false){
     $("#error-regCorreo").after("<div class='message-red'>Correo no valido</div>");
     $('#correo').addClass("inputLoginRed")

   }else{
     $("#normalIrParte3").after("<div class='message'>Todos los campos son requeridos</div>");
   }
   setTimeout(function(){
     $("div.message").remove();
   },3000);
 }



 //contraseñas
 $('#contra').keyup(function(){
   var contra_ingresada = $('#contra').val().length;
   $('.message-red').remove();
   if (contra_ingresada<8) {
     $('#error-regPassword').after('<div class="message-red">La clave debe tener al menos 8 caracteres');
     $('#contra').addClass("inputLoginRed")
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (contra_ingresada>25) {
     $('#error-regPassword').after('<div class="message-red">La clave no puede tener más de 25 caracteres');
     $('#contra').addClass("inputLoginRed")
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (minusculas($('#contra').val())==0) {
     $('#error-regPassword').after('<div class="message-red">La clave debe tener al menos una letra minúscula');
     $('#contra').addClass("inputLoginRed")
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (mayusculas($('#contra').val())==0) {
     $('#error-regPassword').after('<div class="message-red">La clave debe tener al menos una letra mayuscula');
     $('#contra').addClass("inputLoginRed")
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if (numeros($('#contra').val())==0) {
     $('#error-regPassword').after('<div class="message-red">La clave debe tener al menos un caracter numérico');
     $('#contra').addClass("inputLoginRed")
     contra=false;
     $('#rep_contra').attr('disabled',true);
     return ;
   }
   if ($('#contra').val().indexOf(" ")!=-1) {
    $('#error-regPassword').after( "<div class='message-red'>La clave no debe tener espacios en blaco");
    $('#contra').addClass("inputLoginRed")
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
     $("div.message-red").remove();
     $('#error-regPassword-repite').after('<div class="message-red">las contraseñas no coinciden</div>');
     $('#contra').addClass("inputLoginRed");
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


$('.customers--business').hide();

$('#tipo_usu').change(function(){
  var tipo = $('#tipo_usu').val();
  if (tipo==3) {
      $('.customers--business').show();
      $('.customers--normal').hide();
  }else{
      $('.customers--normal').show();
      $('.customers--business').hide();
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
                 // captcha =  grecaptcha.getResponse();
                  $.ajax({
                          url: "guardar-cliente-empresarial",
                          type: "POST",
                           dataType:'json',
                           data: ({data: dataJson}),
                           beforeSend: function() {
                               $("#frmNewBusi").after("<div id='message-load'>Validando...</div>");
                           },
                           success: function(result){
                            if (result==true) {
                              $("#frmNewBusi").after("<div class='message'>Revisa tu correo para activar tu cuenta.</div>");
                              $("#frmNewBusi")[0].reset();
                            }else{
                              $("#frmNewBusi").after("<div class='message'>"+result+"</div>");
                            }
                             setTimeout(function(){
                                $('div.message').remove();
                              }, 2000);
                           },
                           error: function(result){
                              console.log(result);
                           },
                           complete: function() {
                             $("#message-load").remove();
                          }
                  });

        }
    });


var num_nit = true;
var contraEmp = false;
$('#registrarEmp').attr('disabled',true);
//Validar Nit
$('#nit').keyup(function(){
    var value = $('#nit').val();
    $.ajax({
      url: 'validar_nit',
      type:'post',
      data:'data='+value,
  }).done(function(response){
    console.log(response);
    if (response=='true') {
        $('#nit').after('<div class="message-red">Nit no valido</div>');
         num_nit = false;
     }else{
          $('.message-red').remove();
          num_nit = true;
     }
  });
});
//pirmer paso
irParte2busi.onclick = function(){
  primerpasoBusi();
}
function primerpasoBusi(){
  if (num_nit==true && $("#social").val() != '' && $("#namebus").val() != '' ) {
    businessPart1.style.display= "none"
    businessPart2.style.display= "block";
  }else{
    $("#businessIrParte2").after("<div class='message'>Todos los campos son requeridos</div>");
    setTimeout(function(){$("div.message").remove()},3000);
  }
}
//segundo paso
irParte3busi.onclick = function(){
  segundoPasoBusi();
}
function segundoPasoBusi(){
  if ($("#sed-nom").val() != '' && $("#sede-dir").val() != ''  && $("#sede-tel").val() != '') {
    businessPart2.style.display= "none";
    businessPart3.style.display= "block"
  }else{
    $("#businessIrParte3").after("<div class='message'>Todos los campos son requeridos</div>");
    setTimeout(function(){$("div.message").remove()},3000);
  }
 }

 //tercer paso
 var num_doc_emp = false;
 //validar numero de documento
 $('#numDocEmp').keyup(function(){
   var value = $('#numDocEmp').val();
   $.ajax({
     url: 'validar_documento',
     type:'post',
     data:'data='+value,
   }).done(function(response){
     console.log(response);
     if (response=='true') {
       $('#numDocEmp').after('<div class="message-red">Usuario no valido</div>');
       num_doc_emp = false;
     }else{
       $('.message-red').remove();
       num_doc_emp = true;
     }
   });
 });

 irParte4busi.onclick = function(){
  tercerPasoBusi();
 }
 function tercerPasoBusi(){
   if (num_doc_emp == true && $("#sede-enc").val() != '' && $("#sede-ape").val() != '') {
     businessPart3.style.display= "none";
     businessPart4.style.display= "block"
   }else{
     $("#businessIrParte4").after("<div class='message'>Todos los campos son requeridos</div>");
     setTimeout(function(){$("div.message").remove()},3000);
   }
  }
//cuarto paso
var usu_correoEmp = false;
$("#sede-correo").keyup(function(){
     var value = $('#sede-correo').val();
     $.ajax({
       url: 'validar_correo',
       type:'post',
       data:'data='+value,
   }).done(function(response){
     if (response=='true') {
         $('#sede-correo').after('<div class="message-red">Correo no valido</div>');
          usu_correoEmp = false;
          cuartoPaso();
      }else{
           $('.message-red').remove();
         usu_correoEmp = true;
         cuartoPaso();
      }
   });
 });

 function cuartoPaso(){
   if (validarEmail($("#sede-correo").val())==true && usu_correoEmp==true && $("sede-ext").val() != '' && $("#cargo").val() != '') {
      $('#registrarEmp').attr('disabled',false);
      console.log('pasa');
   }else if(validarEmail($("#sede-correo").val())==false){
     $("div.message").remove();
     $("#registrarEmp").attr("disabled",true);
      $("#sede-correo").after("<div class='message'>Formato del correo no valido</div>");
      setTimeout(function(){$("div.message").remove();},3000);
   }else{
     $("#registrarEmp").attr("disabled",true);
     console.log('no pasa');
   }
 }

 $("#rep_contraEmp").keyup(function(){
   cuartoPaso();
 });

//contraseña empresarial
 $('#rep_contraEmp').attr('disabled',true);
$('#contraEmp').keyup(function(){
  var contra_ingresada = $('#contraEmp').val().length;
  $('.message-red').remove();
  if (contra_ingresada<8) {
    $('#contraEmp').after('<div class="message-red">La clave debe tener al menos 8 caracteres');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (contra_ingresada>25) {
    $('#contraEmp').after('<div class="message-red">La clave no puede tener más de 25 caracteres');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (minusculas($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="message-red">La clave debe tener al menos una letra minúscula');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (mayusculas($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="message-red">La clave debe tener al menos una letra mayuscula');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (numeros($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="message-red">La clave debe tener al menos un caracter numérico');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if ($('#contraEmp').val().indexOf(" ")!=-1) {
   $('#contraEmp').after( "<div class='message-red'>La clave no debe tener espacios en blaco");
   contraEmp=false;
   $('#rep_contraEmp').attr('disabled',true);
   return ;
  }
  $('#rep_contraEmp').attr('disabled',false);
    cuartoPaso(num_nit,contraEmp);

});

//repetir contra
$('#rep_contraEmp').keyup(function(){
    $('.rep_contrasena').remove();
  var rep_contra = $('#rep_contraEmp').val();
  if (rep_contra===$('#contraEmp').val()) {
    contraEmp=true;
    $('.rep_contrasena').remove();
  }else{
    contraEmp=false;
    $('#rep_contraEmp').after('<div class="rep_contrasena">las contraseñas no coinciden</div>');
  }
    cuartoPaso(num_nit,contraEmp);

});


//desabilitar boton
function enableEmp(num_nit,contraEmp){
  if (num_nit==true && contraEmp==true) {
    $('#registrarEmp').attr('disabled',false);
  }else{
    $('#registrarEmp').attr('disabled',true);
  }
}


//MOSTRAR / OCULTAR CONTRASEÑA
$(document).ready(function () {
   $('#show--pass').click(function () {
    if ($('#pass').attr('type') === 'text') {
     $('#pass').attr('type', 'password');
    } else {
     $('#pass').attr('type', 'text');}
   });
  });

// registrar mobile
