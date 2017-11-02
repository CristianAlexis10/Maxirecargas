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


$(".input-contact").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input-contact").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});

// MENU
var menu = document.getElementById('menu');
var menuStart = document.getElementById('wrap--menu');
var closeMenu = document.getElementById('close-menu');

menu.onclick = function(){
  menuStart.style.transform= "translateX(0)";
};

closeMenu.onclick = function(){
  menuStart.style.transform = "translateX(-9999px)";
};
