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


// var liner = document.getElementById("linerGraphy");
// var linerGraphy= new chart(liner,{
//       type: 'line',
//       data: {
//           labels: ["January", "February", "March", "April", "May", "June", "July"],
//           datasets: [{
//               label: "My First dataset",
//               backgroundColor: window.chartColors.red,
//               borderColor: window.chartColors.red,
//               data: [ 4,5,23,34,12,12,34,12],
//               fill: false,
//           }, {
//               label: "My Second dataset",
//               fill: false,
//               backgroundColor: window.chartColors.blue,
//               borderColor: window.chartColors.blue,
//               data: [34,2,23,12,32,45,23 ],
//           }]
//       },
//       options: {
//           responsive: true,
//           title:{
//               display:true,
//               text:'Chart.js Line Chart'
//           },
//           tooltips: {
//               mode: 'index',
//               intersect: false,
//           },
//           hover: {
//               mode: 'nearest',
//               intersect: true
//           },
//           scales: {
//               xAxes: [{
//                   display: true,
//                   scaleLabel: {
//                       display: true,
//                       labelString: 'Month'
//                   }
//               }],
//               yAxes: [{
//                   display: true,
//                   scaleLabel: {
//                       display: true,
//                       labelString: 'Value'
//                   }
//               }]
//           }
//       }
//       window.onload = function() {
//           var liner = document.getElementById("linerGraphy").getContext("2d");
//           window.myLine = new Chart(liner, linerGraphy);
// });
