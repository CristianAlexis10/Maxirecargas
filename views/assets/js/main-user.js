$("#who").click(function(){
  $(".two").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

$("#our").click(function(){
  $(".three").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

$("#contc").click(function() {
  $(".four").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

var close = document.getElementById("close");
var start = document.getElementById("session");
var modal = document.getElementById('modal--session');

start.onclick = function(){
  modal.style.display = "block";
};

close.onclick =function(){
  modal.style.display = "none"
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
};

var signin = document.getElementById('signin');
var modalSignin =document.getElementById('modal--signin');
signin.onclick = function() {
   modalSignin.style.display= "block";
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
