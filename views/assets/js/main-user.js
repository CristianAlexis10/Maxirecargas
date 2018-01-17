$("#who").click(function(){
  $(".two").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});

$("#our").click(function(){
  $(".three").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});

$("#contc").click(function() {
  $(".four").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});


var close_mobile = document.getElementById('close--mobile');
var open_mobile = document.getElementById('menu-mobile');
var modal_mobile = document.getElementById('wrap--menu--mobile');

close_mobile.onclick = function(){
  modal_mobile.style.display = "none"
};
open_mobile.onclick = function(){
  modal_mobile.style.display = "flex"
};


// animacion de los inputs
$(".input-contact").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input-contact").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});

$(".input--login").focus(function(){
  $(this).parent().addClass("clr-label-login mov-label-login");
});

$(".input--login").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-login");
    $(this).parent().removeClass("clr-label-login");
});
// inputs form_mobile
$(".wrap_input_mobile").focus(function(){
  $(this).parent().addClass("clr-label-login mov-label-login");
});

$(".wrap_input_mobile").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-login");
    $(this).parent().removeClass("clr-label-login");
});
// abrir y cerra modal mobile_pass

var modalMobile = document.getElementById('modal_mobile');
var closeMobile= document.getElementById('modal_close_mobile');
var openMobile= document.getElementById('session_mobile')

openMobile.onclick= function(){
  modalMobile.style.display = "block";
};
closeMobile.onclick = function(){
  modalMobile.style.display = "none"
};
