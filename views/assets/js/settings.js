$("#frmNewRol").submit(function(e) {
    e.preventDefault();
    dataUser = [];
    dataProducts = [];
    dataOrder = [];
    dataQuation = [];
    dataRoutes = [];

    var modUser = false;
    var modProducts = false;
    var modOrder = false;
    var modQuation = false;
    var modRoute = false;

    var rolName = $("input[name=data-rol-name]").val();
    $("input[name=data-rol-users]").each(function(){
        if ($(this).prop("checked")) {
            dataUser.push($(this).val());
            modUser = true;
        }
    });
    $("input[name=data-rol-products]").each(function(){
        if ($(this).prop("checked")) {
            dataProducts.push($(this).val());
            modProducts = true;
        }
    });
    $("input[name=data-rol-order]").each(function(){
        if ($(this).prop("checked")) {
            dataOrder.push($(this).val());
            modOrder = true;
        }
    });
    $("input[name=data-rol-quoation]").each(function(){
        if ($(this).prop("checked")) {
            dataQuation.push($(this).val());
            modQuation = true;
        }
    });
    $("input[name=data-rol-routes]").each(function(){
        if ($(this).prop("checked")) {
            dataRoutes.push($(this).val());
            modRoute = true;
        }
    });
    dataReal = [];
    dataReal.push(rolName);
    if (modUser==true) {
        dataReal.push(dataUser);
    }
    if (modProducts==true) {
        dataReal.push(dataProducts);
    }
    if (modOrder==true) {
        dataReal.push(dataOrder);
    }
    if (modQuation==true) {
        dataReal.push(dataQuation);
    }
    if (modRoute==true) {
        dataReal.push(dataRoutes);
    }
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
