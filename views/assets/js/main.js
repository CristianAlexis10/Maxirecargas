
$(".input").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
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
                    if (result==true) {
                      $("#frmNewService").after("<div class='message'>Registrado Exitosamente</div>");
                      $("#frmNewService")[0].reset();
                    }else{
                      $("#frmNewService").after("<div class='message'>"+result+"</div>");
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
                         console.log(result);
                        if (result==true) {
                          $("#frmNewMar").after("<div class='message'>Registrado Exitosamente</div>");
                          $("input[name=dataNewMark]").each(function(){
                              $(this).val(" ");
                              $('#desMar').val(" ");
                              // $("#wrap-upload").hide();
                           });
                           setTimeout(function(){
                              $('div.message').remove();
                            }, 3000);

                          selectMark();
                        }else{
                          $("#frmNewMar").after("<div class='message'>"+result+"</div>");
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
                            if (result==true) {
                              $("#frmNewCategorie").after("<div class='message'>Registrado Exitosamente.</div>");
                              $("#frmNewCategorie")[0].reset();
                              selectCategory();
                            }else{
                              $("#frmNewCategorie").after("<div class='message'>"+result+"</div>");
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

//select
function selectCategory(){
    if (document.getElementById('categoria')) {
        $.ajax({
            url: "index.php?controller=config&a=selectCategory",
            type: "POST",
            dataType:'json',
            success: function(result){
                var selector = document.getElementById('categoria');
                for (var i = 0; i < result.length; i++) {
                    selector.options[i] = new Option(result[i].tip_pro_nombre,result[i].tip_pro_codigo);
                }
            }
        });
    }
}

if (document.getElementById('categoria')) {
    $(".new--category").hide();
    $('#categoria').change(function(){
        var value = $('#categoria').val();
        if (value == 'newCategory') {
            $(".new--category").show();
            console.log('otro');
        }
    });
}
if (document.getElementById('closeNewCt')) {
 var closeModalCt = document.getElementById('closeNewCt');
 var modalCategory = document.getElementById('modal--newCt');

 closeModalCt.onclick= function() {
   modalCategory.style.display= "none";

 }

}


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
    console.log(response);
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
 $(".employe-rol").hide();
$('#tipo_usu').change(function(){
var typeUser= $('#tipo_usu').val();
  console.log(typeUser);
  if (typeUser==3) {
    $(".customers--normal").addClass("normaldes")
    $(".customers--business").addClass("businessaparece")
     $(".employe-rol").hide();
  }else if(typeUser=="maxi"){
      $(".customers--normal").removeClass("normaldes")
    $(".customers--business").removeClass("businessaparece")
      $(".employe-rol").show();
  }else {
    $(".customers--normal").removeClass("normaldes")
    $(".customers--business").removeClass("businessaparece")
     $(".employe-rol").hide();
  }
 });


//REGISTRAR PRODUCTO
   $("#frmNerProduct").submit(function(e) {
        e.preventDefault();
        dataJson = [];
        var servicios= [];
        // $("input[name=ch-tip-ser").each(function(){
        //         if ($( this ).is( ":checked" )  ) {
                   servicios.push($("#selectMul").val());
        //         }
        // });

        $(".data-new-pro").each(function(){
                          structure = {}
                          structure = $(this).val();
                          dataJson.push(structure);
                      });
        // console.log(servicios);
          $.ajax({
                  url: "guardar-producto",
                  type: "POST",
                   dataType:'json',
                   data: ({data: dataJson, services:servicios}),
                   success: function(result){
                     console.log(result);
                    if (result==true) {
                      location.href = "crear-inventario";
                      $("#frmNerProduct").after("<div class='message'>Registrado Exitosamente</div>");
                    }else{
                      $("#frmNerProduct").after("<div class='message'>"+result+"</div>");
                    }
                     setTimeout(function(){
                        $('div.message').remove();
                      }, 2000);
                   },
                   error: function(result){
                      console.log(result);
                   }
          });
    });



    //delete-producto
    function confirmDeleteProduct(value){
        // console.log(value);
    	if(confirm('¿Eliminar este registro?')){
            $.ajax({
    	      url: 'eliminar-producto',
    	      type:'post',
    	      dataType:'json',
    	      data:({data:value}),
            success:function(response){
              console.log(response);
              $('#datableProduct').load('index.php?controller=datatables&a=dataTableProduct');
              $("#datableProduct").after("<div class='message'>"+response+"</div>");
              setTimeout(function(){
                 $('div.message').remove();
               }, 3000);
          },
          error:function(response){console.log(response);}
        });
          return true;
    	}else{
    		return false;
    	}
    }


//ELIMINAR USUARIO
function confirmDeleteUser(value){
     var ya = false;
    if(confirm('¿Eliminar este registro?')){
        $.ajax({
          url: 'eliminar-usuario',
          type:'post',
          dataType:'json',
          data:'data='+value,
      }).done(function(response){
          console.log(response);
          $('#datatableUser').load('index.php?controller=datatables&a=dataTableUser');
          $("#datatableUser").after("<div class='message'>"+response+"</div>");
          setTimeout(function(){
             $('div.message').remove();
           }, 2000);
      });
        return true;
    }else{
        return false;
    }
}
//INACTIVAR USUARIO
function confirmOffUser(action,value){
     var ya = false;
     var message;
     if (action==1) {
        message = 'Activar';
     }else{
        message = 'Inactivar';
     }
    if(confirm('¿'+message+'  este registro?')){
        $.ajax({
          url: 'inactivar-usuario',
          type:'post',
          dataType:'json',
          data:'data='+value+'&estado='+action,
      }).done(function(response){
          // console.log(response);
          $('#datatableUser').load('index.php?controller=datatables&a=dataTableUser');
          $("#datatableUser").after("<div class='message'>"+response+"</div>");
          setTimeout(function(){
             $('div.message').remove();
           }, 2000);
      });
        return true;
    }else{
        return false;
    }
}
//INACTIVAR USUARIO EMPRESARIAL
function confirmOffUserEmp(action,value){
     var ya = false;
     var message;
     if (action==1) {
        message = 'Activar';
     }else{
        message = 'Inactivar';
     }
    if(confirm('¿'+message+'  este registro?')){
        $.ajax({
          url: 'inactivar-usuario',
          type:'post',
          dataType:'json',
          data:'data='+value+'&estado='+action,
      }).done(function(response){
          // console.log(response);
          $('#datatableCliiEmp').load('index.php?controller=datatables&a=dataTableCliEmp');
          $("#datatableCliiEmp").after("<div class='message'>"+response+"</div>");
          setTimeout(function(){
             $('div.message').remove();
           }, 2000);
      });
        return true;
    }else{
        return false;
    }
}
//INACTIVAR USUARIO Empleado
function confirmOffUserEmpleado(action,value){
     var ya = false;
     var message;
     if (action==1) {
        message = 'Activar';
     }else{
        message = 'Inactivar';
     }
    if(confirm('¿'+message+'  este registro?')){
        $.ajax({
          url: 'inactivar-usuario',
          type:'post',
          dataType:'json',
          data:'data='+value+'&estado='+action,
      }).done(function(response){
          // console.log(response);
          $('#dataEmployee').load('index.php?controller=datatables&a=dataTableEmployee');
          $("#dataEmployee").after("<div class='message'>"+response+"</div>");
          setTimeout(function(){
             $('div.message').remove();
           }, 2000);
      });
        return true;
    }else{
        return false;
    }
}

//MODIFICARUSUARIO
$("#frmUpdtateUser").submit(function(e) {
            e.preventDefault();
                    dataJson = [];
                 $(".userUpdate").each(function(){
                      structure = {}
                      structure = $(this).val();
                      dataJson.push(structure);
                  });
                 // console.log(dataJson);
                    $.ajax({
                      url: "guardar-modificacion-cliente",
                      type: "POST",
                       dataType:'json',
                       data: ({data: dataJson}),
                       success: function(result){
                        // console.log(result);
                          $("#updateUser").after("<div class='message'>"+result+"</div>");
                         setTimeout(function(){
                            $('div.message').remove();
                          }, 3000);
                       },
                       error: function(result){
                          console.log(result);
                       }
                    });
        });
        //ELIMINAR CLIENTE EMPRESARIAL
        function confirmDeleteCliEmp(value){
             var ya = false;
            if(confirm('¿Eliminar este registro?')){
                $.ajax({
                  url: 'eliminar-cliente-empresarial',
                  type:'post',
                  dataType:'json',
                  data:'data='+value,
              }).done(function(response){
                  // console.log(response);
                  $('#datatableCliiEmp').load('index.php?controller=datatables&a=dataTableCliEmp');
                  $("#datatableCliiEmp").after("<div class='message'>"+response+"</div>");
                  setTimeout(function(){
                     $('div.message').remove();
                   }, 2000);
              });
                return true;
            }else{
                return false;
            }
        }


    //modificar empresa
    $("#frmUpdaDataEmp").submit(function(e) {
        e.preventDefault();
                dataJson = [];
             $(".dataEmp").each(function(){
                  structure = {}
                  structure = $(this).val();
                  dataJson.push(structure);
              });
              // console.log(dataJson);
                $.ajax({
                  url: "guardar-modificar-cliente-empresarial",
                  type: "POST",
                   dataType:'json',
                   data: ({data: dataJson}),
                   success: function(result){
                       console.log(result);
                    if (result==true) {
                      $("#frmUpdaDataEmp").after("<div class='message'>Actualizado Exitosamente</div>");
                    }else{
                      $("#frmUpdaDataEmp").after("<div class='message'>"+result+"</div>");
                    }
                     setTimeout(function(){
                        $('div.message').remove();
                      }, 2000);
                   },
                   error: function(result){
                      console.log(result);
                   }
                });
    });
    //campos numericos
    function eliminarLetras(e){
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
