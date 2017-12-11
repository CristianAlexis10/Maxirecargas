$(".inputuser").focus(function(){
  $(this).parent().addClass("color-labeluser mover-labeluser");
});

$(".inputuser").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser");
    $(this).parent().removeClass("color-labeluser");
});
$(".inputuser2").focus(function(){
  $(this).parent().addClass("color-labeluser2 mover-labeluser2");
});

$(".inputuser2").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser2");
    $(this).parent().removeClass("color-labeluser2");
});

$(".inputuser3").focus(function(){
  $(this).parent().addClass("color-labeluser3 mover-labeluser3");
});

$(".inputuser3").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser3");
    $(this).parent().removeClass("color-labeluser3");
});

if (document.getElementById('closeConfir')) {
  var CloseModal = document.getElementById('closeConfir');
  var modal = document.getElementById('modalConfir');
  CloseModal.onclick= function(){
    modal.style.display = "none";
  };
  var openModal = document.getElementById('openModal');
  openModal.onclick = function(){
    modal.style.display = "flex";
    var final = new Object;
      if (localStorage.indice== 0) {
        final[0]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
      }else{
        final[0]={"referencia" : $("#dataprod").val() , "servicio"  : $("#solicitud").val() , "cantidad" :  $("#cantidad").val() };
        console.log(final);
        console.log(localStorage.cotizacion);
      }

  }
}


//views order mover

$('#orderSiguiente').click(function() {
    $('#order--container').animate({
    'marginLeft':"0"
    });
    $('#order--formone').animate({
      'opacity': 0
    });
    $('#order--formtwo').animate({
      'opacity': 1
    });
    $('.order--contenido').animate({
    'marginLeft' : "100%"
    });
});

$('#orderAtras').click(function() {
    $('#order--container').animate({
    'marginLeft' : "50%"
    });
    $('#order--formone').animate({
      'opacity': 1
    });
    $('#order--formtwo').animate({
      'opacity': 0
    });
    $('.order--contenido').animate({
    'marginLeft': "0"
    });
});
