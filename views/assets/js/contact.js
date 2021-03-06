//forulario de contacto
if (document.getElementById('closeModal')) {
  var closecontactar = document.getElementById('closeModal');
  var modal = document.getElementById('modalcontactar');
  closecontactar.onclick = function(){
    modal.style.display = "none";
  }
}
$("#frmContact").submit(function(e) {
  e.preventDefault();
  if ($("#name").val() != "" && $("#email").val() != "" && $("#asunto").val() != "" && $("#messageContact").val()!="") {
      $.ajax({
        url:"enviar-correo",
        type:"post",
        dataType:"json",
        data:({name : $("#name").val() , email : $("#email").val() , asunto : $("#asunto").val() , message : $("#messageContact").val() }),
        beforeSend:function(){
          $("#buttonContact").after("<div class='message'>Enviando...</div>");
        },
        success:function(response){
            $(".message").remove();
          $("#buttonContact").after("<div class='message'>"+response+"</div>");
          $("#frmContact")[0].reset();
          setTimeout(function() {
            $(".message").remove();
          },3000);
        },
        error:function(response){
          console.log(response);
          $(".message").remove();
        $("#buttonContact").after("<div class='message'>"+response+"</div>");
        setTimeout(function() {
          $(".message").remove();
        },3000);
        }
      });
  }else{
    console.log($("#messageContact").val());
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
     contentType: "application/json; charset=utf-8",
    dataType:"json",
    success:function(result){
      // console.log(result);
      document.getElementById('telephone').innerHTML = result[0].gw_ct_telefono+"-"+result[0].gw_ct_telefono_2;
      document.getElementById('smartPhone').innerHTML = result[0].gw_ct_whatsapp;
      document.getElementById('emailMaxi').innerHTML = result[0].gw_ct_correo;
      document.getElementById('dirMaxi').innerHTML = result[0].gw_ct_direccion;

      document.getElementById('tel1').innerHTML = result[0].gw_ct_telefono;
      document.getElementById('tel2').innerHTML = result[0].gw_ct_telefono_2;
      document.getElementById('wpp').innerHTML = result[0].gw_ct_whatsapp;

      //sections
      document.getElementById('desMaxi').innerHTML = result[0].desc;
      document.getElementById('mision').innerHTML = result[0].mision;
      document.getElementById('vision').innerHTML = result[0].vision;
      document.getElementById('politicas').innerHTML = result[0].politicas;

    },
    error:function(result){
      console.log(result);
    }
  });
}
