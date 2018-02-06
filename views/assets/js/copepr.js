$(".inputYellow").focus(function(){
  $(this).parent().addClass("color-labeluser");
});

$(".inputYellow").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser");
    $(this).parent().removeClass("color-labeluser");
});

$(".inputblue").focus(function(){
  $(this).parent().addClass("color-labelblue mover-labelblue");
});

$(".inputblue").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labelblue");
    $(this).parent().removeClass("color-labelblue");
});

$(".inputmagenta").focus(function(){
  $(this).parent().addClass("color-labelmagent");
});

$(".inputblue").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("color-labelmagent");
    
});



// modals

// var openModal_dir = document.getElementById('btnOtraDir');
// var closeModal_dir = document.getElementById('closemodal_dir');
// var modal_dir = document.getElementById('modal_dir');
//
// openModal_dir.onclick = function() {
//   modal_dir.style.display = "flex";
// }
// closeModal_dir.onclick = function() {
//   modal_dir.style.display= "none";
// }


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

// menu mobile
// var close_mobile = document.getElementById('close--mobile');
// var open_mobile = document.getElementById('menu-mobile');
// var modal_mobile = document.getElementById('wrap--menu--mobile');
//
// close_mobile.onclick = function(){
//   modal_mobile.style.display = "none"
// };
// open_mobile.onclick = function(){
//   modal_mobile.style.display = "flex"
// };

// views product
if (document.getElementById('itemToner')) {
    var toner = document.getElementById('itemToner');
    toner.onclick = function(){
      $(".products").addClass("moverproduct");
      $(".Btoner").addClass("aparecer");
    }
    var bntAtras = document.getElementById('pedAtras');
    bntAtras.onclick = function(){
      console.log("computad");
      $(".product").addClass("moverproduct");
      $(".Btoner").addClass("aparecer");
    }
  }
