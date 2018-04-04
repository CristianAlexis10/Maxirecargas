$(".inputYellow").focus(function(){
  $(this).parent().addClass("color-labeluser");
});

$(".inputYellow").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labeluser");
    $(this).parent().removeClass("color-labeluser");
});

$(".inputblue").focus(function(){
  $(this).parent().addClass("color-labelblue");
});

$(".inputblue").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labelblue");
    $(this).parent().removeClass("color-labelblue");
});

$(".inputmagenta").focus(function(){
  $(this).parent().addClass("color-labelmagent");
});
$(".inputmagenta").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("mover-labelmagent");
    $(this).parent().removeClass("color-labelmagent");

});

// modal inicio de sesion movil
if (document.getElementById('modal_mobile')) {
  var open_session = document.getElementById('session_mobile');
  var modal_session = document.getElementById('modal_mobile');
  var close_session = document.getElementById('modal_close_mobile');
  open_session.onclick = function(){
    modal_session.style.display = "flex";
  };
  close_session.onclick = function(){
    modal_session.style.display= "none"
  };
};




// modals
if (document.getElementById("modal_dir")) {
var openModal_dir = document.getElementById('btnOtraDir');
var closeModal_dir = document.getElementById('closemodal_dir');
var modal_dir = document.getElementById('modal_dir');
openModal_dir.onclick = function() {
  modal_dir.style.display = "flex";
}
closeModal_dir.onclick = function() {
  modal_dir.style.display= "none";
}
}


//views order mover

$('#orderSiguiente').click(function() {
    $('#order--container').animate({
    'marginLeft':"0"
    });
    $('#order--formone').animate({
      'opacity': 0
    });
    $('#order--formtwo').animate({
      'opacity': 1
    });
    $('.order--contenido').animate({
    'marginLeft' : "100%"
    });
});

$('#orderAtras').click(function() {
    $('#order--container').animate({
    'marginLeft' : "50%"
    });
    $('#order--formone').animate({
      'opacity': 1
    });
    $('#order--formtwo').animate({
      'opacity': 0
    });
    $('.order--contenido').animate({
    'marginLeft': "0"
    });
});
$("#orderSiguiente-mobile").click(function() {
  $("#order--formtwo").css({
    "-webkit-transform":"translateX(0)",
    "-ms-transform":"translateX(0)",
    "transform":"translateX(0)"
  });
  $("#order--formone").css({
    "-webkit-transform":"translateX(-9999px)",
    "-ms-transform":"translateX(-9999px)",
    "transform":"translateX(-9999px)"
  })
});
$("#orderAtrasMobile").click(function() {
  $("#order--formone").css({
    "-webkit-transform":"translateX(0)",
    "-ms-transform":"translateX(0)",
    "transform":"translateX(0)"
  });
  $("#order--formtwo").css({
    "-webkit-transform":"translateX(-9999px)",
    "-ms-transform":"translateX(-9999px)",
    "transform":"translateX(-9999px)"
  })
});
// menu mobile
// var close_mobile = document.getElementById('close--mobile');
// var open_mobile = document.getElementById('menu-mobile');
// var modal_mobile = document.getElementById('wrap--menu--mobile');
//
// close_mobile.onclick = function(){
//   modal_mobile.style.display = "none"
// };
// open_mobile.onclick = function(){
//   modal_mobile.style.display = "flex"
// };
var categoryAll ;
// views product
if (document.getElementsByClassName('Btncategoria')) {
  //nombre de categoria
    $(".Btncategoria").click(function(){
        $(".container--grid").empty();
      var nameCategory = this.id;
       categoryAll = this.id;
      $("#categoryName").html(nameCategory);
      //consultar productos
      $(".container--grid").css({"display":"flex","flex-wrap":"wrap"});
      $.ajax({
        url:"contar-registros",
        type:"post",
        dataType:"json",
        data:({name:nameCategory}),
        success:function(result){
          cambiarPagina(1,result);
        },
        error:function(result){
          console.log(result);
        }
      });
      //mostrar productos
      $(".products").addClass("moverproduct");
      $(".Btoner").addClass("aparecer");
      $(".container--grid").addClass("gridaparecer");
        // $(".pagination").show();
    });
    if (document.getElementById('categoryName')) {
    var bntAtras = document.getElementById('pedAtras');
      bntAtras.onclick = function(){
        $(".pagination").empty();
      $(".products").removeClass("moverproduct");
      $(".Btoner").removeClass("aparecer");
      $(".container--grid").removeClass("gridaparecer");
      $(".container--grid").hide();
    }
    }

  }

function cambiarPagina(pagina,numeroRegistros){
  var elementosPagina  = 12;
  var inicio = (pagina-1)*elementosPagina;
    $(".container--grid").empty();
    $.ajax({
      url:"consular-por-categoria-paginacion",
      type:"post",
      dataType:"json",
      data:({name:categoryAll,ini:inicio,totalElePag:elementosPagina}),
      success:function(result){
        if (result.length==0) {
            $(".container--grid").append("<div class='query-result'><h1>No hay productos disponibles.</h1></div>");
        }else{
          for (var i = 0; i < result.length; i++) {
            if (result[i].pro_imagen=="icn-maxi.png") {
              $(".container--grid").append('<a href="detalles-producto-'+result[i].pro_referencia+'"><figure class="vermas"><figcaption>'+result[i].pro_referencia+'</figcaption><img src="views/assets/image/'+result[i].pro_imagen+'" alt=""></figure></a>');
            }else{
              $(".container--grid").append('<a href="detalles-producto-'+result[i].pro_referencia+'"><figure class="vermas"><figcaption>'+result[i].pro_referencia+'</figcaption><img src="views/assets/image/products/'+result[i].pro_imagen+'" alt=""></figure></a>');
            }
          }
          //paginacion
          $(".pagination").remove();
          var totalPaginas = Math.ceil((numeroRegistros/elementosPagina));
          $(".container--grid").after("<div class='pagination'></div>");
          $(".pagination").css({"display":"flex","flex-direction":"row-reverse"});
          while (totalPaginas!=0) {
            // console.log(totalPaginas);
            $(".pagination").append('<h1 onclick="cambiarPagina('+totalPaginas+','+numeroRegistros+')">'+totalPaginas+'</h1>');
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
