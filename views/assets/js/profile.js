$(".input--profile").focus(function(){
  $(this).parent().addClass("color-labelProfile");
});

$(".input--profile").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("color-labelProfile");
});
