

  

/*
const labels = ['Enero', 'Febrero', 'Marzo', 'Abril']
 
const dataset1 = {
    label: "Dataset 1",
    data: [10, 55, 60, 120],
    borderColor: 'rgba(248, 37, 37, 0.8)',
    fill: false,
    tension: 0.1
};
 
const dataset2 = {
    label: "Dataset 2",
    data: [5, 44, 55, 100],
    borderColor: 'rgba(69, 248, 84, 0.8)',
    fill: false,
    tension: 0.1
};
 
const dataset3 = {
    label: "Dataset 3",
    data: [20, 40, 55, 120],
    borderColor: 'rgba(69, 140, 248, 0.8)',
    fill: false,
    tension: 0.1
};
 
const dataset4 = {
    label: "Dataset 4",
    data: [18, 40, 20, 100],
    borderColor: 'rgba(245, 40, 145, 0.8)',
    fill: false,
    tension: 0.1
};
 
const graph = document.querySelector("#chart");
 
const data = {
    labels: labels,
    datasets: [dataset1,dataset2,dataset3,dataset4]
};
 
const config = {
    type: 'line',
    data: data,
};
 
new Chart(graph, config);

*/






// var ctx = $('#chart');
// var data = [];

// $.getJSON('infoConstants.php')
//     .done(function(json) {
//         $.each(json, function(index, row) {
//             data.push({x: row.presioArterial + ' ' + row.presioArterial, y: row.presioArterial});
//         });

//         new Chart(ctx, {
//             type: 'line',
//             data: {
//                 datasets: [{
//                     label: 'Presión Arterial Sistólica',
//                     data: data,
//                     fill: false,
//                     borderColor: 'rgb(75, 192, 192)',
//                     tension: 0.1
//                 }]
//             },
//             options: {
//                 scales: {
//                     xAxes: [{
//                         type: 'time',
//                         time: {
//                             unit: 'day'
//                         }
//                     }],
//                     yAxes: [{
//                         ticks: {
//                             beginAtZero: true
//                         }
//                     }]
//                 }
//             }
//         });
//     })
//     .fail(function() {
//         console.log('Error al cargar los datos');
//     });

    /*
    
    
    $(document).ready(function() {
    $.ajax({
        url: "datos.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var fecha = [];
            var sistolica = [];

            for(var i in data) {
                fecha.push(data[i].fecha);
                sistolica.push(data[i].sistolica);
            }

            var chartdata = {
                labels: fecha,
                datasets : [
                    {
                        label: 'Presión Arterial Sistólica',
                        backgroundColor: 'rgba(75, 192, 192, 0.75)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        hoverBackgroundColor: 'rgba(75, 192, 192, 1)',
                        hoverBorderColor: 'rgba(75, 192, 192, 1)',
                        data: sistolica
                    }
                ]
            };

            var ctx = $("#myChart");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});

    */