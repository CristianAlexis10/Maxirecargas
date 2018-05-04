$(".input").focus(function(){
  $(this).parent().addClass("clr-label mov-label");
});
$(".input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label");
    $(this).parent().removeClass("clr-label");
});
$('#tipo_usu').change(function(){
  var tipo = $('#tipo_usu').val();
  console.log(tipo);
  if (tipo=="juridica") {
    $('#frmNewUserMobile').hide();
    $('#frmNewBusiMobile').show();
  }else {
    $('#frmNewUserMobile').show();
    $('#frmNewBusiMobile').hide();
  }
});

var IrParte2N = document.getElementById('normalIrParte2');
var IrParte3N = document.getElementById('normalIrParte3');
var IrAtrasParte1N = document.getElementById('irAtras');
var IrAtrasParte2N = document.getElementById('irAtras2');

IrParte2N.onclick= function() {
  $("#normalMobile--part1").hide();
  $("#normalMobile--part2").show();
}
IrParte3N.onclick = function() {
  $("#normalMobile--part2").hide();
  $("#normalMoibile--part3").show();
}
IrAtrasParte1N.onclick = function(){
  $("#normalMobile--part1").show();
  $("#normalMobile--part2").hide();
}
IrAtrasParte2N.onclick = function(){
  $("#normalMobile--part2").show();
  $("#normalMoibile--part3").hide();
}
