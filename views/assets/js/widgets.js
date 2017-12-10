var ctx = document.getElementById("first--pie");
var chartPie = new Chart(ctx,{
    type:'pie',
    data: {
        datasets: [{
            data: [12,34,56],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.purple,
                window.chartColors.yellow,
            ],
            // label: 'Dataset 1'
        }],
        labels:["red","purple","yellow"]},
        option:{
          responsive: true
        }});

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


var liner = document.getElementById("linerGraphy");
var linerGraphy= new Chart(liner,{
      type: 'bar',
      data: {
          labels: ["Q2612A", "CF283A", "CE285A", "CE505A", "CE505X"],
          datasets: [{
              label: "Toner mas solicitados",
              backgroundColor: window.chartColors.blue,
              borderColor: window.chartColors.blue,
              data: [ 4,5,23,50,12],
              fill: false,
          }]
      },
      options: {
          responsive: true,
          title:{
              display:true,
              text:'Toner mas solicitados '
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
                      labelString: 'Month'
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
 $("#dataGrid").DataTable();

 function clientesRegistrados(){
     // if (document.getElementById('marca')) {
         $.ajax({
             url: "index.php?controller=config&a=clientesRegistrados",
             type: "POST",
             dataType:'json',
             success: function(result){
                 $("#userRegistrado").html();
                 console.log(result[0]);

             }
         });
     // }
 }
 clientesRegistrados();
