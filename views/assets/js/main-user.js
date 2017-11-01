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

var close = document.getElementById("close");
var start = document.getElementById("session");
var modal = document.getElementById('modal--session');

start.onclick = function(){
  modal.style.display = "block";
};

close.onclick =function(){
  modal.style.display = "none"
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
};

var signin = document.getElementById('signin');
var modalSignin =document.getElementById('modal--signin');
signin.onclick = function() {
   modalSignin.style.display= "block";
};


$("#form--login").submit(function(e){
  e.preventDefault();
  dataJson=[];
  $("input[name=data]").each(function() {
    structure = {}
    structure = $(this).val();
    dataJson.push(structure);
  });

  $.ajax({
    url: "",
    type: "",
    dataType: "",
    data: ({user: dataJson}),
    success: function(result){
    $("#form--login").after("<div class='message-error'>"+result+"</div>")
    }
  });
});
