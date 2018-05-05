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

var irParte2Buss = document.getElementById('businessIrParte2');
var atrasParte1Buss= document.getElementById('irAtrasbusiMobile');
var irParte3Buss = document.getElementById('businessIrParte3Mobile');
var atrasParte2Buss= document.getElementById('irAtras3busiMobile');
var irParte4Buss= document.getElementById('businessIrParte4Mobile');
var atrasParte3Buss= document.getElementById('irAtras4busiMobile');

irParte2Buss.onclick = function() {
  $("#businessMobile--parte1").hide();
  $("#businessMobile--parte2").show();
}
atrasParte1Buss.onclick = function() {
  $("#businessMobile--parte1").show();
  $("#businessMobile--parte2").hide();
}
irParte3Buss.onclick = function() {
  $("#businessMobile--parte2").hide();
  $("#businessMobile--parte3").show();
}
atrasParte2Buss.onclick= function() {
  $("#businessMobile--parte3").hide();
  $("#businessMobile--parte2").show();
}
irParte4Buss.onclick= function () {
  $("#businessMobile--parte3").hide();
  $("#businessMobile--parte4").show();
}
atrasParte3Buss.onclick= function(){
  $("#businessMobile--parte4").hide();
  $("#businessMobile--parte3").show();
}
