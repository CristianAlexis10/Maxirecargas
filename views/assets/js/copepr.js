
$(".input").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});
