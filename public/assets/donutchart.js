Chart.pluginService.register({
    beforeRender: function(chart) {
        if (chart.config.options.showAllTooltips) {
            // create an array of tooltips
            // we can't use the chart tooltip because there is only one tooltip per chart
            chart.pluginTooltips = [];
            chart.config.data.datasets.forEach(function(dataset, i) {
                chart.getDatasetMeta(i).data.forEach(function(sector, j) {
                    chart.pluginTooltips.push(new Chart.Tooltip({
                        _chart: chart.chart,
                        _chartInstance: chart,
                        _data: chart.data,
                        _options: chart.options.tooltips,
                        _active: [sector]
                    }, chart));
                });
            });

            // turn off normal tooltips
            chart.options.tooltips.enabled = false;
        }
    },
    afterDraw: function(chart, easing) {
        if (chart.config.options.showAllTooltips) {
            // // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
            // if (!chart.allTooltipsOnce) {
            //     if (easing !== 1)
            //         return;
            //     chart.allTooltipsOnce = true;
            // }

            // turn on tooltips
            chart.options.tooltips.enabled = true;
            Chart.helpers.each(chart.pluginTooltips, function(tooltip) {
                tooltip.initialize();
                tooltip.update();
                // we don't actually need this since we are not animating tooltips
                tooltip.pivot();
                tooltip.transition(easing).draw();
            });
            chart.options.tooltips.enabled = false;
        }
    }
});


//setup
const data2 = {
    labels: ['Visitors', 'Residents', 'Staff'],
    datasets: [{
        label: 'Total Logs today',
        data: [numofvisitors, numofresidents, numofstaffs],
        backgroundColor: [
            '#52D756',
            '#FF0000',
            '#007ED6',
        ],

        tension: 0.1
    }]
};

var totaldata = numofvisitors + numofresidents + numofstaffs;

//config
const config2 = {
    type: 'doughnut',
    data: data2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
            }
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return data['labels'][tooltipItem['index']] + ': ' + ((data['datasets'][0]['data'][tooltipItem['index']] / totaldata) * 100).toFixed(2) + '%';
                }
            }
        },
        showAllTooltips: true
    },
};

// render init block
const donutchart = new Chart(
    document.getElementById('donutchart'),
    config2
);