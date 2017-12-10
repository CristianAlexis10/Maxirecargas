//inicializar
var map;
  map = new GMaps({
    el: '#map',
    lat: -12.043333,
    lng: -77.028333,
    zoom: 12
  });

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
  }

  //geolocalizacion
  //   GMaps.geolocate({
  //   success: function(position){
  //          mapUser(position.coords.latitude,position.coords.longitude,'si');
  //           map.setCenter(position.coords.latitude, position.coords.longitude);
  //   },
  //   error: function(error){
  //     alert('Geolocation failed: '+error.message);
  //   },
  //   not_supported: function(){
  //     alert("Your browser does not support geolocation");
  //   }
  // });

  //latitud y longitud segun la direccion
    function getLat(dir) {
            GMaps.geocode({
              address: dir,
              callback: function(results, status){
                // console.log(status);
                if(status=='OK'){
                  var latlng = results[0].geometry.location;
                  map.setCenter(latlng.lat(), latlng.lng());
                  mapUser(latlng.lat(), latlng.lng() , results[0].formatted_address);
                }
              }
            });
    }

    $.ajax({
        url: "index.php?controller=config&a=directions",
        type: "POST",
        dataType:'json',
        success: function(result){
          for (var i = 0; i < result.length; i++) {
            var dir = "calle 9"+i+" medellin";
            getLat(dir);
          }
        }
    });
