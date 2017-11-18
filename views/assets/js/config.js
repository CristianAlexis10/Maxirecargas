if (document.getElementById('cuidad')) {
    $.ajax({
        url: "index.php?controller=config&a=selectCity",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('cuidad');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].ciu_nombre,result[i].id_ciudad);
            }
        }
    });
}
if (document.getElementById('tipo_usu')) {
    $.ajax({
        url: "index.php?controller=config&a=selectRole",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('tipo_usu');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].tip_usu_rol,result[i].tip_usu_codigo);
            }
        }
    });
}
if (document.getElementById('tip_doc')) {
    $.ajax({
        url: "index.php?controller=config&a=selectTipDoc",
        type: "POST",
        dataType:'json',
        success: function(result){
            var selector = document.getElementById('tip_doc');
            for (var i = 0; i < result.length; i++) {
                selector.options[i] = new Option(result[i].tip_doc_nombre,result[i].id_tipo_documento);
            }
        }
    });
}

if(document.getElementById('sexo')){
  $.ajax({
    url: "",
    type:"POST",
    dataType:'json',
    success: function(result){
      var selector = document.getElementById('sexo')
    }
  })
}


// if(document.getElementById('valores')){
//     $('#valores').click(function(){
//     var servicios= [];
//            $("input[name=ch-tip-ser").each(function(){
//                 if ($( this ).is( ":checked" )  ) {
//                    servicios.push($(this).val());
//                 }
//             });
//                    console.log(servicios);  

//     });

// }



//REGISTRAR USUARIO
   $("#frmNewUser").submit(function(e) {
        e.preventDefault();
        var rol = $('#tipo_usu').val();
        if (rol != 3) {
                dataJson = [];
            

                $(".dataCl").each(function(){
                                  structure = {}
                                  structure = $(this).val();
                                  dataJson.push(structure);
                              });
                console.log(dataJson);
                  // $.ajax({
                  //         url: "guardar-usuario",
                  //         type: "POST",
                  //          dataType:'json',
                  //          data: ({data: dataJson}),
                  //          success: function(result){
                  //           if (result==true) {
                  //             $("#frmNewUser").after("<div class='message'>Registrado Exitosamente</div>");
                  //           }else{
                  //             $("#frmNewUser").after("<div class='message'>"+result+"</div>");
                  //           }
                  //            setTimeout(function(){
                  //               $('div.message').remove();
                  //             }, 2000);
                  //          },
                  //          error: function(result){
                  //             console.log(result);
                  //          }
                  // });
            
        }
    });