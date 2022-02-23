$(document).ready(function () {
    $.ajax({
        url: "_actions/graph.php",
        method: "GET",
        success: function (data) {
            console.log(data);

            var xValues = [];
            var yValues = [];

            for (var i in data) {
                xValues.push(data[i].name);
                yValues.push(parseInt(data[i].income));
            }
            var barColors = ["red", "green", "blue", "orange", "brown"];
            console.log(yValues);

            var chartdata = {
                labels: xValues,
                datasets: [{
                    data: yValues,
                    label: 'Family Income(%)',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],
            };

            new Chart("myChart", {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        y: {
                            ticks: {
                                beginAtZero: true
                            },

                        }
                    }
                },
            });
        }
    });
});