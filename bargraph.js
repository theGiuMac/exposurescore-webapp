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
            var labels = respons.labels;
            var datasets = respons.datasets;
            console.log(labels);
            console.log(datasets[0].data);
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
                                    });
        },
        error: function(response) {
            console.log(response);
        }
    });
});
