google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
    drawChart1();
    drawChart2();
}

function drawChart1() {
    var rawData = bairros_frequentes_json; // Usando a variável global definida no PHP
    var dataArray = [['Bairro', 'Total de Serviços', { role: 'style' }]];

    for (var i = 0; i < rawData.length; i++) {
        dataArray.push([rawData[i][0], rawData[i][1], 'color: dodgerblue']);
    }

    var data = google.visualization.arrayToDataTable(dataArray);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        { calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation" },
        2]);

    var options = {
        title: "Bairros com Mais Serviços",
        legend: { position: "none" },
        chartArea: {
            width: '90%',
            height: '80%'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, getResponsiveOptions(options));
}

function drawChart2() {
    var rawData = ganhos_mensais_json; // Usando a variável global definida no PHP
    var dataArray = [['Mês', 'Ganho Total']];
    var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    for (var i = 0; i < rawData.length; i++) {
        dataArray.push([meses[rawData[i][0] - 1], rawData[i][1]]);
    }

    var data = google.visualization.arrayToDataTable(dataArray);

    var options = {
        title: 'Ganhos Mensais',
        curveType: 'function',
        legend: { position: 'bottom' },
        chartArea: {
            width: '90%',
            height: '80%'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    chart.draw(data, getResponsiveOptions(options));
}

function getResponsiveOptions(options) {
    var width = window.innerWidth;
    var height = window.innerHeight;
    
    if (width < 600) {
        options.chartArea.width = '100%';
        options.chartArea.height = '100%';
    }
    return options;
}

window.addEventListener('resize', drawCharts);
