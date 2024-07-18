// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example

const construction2 = (ele) => {
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Abonnee", "Non Abonnee"],
      datasets: [{
        data: ele,
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
}


$(document).ready(function() {
  // Fonction pour envoyer la requête AJAX
  function sendAjaxRequest() {
      $.ajax({
          url: '/admin/getStatistique', // URL de l'API
          type: 'GET', // Type de requête
          success: function(response) {
            let element = []
            element.push(response.user.userSubscribe)
            element.push(response.user.userNotSubscribe)
            construction2(element)
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