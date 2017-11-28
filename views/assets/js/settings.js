$("#frmNewRol").submit(function(e) {
    e.preventDefault();
    dataUser = [];
    dataProducts = [];
    dataOrder = [];
    dataQuation = [];
    dataRoutes = [];

    // var user 
    var rolName = $("input[name=data-rol-name]").val();
    $("input[name=data-rol-users]").each(function(){
        if ($(this).prop("checked")) {
            dataUser.push($(this).val());
        }
    });
    $("input[name=data-rol-products]").each(function(){
        if ($(this).prop("checked")) {
            dataProducts.push($(this).val());
        }
    });
    $("input[name=data-rol-order]").each(function(){
        if ($(this).prop("checked")) {
            dataOrder.push($(this).val());
        }
    });
    $("input[name=data-rol-quoation]").each(function(){
        if ($(this).prop("checked")) {
            dataQuation.push($(this).val());
        }
    });
    $("input[name=data-rol-routes]").each(function(){
        if ($(this).prop("checked")) {
            dataRoutes.push($(this).val());
        }
    });
    dataReal = [];
    dataReal.push(rolName);
    dataReal.push(dataUser);
    dataReal.push(dataProducts);
    dataReal.push(dataOrder);
    dataReal.push(dataQuation);
    dataReal.push(dataRoutes);
    console.log(dataReal);
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
