<!DOCTYPE html>
<html>
  <head>
    <script>
    $.ajax({
        type: 'POST',
        url: './api.php',
        datatype: 'json',
        success: function (result) {
            var ctx = document.getElementById("chart").getContext("2d");
            var mychart = new Chart(ctx,
            {
                type: 'bar',
                data: JSON.parse(result),
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        }
    })
    </script>
  </head>

  <body>
    <canvas id="chart" width="300" height="300"></canvas>
  </body>
</html>
