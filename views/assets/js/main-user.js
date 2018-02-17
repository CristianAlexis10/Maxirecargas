$("#who").click(function(){
  $(".two").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});

$("#our").click(function(){
  $(".three").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});

$("#contc").click(function() {
  $(".four").animatescroll({
    scrollSpeed:2000, easing:'easeOutBack'
  });
});

if (document.getElementById('wrap--menu--mobile') && document.getElementById('menu-mobile')) {
var close_mobile = document.getElementById('close--mobile');
var open_mobile = document.getElementById('menu-mobile');
var modal_mobile = document.getElementById('wrap--menu--mobile');

close_mobile.onclick = function(){
  modal_mobile.style.display = "none"
};
open_mobile.onclick = function(){
  modal_mobile.style.display = "flex"
};
}

// animacion de los inputs
$(".input-contact").focus(function(){
  $(this).parent().addClass("color-label mover-label");
});

$(".input-contact").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-label");
    $(this).parent().removeClass("color-label");
});

$(".input--login").focus(function(){
  $(this).parent().addClass("clr-label-login mov-label-login");
});

$(".input--login").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-login");
    $(this).parent().removeClass("clr-label-login");
});
// inputs form_mobile
$(".wrap_input_mobile").focus(function(){
  $(this).parent().addClass("clr-label-login mov-label-login");
});

$(".wrap_input_mobile").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mov-label-login");
    $(this).parent().removeClass("clr-label-login");
});

// abrir y cerra modal mobile_pass
if (document.getElementById("modal_mobile")) {
var modalMobile = document.getElementById('modal_mobile');
var closeMobile= document.getElementById('modal_close_mobile');
var openMobile= document.getElementById('session_mobile')
openMobile.onclick= function(){
  modalMobile.style.display = "block";
};
closeMobile.onclick = function(){
  modalMobile.style.display = "none"
};
}
//productos
if (document.getElementById('buscar')) {
  $("#buscar").click(function(){
    var category = $("#categoryName")[0].innerHTML;
    var data = $("#readBy").val();
    $.ajax({
      url:"filterProductsCount",
      // url:"filter-products",
      type:"post",
      dataType:"json",
      data:({cat:category,value:data}),
      success:function(result){
          $(".container--grid").empty();
            cambiarPaginaFilter(1,result,category,data);
    },
      error:function(result){console.log(result);}
    });
    //paginacion
    // $.ajax({
    //   url:"filterProductsCount",
    //   type:"post",
    //   dataType:"json",
    //   data:({cat:category,value:data}),
    //   success:function(result){
    //     numeroRegistros = result;
    //     var totalPaginas = Math.ceil((numeroRegistros/12));
    //     $(".container--grid").append("<div class='pagination'></div>");
    //     $(".pagination").css({"display":"flex","flex-direction":"row-reverse"});
    //     while (totalPaginas!=0) {
    //       console.log(totalPaginas);
    //       $(".pagination").append('<h1 onclick="cambiarPagina('+totalPaginas+','+numeroRegistros+')">'+totalPaginas+'</h1>');
    //       totalPaginas=totalPaginas-1;
    //     }
    //   },
    //   error:function(result) {
    //     console.log(result);
    //   }
    // });
  });
}

function cambiarPaginaFilter(pagina,numeroRegistros,category,condition){
  var elementosPagina  = 12;
  var inicio = (pagina-1)*elementosPagina;
    $(".container--grid").empty();
    $.ajax({
      url:"filter-products",
      type:"post",
      dataType:"json",
      data:({cat:category,ini:inicio,totalElePag:elementosPagina,value:condition}),
      success:function(result){
        if (result.length==0) {
            $(".container--grid").append("<div class='query-result'><h1>No hay productos disponibles.</h1></div>");
        }else{
          for (var i = 0; i < result.length; i++) {
            if (result[i].pro_imagen=="icn-maxi.png") {
              $(".container--grid").append('<figure class="vermas"><figcaption>'+result[i].pro_referencia+'</figcaption><img src="views/assets/image/'+result[i].pro_imagen+'" alt=""></figure>');
            }else{
              $(".container--grid").append('<figure class="vermas"><figcaption>'+result[i].pro_referencia+'</figcaption><img src="views/assets/image/products/'+result[i].pro_imagen+'" alt=""></figure>');
            }
          }
          //paginacion
          var totalPaginas = Math.ceil((numeroRegistros/elementosPagina));
          $(".container--grid").append("<div class='pagination'></div>");
          $(".pagination").css({"display":"flex","flex-direction":"row-reverse"});
          while (totalPaginas!=0) {
            $(".pagination").append('<h1 onclick="invocar('+totalPaginas+','+numeroRegistros+','+category+')">'+totalPaginas+'</h1>');
            totalPaginas=totalPaginas-1;
          }
          // if (result.length>12) {
          // }
        }
      },
      error:function(result){
        console.log(result);
      }
    });
}
function invocar(totalPaginas,numeroRegistros,category){
  cambiarPaginaFilter(totalPaginas,numeroRegistros,category.id,$("#readBy").val());
}
