
$(".input").focus(function(){
  $(this).parent().addClass("porfa listo");
});

$(".input").focusout(function(){
  if ($(this).val() === "")
    $(this).parent().removeClass("listo");
    $(this).parent().removeClass("porta");
});

// @user: Cristian Lopera
 $( function() {
    $( "#tabs" ).tabs();
  } );

 $("#dataGrid").DataTable();
 $("#dataGrid1").DataTable();

 $(".datatable").DataTable();
function confirmDelete(){
	if(confirm('¿Eliminar este registro?')){
		return true;
	}else{
		return false;
	}
}
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

//VALIDACIONES
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
    $('#answer-user').html(response);
    if (response=='') {
         num_doc = true;
     }else{
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
    $('#registrar').attr('disabled',true);
  }
}

