$("#uploadImage").hide();
$("#cropp-img").click(function(){
    $("#uploadImage").toggle();
});


$uploadCrop = $('#wrap-upload').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250
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

    $.ajax({
      url: "cropp-trademark",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
          console.log(data);
        html = '<img src="' + resp + '" />';
        $('.modal').modal('close');
        $("#wrap-result").html(html);
        console.log(data);
        $("#img").val(data);
      }
    });
  });
});
