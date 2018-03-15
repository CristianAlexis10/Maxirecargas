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

// var open = document.getElementById('puto');
// var opcions = document.getElementById('user--dropdown');
// var cerrarOpc = $("section");

$("#puto").click(function(){
  $("#user--dropdown").css("display","flex");
  setTimeout(function(){
    $("#user--dropdown").css("display","none");
  },5000);
});
//
// open.onmouseover = function(){
//   opcions.style.display = "flex";
// };


// animacon de inputs
$(".input-contact").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input-contact").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});
