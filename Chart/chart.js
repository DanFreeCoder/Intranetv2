

// SHARED GOALS FOR 2023


// Function for NO. OF REFFERALS BY EMPLOYEES 2023
Refferals = () => {
    var departmentData = [{
        department: "Legal Compliance",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Leasing",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Marketing",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Sales",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Engineering",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Operations",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "PMC",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "PMO",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Accounting",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "Business Proc-Sup Services",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "HR",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "IT",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
    {
        department: "SCM",
        records: [0, 0, 0, 0, 0, 0, 0]
    },
        // Add more department data as needed
    ];
    var chartData = {
        labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: departmentData.map(department => ({
            label: department.department,
            data: department.records,
            fill: false,
            backgroundColorColor: getRandomColor(),
            borderWidth: 1
        }))
    };



    new Chart("Refferals", {
        type: 'line',
        data: chartData,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'NO. REFFERALS BY EMPLOYEES'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            title: {
                display: true,
                text: 'NO. OF REFFERALS BY EMPLOYEES',
                fontSize: 15
            },
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: { // defining min and max so hiding the dataset does not change scale range
                    min: 0,
                    max: 100
                }
            },
        }
    })
}

//FUNCTIONS FOR UNITS TO BE SOLD 2023
unitToBeSoldChart = () => {
    var data = {
        labels: ['Target', 'YTD', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'The Median Flats',
            backgroundColor: '#e55039',
            data: [480, 108, 0, 0, 0, 0, 0, 0]
        },
        {
            label: 'Serenis North',
            backgroundColor: '#38ada9',
            data: [6, 0, 0, 0, 0, 0, 0, 0]
        },
        {
            label: 'Serenis South',
            backgroundColor: '#4a69bd',
            data: [1, 0, 0, 0, 0, 0, 0, 0]
        },
        {
            label: 'The Median',
            backgroundColor: '#0a3d62',
            data: [10, 0, 0, 0, 0, 0, 0, 0]
        },
        {
            label: 'Calyx Centre',
            backgroundColor: '#079992',
            data: [3, 0, 0, 0, 0, 0, 0, 0]
        },
        {
            label: 'Calyz Residences',
            backgroundColor: '#78e08f',
            data: [2, 0, 0, 0, 0, 0, 0, 0]
        }
        ]
    };


    var ctx = document.getElementById("unitToBeSoldChart");
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: data.datasets
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'UNITS TO BE SOLD',
                fontSize: 15

            },
            indexAxis: 'x', // Display labels on the x-axis
            responsive: true,
            scales: {
                x: {
                    stacked: true // Enable stacking for the x-axis (sub-data)
                },
                y: {
                    stacked: false // Disable stacking for the y-axis (labels)
                }
            },
            plugins: {
                tooltip: {
                    mode: 'index', ///show tooltip via index
                    intersect: false,
                },
                title: {
                    display: true,
                    text: 'UNITS TO BE SOLD'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

}

//FUNCTIONS FOR UNITS FOR TURN OVER
TurnOvers = () => {
    var data = {
        labels: ['Target', 'YTD', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'The Median',
            backgroundColor: '#40407a',
            data: [491, 476, 4, 0, 0, 0, 0, 0]
        },
        {
            label: 'Serenis South',
            backgroundColor: '#218c74',
            data: [0, 0, 0, 0, 0, 0, 0, 0]
        },
        ]
    };


    new Chart("unitsForTurnOver", {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: data.datasets
        },
        options: {
            title: {
                display: true,
                text: 'UNITS FOR TURN OVER',
                fontSize: 15

            },
            indexAxis: 'x', // Display labels on the x-axis
            responsive: true,
            scales: {
                x: {
                    stacked: true // Enable stacking for the x-axis (sub-data)
                },
                y: {
                    stacked: false // Disable stacking for the y-axis (labels)
                }
            },
            plugins: {
                tooltip: {
                    mode: 'index', ///show tooltip via index
                    intersect: false,
                },
                title: {
                    display: true,
                    text: 'UNITS FOR TURN OVER'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
}

// FUNCTION OF UNITS FOR COLLECTION 
ForCollection = () => {
    var data = {
        labels: ['Target', 'YTD', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'The Median',
            backgroundColor: '#34ace0',
            data: [491, 476, 4, 0, 0, 0, 0, 0]
        },
        {
            label: 'Serenis South',
            backgroundColor: '#ccae62',
            data: [0, 0, 0, 0, 0, 0, 0, 0]
        },
        ]
    };


    new Chart("unitsForCollection", {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: data.datasets
        },
        options: {
            title: {
                display: true,
                text: 'UNITS FOR COLLECTION',
                fontSize: 15

            },
            indexAxis: 'x', // Display labels on the x-axis
            responsive: true,
            scales: {
                x: {
                    stacked: true // Enable stacking for the x-axis (sub-data)
                },
                y: {
                    stacked: false // Disable stacking for the y-axis (labels)
                }
            },
            plugins: {
                tooltip: {
                    mode: 'index', ///show tooltip via index
                    intersect: false,
                },
                title: {
                    display: true,
                    text: 'UNITS FOR COLLECTION'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        },
        zoom: {
            enabled: true,
            mode: 'x',
        }
    });
}


//FUNCTION FOR SQM TO BE LEASED
SQMtobeLeased = () => {
    var data = {
        labels: ['Target', 'YTD', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [
            {
                label: 'in Square meters',
                backgroundColor: '#2c2c54',
                data: [230712.92, 229446.83, 0, 0, 0, 0, 0, 0],
                yAxisID: 'primary-y-axis'
            },
            {
                label: 'in Percentage',
                backgroundColor: '#84817a',
                data: [90.00, 89.51, 0, 0, 0, 0, 0, 0],
                yAxisID: 'secondary-y-axis'
            },
        ]
    };

    // Custom tooltip callback to display percentage for 'OCCUPANCY' dataset with two decimal places
    var customTooltip = {
        mode: 'index',
        intersect: false,
        callbacks: {
            label: function (context) {
                var datasetLabel = context.dataset.label || '';
                var value = context.parsed.y;
                if (context.datasetIndex === 1) {
                    return datasetLabel + ': ' + value.toFixed(2) + '%';
                } else {
                    return datasetLabel + ': ' + value; // Show dataset label with regular value
                }
            }
        }
    };

    // Chart configuration
    var config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'SQM TO BE LEASED'
                },
                tooltip: customTooltip, // Use the custom tooltip callback
                legend: {
                    position: 'top'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    id: 'primary-y-axis', // ID for the primary y-axis
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        beginAtZero: true
                    }
                },
                'secondary-y-axis': {
                    type: 'linear', // Set the secondary y-axis type to 'linear' for percentage values
                    position: 'right',
                    borderColor: 'red',
                    ticks: {
                        callback: function (value) {
                            return value + '%'; // Add percentage symbol to secondary y-axis labels
                        }
                    }
                }
            }
        }
    };
    // Create the chart
    var ctx = document.getElementById('sqmToBeLeased').getContext('2d');
    new Chart(ctx, config);
}
//FUNCTION FOR COMBINED OCCUPANCY
CombinedOccupancy = () => {



    // Your chart data with two datasets (primary and secondary axis)
    var data = {
        labels: ['MANILA', 'CEBU', 'COMBINED'],
        datasets: [
            {
                label: 'GLA',
                data: [70890.83, 122766.63, 193658.46], // These are numerical values
                backgroundColor: '#575fcf',
                yAxisID: 'primary-y-axis' // Assign this dataset to the primary axis
            },
            {
                label: 'OCCUPIED',
                data: [55969.64, 110787.96, 166757.6], // These are numerical values
                backgroundColor: '#ef5777',
                yAxisID: 'primary-y-axis' // Assign this dataset to the primary axis
            },
            {
                label: 'VACANT',
                data: [14922.19, 11978.67, 26900.86], // These are numerical values
                backgroundColor: '#485460',
                yAxisID: 'primary-y-axis' // Assign this dataset to the primary axis
            },
            {
                label: 'OCCUPANCY',
                data: [78.95, 90.24, 86.11], // These are percentage values (numbers from 0 to 100)
                backgroundColor: '#05c46b',
                yAxisID: 'secondary-y-axis' // Assign this dataset to the secondary axis
            }
        ]
    };

    // Custom tooltip callback to display percentage for 'OCCUPANCY' dataset with two decimal places
    var customTooltip = {
        mode: 'index',
        intersect: false,
        callbacks: {
            label: function (context) {
                var datasetLabel = context.dataset.label || '';
                var value = context.parsed.y;
                if (context.datasetIndex === 3) {
                    return datasetLabel + ': ' + value.toFixed(2) + '%'; // Show OCCUPANCY value as percentage with two decimal places
                } else {
                    return datasetLabel + ': ' + value; // Show dataset label with regular value
                }
            }
        }
    };

    // Chart configuration
    var config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'COMBINED OCCUPANCY'
                },
                tooltip: customTooltip, // Use the custom tooltip callback
                legend: {
                    position: 'top'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    id: 'primary-y-axis', // ID for the primary y-axis
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        beginAtZero: true
                    }
                },
                'secondary-y-axis': {
                    type: 'linear', // Set the secondary y-axis type to 'linear' for percentage values
                    position: 'right',
                    borderColor: 'red',
                    ticks: {
                        callback: function (value) {
                            return value + '%'; // Add percentage symbol to secondary y-axis labels
                        }
                    }
                }
            }
        }
    };

    // Create the chart
    var ctx = document.getElementById('combined').getContext('2d');
    var myChart = new Chart(ctx, config);
}


getRandomColor = () => {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}