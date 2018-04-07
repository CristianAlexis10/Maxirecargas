// $("#uploadImage").hide();
// $("#cropp-img").click(function(){
//     $("#uploadImage").toggle();
// });

var modalimg= document.getElementById('img-product');
var startmodal = document.getElementById('cropp-img');
var closeImg = document.getElementById('closeImg');

startmodal.onclick = function() {
  modalimg.style.display = "flex";
}
closeImg.onclick = function(){
  modalimg.style.display="none"
  console.log("puto cierra");
}

$uploadCrop = $('#wrap-upload').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250,
         type: 'circle'
    },
    boundary: {
        width: 350,
        height: 350
    }
});

//cada que se selecione un archivo carga
$('#upload').on('change', function () {
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        // console.log('imagen recortada');
      });

    }
    reader.readAsDataURL(this.files[0]);
});
$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {

    var cadena = resp,
    separador = ";",
    limite    = 2,
    arregloDeSubCadenas = cadena.split(separador, limite);

        $.ajax({
            url:"cropp-profile",
            type:"post",
            dataType:"json",
            data:{"image":arregloDeSubCadenas},
            success:function(data){
                console.log(data);
                html = '<img src="' + resp + '" />';
                $('.modal').modal('close');
                $("#img-product").empty();
                $("#img-product").hide();
                $("#wrap-result").html(html);
                $("#img").val(data);
            },
            error:function(res){console.log(res)}
        });
  });
});
//modificar usuario
$("#frmUpdateProfile").submit(function(e) {
    e.preventDefault();
    var data = [];
    $(".dataCl").each(function() {
      data.push($(this).val());
    });
    $.ajax({
      url:"modificar-mi-perfil",
      type:"post",
      dataType:"json",
      data:({data:data}),
      success:function(result) {
        if (result==true) {
            $("#frmUpdateProfile").after("<div class='message'>Midificación Exitosa.</div>");
        }else{
          $("#frmUpdateProfile").after("<div class='message'>"+result+"</div>");
        }
        setTimeout(function(){$("div.message").remove()},3000);
      },
      error:function(result) {
        console.log(result);
      }
    });
});
//cambiar contraseña
$("#updatePassword").submit(function(e){
  e.preventDefault();
  if (confirm("¿Cambiar contraseña?")) {
    if ($("#password").val() != "" && $("#new_password").val() != "" && $("#confirmCon").val() != "" ) {
        $.ajax({
          url:"cambiar-contrasena",
          type:"post",
          dataType:"json",
          data:({pas:$("#password").val() , new_pas: $("#new_password").val() , new_pas2: $("#confirmCon").val()}),
          success:function(result){
            console.log(result);
            if (result==true) {
              $("#updatePassword").after("<div class='message'>Modificación Exitosa.</div>");
              $("#updatePassword")[0].reset();
            }else{
              $("#updatePassword").after("<div class='message'>"+result+"</div>");
            }
          },
          error:function(result){console.log(result);}
        });
    }else{
      $("#updatePassword").after("<div class='message'>Campos vacios</div>");
    }
    setTimeout(function(){$("div.message").remove()},3000);
  }
});
