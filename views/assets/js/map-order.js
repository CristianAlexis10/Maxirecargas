//inicializar
var map;
  map = new GMaps({
    el: '#map',
    lat: 6.244203,
    lng: -75.581212,
    zoom: 12
  });
  //obtener direccion de pedido
  $.ajax({
    url: "index.php?controller=config&a=directionOrder",
    type: "POST",
    dataType:'json',
    success: function(result){
      console.log(result);
        var dir =  result.ciu_nombre +" "+result.dep_nombre+" "+result.pai_nombre+" "+ result.ped_direccion ;
        getLat(dir,'Enterga');
    },
    error: function(result){
      console.log(result);
    }
  });

  //obtenr latitud y longitud segun la direccion
    function getLat(dir,nombre) {
            GMaps.geocode({
              address: dir,
              callback: function(results, status){
                // console.log(status);
                if(status=='OK'){
                  var latlng = results[0].geometry.location;
                  map.setCenter(latlng.lat(), latlng.lng());
                  mapUser(latlng.lat(), latlng.lng() , nombre+": "+results[0].formatted_address);
                }
              }
            });
    }



    //crear marcadores
    function mapUser(latitude,longitude,title){
       var merker = map.addMarker({
                    lat: latitude,
                    lng: longitude,
                    title: title,
                    click: function(e){
                      if(console.log)
                        console.log(e);
                      alert('You clicked in this marker');
                    },
                    mouseover: function(e){
                       var infowindow = new google.maps.InfoWindow({
                              content: title
                      });
                        infowindow.open(map, merker);
                    }
            });


            map.renderRoute({
              origin: [6.205255, -75.607365],
              destination: [latitude, longitude],
              travelMode: 'driving',
              strokeColor: '#131540',
              strokeOpacity: 0.6,
              strokeWeight: 6
            }, {
              panel: '#directions',
              draggable: true
            });
    }
//mostrar productos

var abrirProduct = document.getElementById('viewAllProducts');
var modalProduct = document.getElementById('modal--detail--products');
var cerrarProduct = document.getElementById('close_modal_producto')
abrirProduct.onclick = function() {
  modalProduct.style.display = "flex";
};
cerrarProduct.onclick = function() {
  modalProduct.style.display = "none";
}

//contacto
$(".contact--customer").click(function(){
  var user = this.id;
  $.ajax({
    url:"index.php?controller=config&a=contact",
    type:"post",
    dataType:"json",
    data:({id : user}),
    success:function(result){
      $("#contact").html(result);
    },
    error:function(result) {
      console.log(result);
    }
  });
});

//enviar Correo
function sendMail(){
  var data = [];
  $(".dataContact").each(function(){
    data.push(this.value);
  });
  $.ajax({
    url:"index.php?controller=contact&a=sendMail",
    type:"post",
    dataType:"json",
    data: ({values:data}),
    beforeSend: function() {
        $("#sendButton").after("<div id='message-load'>Enviando</div>");
    },
    success:function(result){
      console.log(result);
    },
    error:function(result){
      console.log(result);
    },
    complete: function() {
      $("#message-load").remove();
      $("#contact").empty();
   }
  });
}
