$(".inputuser").focus(function(){
  $(this).parent().addClass("color-labeluser mover-labeluser");
});

$(".inputuser").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser");
    $(this).parent().removeClass("color-labeluser");
});
$(".inputuser2").focus(function(){
  $(this).parent().addClass("color-labeluser2 mover-labeluser2");
});

$(".inputuser2").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser2");
    $(this).parent().removeClass("color-labeluser2");
});

var CloseModal = document.getElementById('closeConfir');
var modal = document.getElementById('modalConfir');
CloseModal.onclick= function(){
  modal.style.display = "none";
}
