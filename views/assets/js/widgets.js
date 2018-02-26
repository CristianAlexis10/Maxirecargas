function productStar(){
        $.ajax({
            url: "index.php?controller=config&a=productosMasSolicitados",
            type: "POST",
            dataType:'json',
            success: function(result){
              // console.log(result);
              var referencias=[] ;
              for (var i = 0; i < result.length; i++) {
                referencias.push(result[i].pro_referencia);
              }
              var valores=[] ;
              for (var i = 0; i < result.length; i++) {
                valores.push(result[i][7]);
              }
              // console.log(valores);

              var liner = document.getElementById("linerGraphy");
              var linerGraphy= new Chart(liner,{
                    type: 'bar',
                    data: {

                        labels: referencias,
                        datasets: [{
                            label: "productos mas solicitados",
                            backgroundColor: window.chartColors.blue,
                            borderColor: window.chartColors.blue,
                            data: valores,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        title:{
                            display:true,
                            text:'Productos mas solicitados '
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Referencia'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'CANTIDAD'
                                }
                            }]
                        }
                    }
              });
            }
        });
}
productStar();






$.ajax({
    url: "index.php?controller=config&a=graficaTotalUser",
    type: "POST",
    dataType:'json',
    success: function(result){
      var ctx = document.getElementById("first--pie");
      var chartPie = new Chart(ctx,{
          type:'pie',
          data: {
              datasets: [{
                  data: result,
                  backgroundColor: [
                      window.chartColors.red,
                      window.chartColors.purple,
                      window.chartColors.yellow,
                  ],
                  // label: 'Dataset 1'
              }],
              labels:["Clientes","Clientes Empresariales"]},
              option:{
                responsive: true
              }});
    }

  })





var ctx2 = document.getElementById("second--pie");
  var chartPie2 = new Chart(ctx2,{
            type:'pie',
            data: {
                datasets: [{
                    data: [12,34,56],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.purple,
                        window.chartColors.yellow,
                    ],
                }],
                labels:["red","purple","yellow"]},
                option:{
                  responsive: true
                }});
 $("#dataGrid").DataTable();




 function clientesRegistrados(){
     // if (document.getElementById('marca')) {
         $.ajax({
             url: "index.php?controller=config&a=clientesRegistrados",
             type: "POST",
             dataType:'json',
             success: function(result){
                 $("#userRegistrado").html();
                 // console.log(result[0]);
                 $('#userRegistrado').html(result[0]);

             }
         });
     // }
 }
 clientesRegistrados();

 function ventaDiaria(){
         $.ajax({
             url: "index.php?controller=config&a=ventaDiaria",
             type: "POST",
             dataType:'json',
             success: function(result){
                 // console.log(result);
                 if (result[0][0]==null) {
                   $('#ventaDiaria').html('0');
                 }else{
                   $('#ventaDiaria').html(result[0][0]);
                 }
             }
         });
 }

 ventaDiaria();

 function ventaMensual(){
         $.ajax({
             url: "index.php?controller=config&a=ventaMensual",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#ventaMes').html('0');
               }else{
                 $('#ventaMes').html(result[0][0]);
               }
             }
         });
 }
 ventaMensual();
 function totalPedidos(){
         $.ajax({
             url: "index.php?controller=config&a=totalPedidos",
             type: "POST",
             dataType:'json',
             success: function(result){
               console.log(result);
               if (result[0][0]==null) {
                 $('#totalPed').html('0');
               }else{
                 $('#totalPed').html(result[0]);
               }
             }
         });
 }
 totalPedidos();
 function totalCotizaciones(){
         $.ajax({
             url: "index.php?controller=config&a=totalCotizaciones",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#totalCot').html('0');
               }else{
                 $('#totalCot').html(result[0][0]);
               }
             }
         });
 }
 totalCotizaciones();

 function pedDay(){
         $.ajax({
             url: "index.php?controller=config&a=pedDay",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#pedDay').html('0');
               }else{
                 $('#pedDay').html(result[0][0]);
               }
             }
         });
 }
 pedDay();

 function pedidosPendientes(){
         $.ajax({
             url: "index.php?controller=config&a=pedidosPendientes",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#pedidosPendientes').html('0');
               }else{
                 $('#pedidosPendientes').html(result[0][0]);
               }
             },
             error:function(result) {
               console.log(result);
             }
         });
 }
 pedidosPendientes();
 function pedidosTerminados(){
         $.ajax({
             url: "index.php?controller=config&a=pedidosTerminados",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#pedidosTerminados').html('0');
               }else{
                 $('#pedidosTerminados').html(result[0][0]);
               }
             },
             error:function(result) {
               console.log(result);
             }
         });
 }
 pedidosTerminados();
 function pedidosEnProceso(){
         $.ajax({
             url: "index.php?controller=config&a=pedidosEnProceso",
             type: "POST",
             dataType:'json',
             success: function(result){
               // console.log(result);
               if (result[0][0]==null) {
                 $('#pedidosEnProceso').html('0');
               }else{
                 $('#pedidosEnProceso').html(result[0][0]);
               }
             },
             error:function(result) {
               console.log(result);
             }
         });
 }
 pedidosEnProceso();


 function promedioComprasMesUsuario(){
         $.ajax({
             url: "index.php?controller=config&a=promedioComprasMesUsuario",
             type: "POST",
             dataType:'json',
             success: function(result){
                 console.log(result);
             }
         });
 }
 // promedioComprasMesUsuario();
