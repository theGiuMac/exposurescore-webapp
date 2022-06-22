<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
  </head>

  <body>
    <script language='javascript'>
    window.document.onload = function(e) {
        $.ajax({
            type: 'POST',
            url: 'api.php',
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
    }
    </script>
    <h3>Analytics section</h3>
    <canvas id="chart" width="300" height="300"></canvas>
  </body>
</html>
