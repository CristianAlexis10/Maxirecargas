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

var open = document.getElementById('puto');
var opcions = document.getElementById('user--dropdown');


open.onclick = function(){
  opcions.style.display = "flex";
};

window.onclick = function(event) {
  console.log(event.path[1]);
    if (event.path[1].id == '') {
        opcions.style.display = "none";

    }
};

// animacon de inputs
$(".input-contact").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input-contact").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});
