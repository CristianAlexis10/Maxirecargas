//forulario de contacto
var closecontactar = document.getElementById('closeModal');
var modal = document.getElementById('modalcontactar');
closecontactar.onclick = function(){
  modal.style.display = "none";
}
$("#frmContact").submit(function(e) {
  e.preventDefault();
  if ($("#name").val() != "" && $("#email").val() != "" && $("#asunto").val() != "" && $("#message").val()!="") {
      $.ajax({
        url:"enviar-correo",
        type:"post",
        dataType:"json",
        data:({name : $("#name").val() , email : $("#email").val() , asunto : $("#asunto").val() , message : $("#message").val() }),
        beforeSend:function(){
          $("#buttonContact").after("<div class='message'>Enviando...</div>");
        },
        success:function(response){
            $(".message").remove();
          $("#buttonContact").after("<div class='message'>"+response+"</div>");
          setTimeout(function() {
            $(".message").remove();
          },3000);
        },
        error:function(response){
          console.log(response);
        }
      });
  }else{
    $("#buttonContact").after("<div class='message'>Los campos son requeridos</div>");
    setTimeout(function() {
      $(".message").remove();
    },3000);
  }

});
//datos de contacto
if(document.getElementById('telephone')){
  $.ajax({
    url:"datos-contacto",
    type:"post",
    dataType:"json",
    success:function(result){
      // console.log(result[0]);
      document.getElementById('telephone').innerHTML = result[0].gw_ct_telefono+"-"+result[0].gw_ct_telefono_2;
      document.getElementById('smartPhone').innerHTML = result[0].gw_ct_whatsapp;
      document.getElementById('emailMaxi').innerHTML = result[0].gw_ct_correo;
      document.getElementById('dirMaxi').innerHTML = result[0].gw_ct_direccion;

      document.getElementById('tel1').innerHTML = result[0].gw_ct_telefono;
      document.getElementById('tel2').innerHTML = result[0].gw_ct_telefono_2;
      document.getElementById('wpp').innerHTML = result[0].gw_ct_whatsapp;

    },
    error:function(result){
      console.log(result);
    }
  });
}
