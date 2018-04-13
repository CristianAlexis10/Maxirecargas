$(".input").focus(function(){
  $(this).parent().addClass("clr-label mov-label");
});

$(".input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label");
    $(this).parent().removeClass("clr-label");
});

var typeUser = $("#tipo_usu").val();
console.log(typeUser);
