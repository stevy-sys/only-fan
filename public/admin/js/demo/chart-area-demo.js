// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example

const construction = (eleme) => {
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Earnings",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: eleme
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return '$' + number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });
}

let element = [] ;
// myLineChart.data.datasets[0].data
$(document).ready(function() {
  // Fonction pour envoyer la requête AJAX
  function sendAjaxRequest() {
      $.ajax({
          url: '/admin/getStatistique', // URL de l'API
          type: 'GET', // Type de requête
          success: function(response) {
            if (response.stat.janvier.length > 0) {
              total = 0
              response.stat.janvier.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.février.length > 0) {
              total = 0
              response.stat.fevrier.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.mars.length > 0) {
              total = 0
              response.stat.mars.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.avril.length > 0) {
              total = 0
              response.stat.avril.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.mai.length > 0) {
              total = 0
              response.stat.mai.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.juin.length > 0) {
              total = 0
              response.stat.juin.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.juillet.length > 0) {
              total = 0
              response.stat.juillet.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.aôut?.length > 0) {
              total = 0
              response.stat.aout.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat?.septembre) {
              total = 0
              response.stat.septembre.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.octobre) {
              total = 0
              response.stat?.octobre.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat?.novembre) {
              total = 0
              response.stat.novembre.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }

            if (response.stat.decembre) {
              total = 0
              response.stat?.decembre.forEach(element => {
                total = total + element.subscribe.amount
              });
              element.push(total)
            }else{
              element.push(0)
            }
            construction(element)
          },
          error: function(error) {
              console.error('Erreur:', error); // Afficher une erreur si la requête échoue
          }
      });
  }

  // Appeler la fonction lors d'un événement (par exemple, clic sur un bouton)
  // $('#fetch-data-btn').click(function() {
      sendAjaxRequest();
  // });
});
console.log('test')