$("#frmNewRol").submit(function(e) {
            dataJson = [];
            $("input[name=data-login]").each(function(){
                structure = {};
                structure = $(this).val();
                dataJson.push(structure);
            });
            // $.ajax({
            //   url: "validar-inicio-sesion",
            //   type: "POST",
            //    dataType:'json',
            //    data: ({data: dataJson}),
            //    success: function(result){
            //      if (result=='customer') {
            //        location.href = 'maxirecargas';
            //         return;
            //      }else  if (result==true) {
            //           location.href = 'dashboard';
            //           return;
            //       }
            //       $('#form--login').after('<div class="message-red">'+result+'</div>');
            //       setTimeout(function(){
            //          $('div.message-red').remove();
            //        }, 2000);
            //    },
            //    error: function(result){
            //       console.log(result);
            //    }
            // });

});
