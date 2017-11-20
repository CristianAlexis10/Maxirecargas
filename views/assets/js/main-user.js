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

var close = document.getElementById("close");
var start = document.getElementById("session");
var modal = document.getElementById('modal--session');
var close_mobile = document.getElementById('close--mobile');
var open_mobile = document.getElementById('menu-mobile');



start.onclick = function(){
  modal.style.display = "block";
};

close.onclick =function(){
  modal.style.display = "none"
};


close_mobile.onclick = function(){
  document.getElementById("wrap--menu--mobile").style.display = "none"
};

open_mobile.onclick = function(){
  document.getElementById("wrap--menu--mobile").style.display = "flex"
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
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
