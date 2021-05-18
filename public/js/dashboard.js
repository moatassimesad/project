

const ctx = document.getElementById("chart");

const data = {
    name: "YEARLY SALES",
    years: [2010, 2011, 2012, 2013, 2014, 2015, 2016],
    devices: [
        {
            name: "iPod",
            sales: [0, 80, 70, 160, 120, 90, 200],
            color: "rgb(55, 162, 244, 0.8)"
        },
        {
            name: "iPhone",
            sales: [0, 130, 80, 70, 180, 105, 250],
            color: "rgb(0, 181, 194, 0.8)"
        },
        {
            name: "iPad",
            sales: [0, 100, 60, 200, 150, 100, 150],
            color: "rgb(247, 91, 54, 0.8)"
        }
    ]
};

const chartData = {
    labels: data.years,
    datasets: data.devices.map(device => {
        return {
            label: device.name,
            backgroundColor: device.color,
            data: device.sales,
            borderColor: "transparent"
        };
    })
};

new Chart(ctx, {
    type: "line",
    data: chartData,
    options: {
        responsive: true,
        hover: {
            intersect: false
        },
        elements: {
            point: {
                radius: 0,
                hoverRadius: 4
            }
        },
        title: {
            display: true,
            text: data.name
        },
        scales: {
            xAxes: [
                {
                    gridLines: {
                        display: false
                    }
                }
            ],
            yAxes: [
                {
                    ticks: {
                        stepSize: 75
                    }
                }
            ]
        },
        tooltips: {
            enabled: true,
            mode: "index"
        },
        legend: {
            display: true,
            align: "end",
            labels: {
                usePointStyle: true
            }
        }
    }
});
