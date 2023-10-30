(function($) {
    'use strict';
    $(function() {        
      if ($("#budgetin-chart").length) {
        var areaData = {
          labels: ["Budget Transportation", "Budget Eat & Drink", "Remaining Budget"],
          datasets: [{
              data: [50, 50, 100],
              backgroundColor: [
                 "#7DA0FA","#4747A1", "#D9D9D9",
              ],
              borderColor: "rgba(0,0,0,0)"
            }
          ]
        };
        var areaOptions = {
          responsive: true,
          maintainAspectRatio: true,
          segmentShowStroke: false,
          cutoutPercentage: 78,
          elements: {
            arc: {
                borderWidth: 4
            }
          },      
          legend: {
            display: false
          },
          tooltips: {
            enabled: true
          },
          legendCallback: function(chart) { 
            var text = [];
            text.push('<div class="report-chart">');
              text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">Budget Transportation</p></div>');
              text.push('<p class="mb-0">RP 250.000 / RP 500.000</p>');
              text.push('</div>');
              text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Budget Eat & Drink</p></div>');
              text.push('<p class="mb-0">RP 250.000 / RP 500.000</p>');
              text.push('</div>');
              // text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Remaining All Budget</p></div>');
              // text.push('<p class="mb-0">RP 250.000 / RP 500.000</p>');
              text.push('</div>');
            text.push('</div>');
            return text.join("");
          },
        }
        var budgetinChartPlugins = {
          beforeDraw: function(chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;
        
            ctx.restore();
            var fontSize = 3.125;
            ctx.font = "500 " + fontSize + "em sans-serif";
            ctx.textBaseline = "middle";
            ctx.fillStyle = "#13381B";
        
            var text = "50%",
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;
        
            ctx.fillText(text, textX, textY);
            ctx.save();
          }
        }
        var budgetinChartCanvas = $("#budgetin-chart").get(0).getContext("2d");
        var budgetinChart = new Chart(budgetinChartCanvas, {
          type: 'doughnut',
          data: areaData,
          options: areaOptions,
          plugins: budgetinChartPlugins
        });
        document.getElementById('budgetin-legend').innerHTML = budgetinChart.generateLegend();
      }
      if ($("#budgetin-chart-dark").length) {
        var areaData = {
          labels: ["Jan", "Feb", "Mar"],
          datasets: [{
              data: [100, 50, 50],
              backgroundColor: [
                 "#4B49AC","#FFC100", "#248AFD",
              ],
              borderColor: "rgba(0,0,0,0)"
            }
          ]
        };
        var areaOptions = {
          responsive: true,
          maintainAspectRatio: true,
          segmentShowStroke: false,
          cutoutPercentage: 78,
          elements: {
            arc: {
                borderWidth: 4
            }
          },      
          legend: {
            display: false
          },
          tooltips: {
            enabled: true
          },
          // legendCallback: function(chart) { 
          //   var text = [];
          //   text.push('<div class="report-chart">');
          //     text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">Offline sales</p></div>');
          //     text.push('<p class="mb-0">88333</p>');
          //     text.push('</div>');
          //     text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Online sales</p></div>');
          //     text.push('<p class="mb-0">66093</p>');
          //     text.push('</div>');
          //     text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Returns</p></div>');
          //     text.push('<p class="mb-0">39836</p>');
          //     text.push('</div>');
          //   text.push('</div>');
          //   return text.join("");
          // },
        }
        var budgetinChartPlugins = {
          beforeDraw: function(chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;
        
            ctx.restore();
            var fontSize = 3.125;
            ctx.font = "500 " + fontSize + "em sans-serif";
            ctx.textBaseline = "middle";
            ctx.fillStyle = "#fff";
        
            var text = "90",
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;
        
            ctx.fillText(text, textX, textY);
            ctx.save();
          }
        }
        var budgetinChartCanvas = $("#budgetin-chart-dark").get(0).getContext("2d");
        var budgetinChart = new Chart(budgetinChartCanvas, {
          type: 'doughnut',
          data: areaData,
          options: areaOptions,
          plugins: budgetinChartPlugins
        });
        document.getElementById('budgetin-legend').innerHTML = budgetinChart.generateLegend();
      }   
    });
  })(jQuery);