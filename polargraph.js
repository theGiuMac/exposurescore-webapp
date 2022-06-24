$(document).ready(function(){
    $("#show-graph").click(function(e){
        e.preventDefault();

        var randomColorGenerator = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
        };

        // First the mySql query
        var selected_attribute = $('#device-info').val();
        var info_limit = $('#device-info-limit').val();

        console.log(selected_attribute);
        console.log(info_limit);

        var background_colors = [];
        var border_colors = [];
        var hover_colors = [];
        for (let i = 0; i < info_limit; i++) {
            var color = randomColorGenerator();
            background_colors[i] = color;
            border_colors[i] = color;
            hover_colors[i] = 'rgb(15, 255, 80)';
        }

        jQuery.ajax({
            type: 'POST',
            url: 'https://mybrowserscore.com/api-info.php',
            data: { selected_attribute: selected_attribute,
                    info_limit: info_limit },
            success: function (response) {
                var ctx = document.getElementById("polar-chart").getContext("2d");
                var respons = response;
                var response_string_init = response.replace('?', '');
                var response_string_mid = response_string_init.replace('\n', '');
                var response_string_res = response_string_mid.replace('>', '');
                console.log(response_string_res);
                var decoded = JSON.parse(response_string_res);
                console.log(decoded);
                var labels = decoded.labels;
                var datasets = decoded.datasets;
                console.log(labels);
                console.log(datasets[0].data);
                data = {
                    labels: labels,
                    datasets: [{
                        label: 'Device info graph',
                        data: datasets[0].data,
                        backgroundColor: background_colors,
                        hoverBackgroundColor: hover_colors,
                    }]
                };
                var mychart = new Chart(ctx,
                                        {
                                            data: data,
                                            type: 'polarArea',
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
                                            }
                                        });
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
});
