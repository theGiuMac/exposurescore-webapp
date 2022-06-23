<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
      .container {
        width: 100%;
        max-width: 974px;
        min-width: 0;
        background-color: #f1f1f1;
        box-shadow: 0 1px 3px
                    rgba(0,0,0,0,12), 0 1px 2px
                    rgba(0,0,0,0,24);
        margin: auto;
        margin-top: auto;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        height: auto;
        bottom: auto;
      }

      .firstgraph {
        width: 50%;
        background-color: transparent;
        border: 5px solid green;
        float: left;
      }
    </style>

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
                var respons = response;
                console.log(respons);
                var labels = respons.labels
                var datasets = respons.datasets
                console.log(labels)
                console.log(datasets[0].data)
                var mychart = new Chart(ctx,
                                        {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Exposure Scores',
                                                    data: datasets[0].data,
                                                    backgroundColor: 'green',
                                                    borderColor: 'black',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    fontColor: 'white',
                                                    fontSize: 20,
                                                    labels: {
                                                        fontColor: 'white',
                                                        fontSize: 20
                                                    }
                                                },
                                                responsive: true,
                                                scales: {
                                                    yAxes: [{
                                                        stacked: false,
                                                        scaleLabel: {
                                                            display: true,
                                                            fontColor: 'white',
                                                            fontSize: 25,
                                                            labelString: 'Exposure Scores'
                                                        },
                                                        ticks: {
                                                            fontColor: 'white',
                                                            fontSize: 20,
                                                            min: 0
                                                        },
                                                        gridLines: {
                                                            color: 'white'
                                                        }
                                                    }],
                                                    xAxes: [{
                                                        stacked: false,
                                                        scaleLabel: {
                                                            display: true,
                                                            fontColor: 'white',
                                                            fontSize: 25,
                                                            labelString: 'Browser'
                                                        },
                                                        ticks: {
                                                            fontColor: 'white',
                                                            fontSize: 20,
                                                            min: 0
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

    <div id="container" class="container" style="display: block;">
      <div class="firstgraph">
        <!-- Interactive graph for the browser identifiers and normalized exposure score -->
        <canvas id="chart" width="300" height="300"></canvas>
      </div>
    </div>
  </body>
</html>
