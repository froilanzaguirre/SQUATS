//setup
const data = {
    labels: data_y,
    datasets: [{
        label: 'Total Logs per day',
        data: data_x,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};

//config
const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Weekly Log Report'
            }
        }
    },
};

// render init block
const linechart = new Chart(
    document.getElementById('linechart'),
    config
);