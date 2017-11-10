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
