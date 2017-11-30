var ctx = document.getElementById("first--pie");
var chartPie = new Chart(ctx,{
    type:'pie',
    data: {
        datasets: [{
            data: [12,34,56,12,34],
            backgroundColor: [
                window.chartColors.pink,
                window.chartColors.red,
                window.chartColors.purple,
                window.chartColors.black,
                window.chartColors.yellow,
            ],
            // label: 'Dataset 1'
        }],
        labels:["pink","red","purple","black","yellow"]},
        option:{
          responsive: true
        }});

var ctx2 = document.getElementById("second--pie");
  var chartPie2 = new Chart(ctx2,{
            type:'pie',
            data: {
                datasets: [{
                    data: [12,34,56,12,34],
                    backgroundColor: [
                        window.chartColors.pink,
                        window.chartColors.red,
                        window.chartColors.purple,
                        window.chartColors.black,
                        window.chartColors.yellow,
                    ],
                }],
                labels:["pink","red","purple","black","yellow"]},
                option:{
                  responsive: true
                }});
