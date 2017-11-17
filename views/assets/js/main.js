
$(".input").focus(function(){
  $(this).parent().addClass("porfa listo");
});

$(".input").focusout(function(){
  if ($(this).val() === "")
    $(this).parent().removeClass("listo");
    $(this).parent().removeClass("porta");
});

//SERVICES
    //new-service
    $("#frmNewService").submit(function(e) {
        e.preventDefault();
        if ($(this).parsley().isValid()) {
                dataJson = [];
             $("input[name=dataNewService]").each(function(){
                  structure = {}
                  structure = $(this).val();
                  dataJson.push(structure);
              });
             dataJson.push($('#des').val());
                $.ajax({
                  url: "guardar-servicio",
                  type: "POST",
                   dataType:'json',
                   data: ({data: dataJson}),
                   success: function(result){
                    if (result) {
                      $("#frmNewService").after("<div class='message'>Registrado Exitosamente</div>");
                    }else{
                      $("#frmNewService").after("<div class='message'>Ocurrio un error</div>");
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
    //update-service
    $("#frmUpdateService").submit(function(e) {
        e.preventDefault();
        if ($(this).parsley().isValid()) {
                dataJson = [];
             $("input[name=dataUpdateService]").each(function(){
                  structure = {}
                  structure = $(this).val();
                  dataJson.push(structure);
              });
             dataJson.push($('#des').val());
                $.ajax({
                  url: "guardar-modificacion-servicio",
                  type: "POST",
                   dataType:'json',
                   data: ({data: dataJson}),
                   success: function(result){
                    if (result==true) {
                      $("#frmUpdateService").after("<div class='message'>Actualizado Exitosamente</div>");
                    }else{
                      $("#frmUpdateService").after("<div class='message'>Ocurrio un error</div>");
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
    //delete-service
    function confirmDeleteService(value){
         var ya = false;
    	if(confirm('¿Eliminar este registro?')){
            $.ajax({
    	      url: 'eliminar-servicio',
    	      type:'post',
    	      dataType:'json',
    	      data:'data='+value,
    	  }).done(function(response){
              console.log(response);
              var ya = true;
              $('#dataTipSer').load('index.php?controller=datatables&a=dataTableServices');
              $("#dataTipSer").after("<div class='message'>"+response+"</div>");
              setTimeout(function(){
                 $('div.message').remove();
               }, 2000);
    	  });
    		return true;
    	}else{
    		return false;
    	}
    }


    //MARCAS
        //new-mark
        $("#frmNewMar").submit(function(e) {
            e.preventDefault();
            if ($(this).parsley().isValid()) {
                    dataJson = [];
                 $("input[name=dataNewMark]").each(function(){
                      structure = {}
                      structure = $(this).val();
                      dataJson.push(structure);
                  });
                 dataJson.push($('#desMar').val());
                    $.ajax({
                      url: "guardar-marca",
                      type: "POST",
                       dataType:'json',
                       data: ({data: dataJson}),
                       success: function(result){
                        if (result) {
                          $("#frmNewMar").after("<div class='message'>Registrado Exitosamente</div>");
                        }else{
                          $("#frmNewMar").after("<div class='message'>Ocurrio un error</div>");
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
        //delete-mark
        function confirmDeleteMark(value){
        	if(confirm('¿Eliminar este registro?')){
                $.ajax({
        	      url: 'eliminar-marca',
        	      type:'post',
        	      dataType:'json',
        	      data:'data='+value,
        	  }).done(function(response){
                  console.log(response);
                  $('#datamark').load('index.php?controller=datatables&a=dataTableTrademark');
                  $("#datamark").after("<div class='message'>"+response+"</div>");
                  setTimeout(function(){
                     $('div.message').remove();
                   }, 2000);
        	  });
        		return true;
        	}else{
        		return false;
        	}
        }
        //update-mark
        $("#frmUpdateMark").submit(function(e) {
            e.preventDefault();
            if ($(this).parsley().isValid()) {
                    dataJson = [];
                 $("input[name=dataUpdateMark]").each(function(){
                      structure = {}
                      structure = $(this).val();
                      dataJson.push(structure);
                  });
                 dataJson.push($('#desMark').val());
                    $.ajax({
                      url: "guardar-modificacion-marca",
                      type: "POST",
                       dataType:'json',
                       data: ({data: dataJson}),
                       success: function(result){
                        if (result==true) {
                          $("#frmUpdateMark").after("<div class='message'>"+result+"</div>");
                        }else{
                          $("#frmUpdateMark").after("<div class='message'>"+result+"</div>");
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

//Categories
            //new-mark
            $("#frmNewCategorie").submit(function(e) {
                e.preventDefault();
                if ($(this).parsley().isValid()) {
                        dataJson = [];
                     $("input[name=dataNewCate]").each(function(){
                          structure = {}
                          structure = $(this).val();
                          dataJson.push(structure);
                      });
                     dataJson.push($('#desCat').val());
                        $.ajax({
                          url: "guardar-categoria",
                          type: "POST",
                           dataType:'json',
                           data: ({data: dataJson}),
                           success: function(result){
                            if (result) {
                              $("#dataTipSer").after("<div class='message'>"+result+"</div>");
                            }else{
                              $("#dataTipSer").after("<div class='message'>"+result+"</div>");
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

            //delete-categories
            function confirmDeleteCategories(value){
                if(confirm('¿Eliminar este registro?')){
                    $.ajax({
                      url: 'eliminar-categoria',
                      type:'post',
                      dataType:'json',
                      data:'data='+value,
                  }).done(function(response){
                      console.log(response);
                      $('#dataCategories').load('index.php?controller=datatables&a=dataTableCategories');
                      $("#dataCategories").after("<div class='message'>"+response+"</div>");
                      setTimeout(function(){
                         $('div.message').remove();
                       }, 2000);
                  });
                    return true;
                }else{
                    return false;
                }
            }






// animacion de los inputs

$(".input--liner").focus(function(){
  $(this).parent().addClass("clr-label-liner mov-label-liner");
});

$(".input--liner").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-liner");
    $(this).parent().removeClass("clr-label-liner");
});

// tabs
 $( function() {
    $( "#tabs" ).tabs();
  } );
  $( function() {
     $( "#tabsConf" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
     $( "#tabsConf li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
   } );
// datagrid
 $("#dataGrid").DataTable();
 $("#dataGrid1").DataTable();
 $(".datatable").DataTable();


$(".frm-bussiness").hide();

$('#tipo_usu').change(function(){
  var value = $('#tipo_usu').val();
  mostrar(value);
});
function mostrar(value) {
  if (value == 2) {
    $(".frm-bussiness").show();

  }else{
    $(".frm-bussiness").hide();

  }
}

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
         $('#answer-user').show();
        $('#answer-user').html('usuario no valido');
         num_doc = true;
     }else{
         $('#answer-user').hide();
      num_doc = false;
     }
      enable(num_doc,contra);
  });
});
//contraseñas
$('#contra').keyup(function(){
  var contra_ingresada = $('#contra').val().length;
  if (contra_ingresada<8) {
    $('.answer').html('La clave debe tener al menos 8 caracteres');
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
  }
  if (contra_ingresada>25) {
    $('.answer').html('La clave no puede tener más de 25 caracteres');
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
  }
  if (minusculas($('#contra').val())==0) {
    $('.answer').html('La clave debe tener al menos una letra minúscula');
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
  }
  if (mayusculas($('#contra').val())==0) {
    $('.answer').html('La clave debe tener al menos una letra mayuscula');
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
  }
  if (numeros($('#contra').val())==0) {
    $('.answer').html('La clave debe tener al menos un caracter numérico');
    contra=false;
    $('#rep_contra').attr('disabled',true);
    return ;
  }
  if ($('#contra').val().indexOf(" ")!=-1) {
   $('.answer').html( "La clave no debe tener espacios en blaco");
   contra=false;
   $('#rep_contra').attr('disabled',true);
   return ;
  }
  $('.answer').html("");
  $('#rep_contra').attr('disabled',false);
});

//repetir contra
$('#rep_contra').keyup(function(){
  var rep_contra = $('#rep_contra').val();
  if (rep_contra===$('#contra').val()) {
    contra=true;
    $('.answer2').html('');
  }else{
    contra=false;
    $('.answer2').html('las contraseñas no coinciden');
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
    $('#registrar').attr('disabled',false);
  }
}

// settings
$("input[name='checkcliente']").change(function(){
      if($(this).prop("checked")){
        $("#module-cliente .wrap--perms").find("input").removeAttr("disabled")
        $(".wrap--perms").toggleClass("perms--hide")
      }else{
        $(".wrap--perms").toggleClass("perms--hide")
        $("#module-cliente .wrap--perms").find("input").attr("disabled",true)
        $("#module-cliente .wrap--perms").find("input").attr("checked",false)
      }
});
$("input[name='checkpro']").change(function(){
      if($(this).prop("checked")){
        $("#module-producto .wrap--permsprod").find("input").removeAttr("disabled")
        $(".wrap--permsprod").toggleClass("perms--prod")
      }else{
        $(".wrap--permsprod").toggleClass("perms--prod")
        $("#module-producto .wrap--permsprod").find("input").attr("disabled",true)
        $("#module-producto .wrap--permsprod").find("input").attr("checked",false)
      }
});
$("input[name='checkpedido']").change(function(){
      if($(this).prop("checked")){
        $("#module-pedido .wrap--permspedi").find("input").removeAttr("disabled")
        $(".wrap--permspedi").toggleClass("perms--pedi")
      }else{
        $(".wrap--permspedi").toggleClass("perms--pedi")
        $("#module-pedido .wrap--permspedi").find("input").attr("disabled",true)
        $("#module-pedido .wrap--permspedi").find("input").attr("checked",false)
      }
});
$("input[name='checkcotiza']").change(function(){
      if($(this).prop("checked")){
        $("#module-cotizaciones .wrap--permscot").find("input").removeAttr("disabled")
        $(".wrap--permscot").toggleClass("perms--cot")
      }else{
        $(".wrap--permscot").toggleClass("perms--cot")
        $("#module-cotizaciones .wrap--permscot").find("input").attr("disabled",true)
        $("#module-cotizaciones .wrap--permscot").find("input").attr("checked",false)
      }
});
$("input[name='checkruta']").change(function(){
      if($(this).prop("checked")){
        $("#module-ruta .wrap--permsruta").find("input").removeAttr("disabled")
        $(".wrap--permsruta").toggleClass("perms--ruta")
      }else{
        $(".wrap--permsruta").toggleClass("perms--ruta")
        $("#module-ruta .wrap--permsruta").find("input").attr("disabled",true)
        $("#module-ruta .wrap--permsruta").find("input").attr("checked",false)
      }
});
$("input[name='checkcolor']").change(function(){
  if($(this).prop("checked")){
    $(".main--nav").addClass("main--navdark")
    $(".menu--top").addClass("menu--toposcuro")
    $(".navigator").addClass("navigatordark")
  }else {
    $(".main--nav").removeClass("main--navdark")
    $(".menu--top").removeClass("menu--toposcuro")
  }
})

// new customers
$('#tipo_usu').change(function(){
var typeUser =$('#tipo_usu').val();
  if (typeUser ==3) {
    console.log("yes")
    $(".customers--normal").addClass("normaldes")
    $(".customers--business").toggleClass("businessaparece")
  } else if (typeUser == 1) {
    $(".customers--normal").removeClass("normaldes")
    $(".customers--business").toggleClass("businessaparece")

    console.log("maldito");
  }
});
