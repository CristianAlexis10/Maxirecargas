// MENU
var menu = document.getElementById('menu');
var menuStart = document.getElementById('wrap--menu');
var closeMenu = document.getElementById('close-menu');

menu.onclick = function() {
  $(".wrap--menu").show();
    $(".wrap--menu").css({"transform":"translateX(0)"});

    $(".menu--product").addClass("product-animation")
    $(".menu--product").css({"transform":"translateX(0)"});

    $(".menu--quotation").addClass("quotation-animation")
    $(".menu--quotation").css({"transform":"translateX(0)"});

    $(".menu--order").addClass("order-animation")
    $(".menu--order").css({"transform":"translateX(0)"});

    $(".menu--home").addClass("home-animation")
    $(".menu--home").css({"transform":"translateX(0)"});
    // console.log('hg');
}

closeMenu.onclick = function() {
    $(".wrap--menu").fadeOut(300, function(){ $(".wrap--menu").hide()});

    $(".menu--product").removeClass("product-animation");
    $(".menu--quotation").removeClass("quotation-animation");
    $(".menu--order").removeClass("order-animation");
    $(".menu--home").removeClass("home-animation");
}
