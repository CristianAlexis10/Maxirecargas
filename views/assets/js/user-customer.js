$("#who").click(function(){
  $(".two").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

$("#our").click(function(){
  $(".three").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

$("#contc").click(function() {
  $(".four").animatescroll({
    scrollSpeed:2000, easing:'easeOutBounce'
  });
});

var open = document.getElementById('puto');
var opcions = document.getElementById('user--dropdown');


open.onclick = function(){
  opcions.style.display = "flex";
};

window.onclick = function(event) {
  console.log(event.path[1]);
    if (event.path[1].id == '') {
        opcions.style.display = "none";

    }
};
