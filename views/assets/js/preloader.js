function preloader(){
  $(".container-pre").hide();
  $(".coso").hide();
}
var figura = $('.figura');
figura.each(function () {
$(this).prop('Counter',0).animate({
    Counter: $(this).text()
}, {
    duration: 5000,
    easing: 'swing',
    step: function (now) {
        $(this).text(Math.ceil(now) +  "%");
        if($(this).text().trim() == "100%"){
          setTimeout( function(){
            $('.figura').addClass('ocultar');
          }, 800);

          setTimeout( function(){
            $('.container').addClass('open');
          }, 1200)
        }
    }
});
});
