$('document').ready(function () {
    $.ajax({
      type: "POST",
      url: "Manager.php",
      dataType: "json",
      success: function (data) {
        alert("ok");
      }
    });
});


var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Nível"],

        datasets: [{
            label: 'Gráfico',
            data: [50],
            backgroundColor: ['green'],
            borderColor: '#007bff',
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        },
        legend: {
            display: false,
        }
    }
});