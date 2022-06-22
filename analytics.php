<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>

  <body>
    <script language='javascript'>
    window.addEventListener('load', function() {
        jQuery.ajax({
            type: 'POST',
            url: 'https://mybrowserscore.com/api.php',
            dataType: 'json',
            contentType: 'application/json',
            success: function (response) {
                var ctx = document.getElementById("chart").getContext("2d");
                var mychart = new Chart(ctx,
                                        {
                                            type: 'bar',
                                            data: JSON.parse(response),
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
            },
            error: function(response) {
                console.log(response);
            }
        })
    })
    </script>
    <h3>Analytics section</h3>
    <canvas id="chart" width="300" height="300"></canvas>
  </body>
</html>
