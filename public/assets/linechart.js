//setup
const data = {
    labels: data_y,
    datasets: [{
            label: 'Visitor',
            data: data_x,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'Resident',
            data: data_x2,
            borderColor: 'rgb(192, 75, 192)',
            tension: 0.1
        },
        {
            label: 'Staff',
            data: data_x3,
            borderColor: 'rgb(75, 192, 75)',
            tension: 0.1
        },
        {
            label: 'Log Total',
            data: data_x4,
            borderColor: 'rgb(192, 75, 75)',
            tension: 0.1
        }
    ]
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
            }
        }
    },
};

// render init block
const linechart = new Chart(
    document.getElementById('linechart'),
    config
);