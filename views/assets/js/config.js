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
                if (rol==5) {
                  if(confirm('¿Asignar  permisos de empleado a este usuario?')){

                    }else{
                      return false;
                    }
                }
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
                 captcha =  grecaptcha.getResponse();
                  $.ajax({
                          url: "guardar-cliente-empresarial",
                          type: "POST",
                           dataType:'json',
                           data: ({data: dataJson , get_captcha : captcha}),
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
        $('#nit').after('<div class="no-usu">Nit no valido</div>');
         num_nit = false;
     }else{
          $('.no-usu').remove();
          num_nit = true;
     }
       enableEmp(num_nit,contraEmp);
  });
});
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
        $('#numDocEmp').after('<div class="no-usu">Usuario no valido</div>');
         num_doc_emp = false;
     }else{
          $('.no-usu').remove();
          num_doc_emp = true;
     }
       // enableEmp(num_nit,contraEmp);
  });
});
//contraseña empresarial
 $('#rep_contraEmp').attr('disabled',true);
$('#contraEmp').keyup(function(){
  var contra_ingresada = $('#contraEmp').val().length;
  $('.contra-no-valid').remove();
  if (contra_ingresada<8) {
    $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos 8 caracteres');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (contra_ingresada>25) {
    $('#contraEmp').after('<div class="contra-no-valid">La clave no puede tener más de 25 caracteres');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (minusculas($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos una letra minúscula');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (mayusculas($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos una letra mayuscula');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if (numeros($('#contraEmp').val())==0) {
    $('#contraEmp').after('<div class="contra-no-valid">La clave debe tener al menos un caracter numérico');
    contraEmp=false;
    $('#rep_contraEmp').attr('disabled',true);
    return ;
  }
  if ($('#contraEmp').val().indexOf(" ")!=-1) {
   $('#contraEmp').after( "<div class='contra-no-valid'>La clave no debe tener espacios en blaco");
   contraEmp=false;
   $('#rep_contraEmp').attr('disabled',true);
   return ;
  }
  $('#rep_contraEmp').attr('disabled',false);
    enableEmp(num_nit,contraEmp);

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
    enableEmp(num_nit,contraEmp);

});


//desabilitar boton
function enableEmp(num_nit,contraEmp){
  if (num_nit==true && contraEmp==true) {
    $('#registrarEmp').attr('disabled',false);
  }else{
    $('#registrarEmp').attr('disabled',true);
  }
}

//MARCAS
if (document.getElementById('marca')) {
    $(".newMark--modal").hide();
    $('#marca').change(function(){
        var value = $('#marca').val();
        if (value == 'newMark') {
            $(".newMark--modal").show();
        }
    });
}

var closeNew = document.getElementById('closeNew');
var modalNew = document.getElementById('modal--new');

closeNew.onclick= function() {
  modalNew.style.display= "none";
}

function selectMark(){
    if (document.getElementById('marca')) {
        $.ajax({
            url: "index.php?controller=config&a=selectMark",
            type: "POST",
            dataType:'json',
            success: function(result){
                var selector = document.getElementById('marca');
                for (var i = 0; i < result.length; i++) {
                    selector.options[i] = new Option(result[i].mar_nombre,result[i].mar_codigo);
                }
            }
        });
    }
}
