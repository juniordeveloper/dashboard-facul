// require("./bootstrap");

window.Apex = {
    dataLabels: {
        // enabled: false,
    },
};

var optionsBar = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true,
                position: "top",
            },
        },
    },
    colors: ["#00C5A4", "#FFB900"],
    series: [
        {
            name: "Total de acidentes",
            data: Object.values(acidentesPorTipo),
        },
        {
            name: "Total de mortes",
            data: Object.values(acidentesMortesPorTipo),
        },
    ],
    labels: Object.keys(acidentesPorTipo),
    xaxis: {
        axisBorder: {
            show: true,
        },
        axisTicks: {
            show: true,
        },
        crosshairs: {
            show: true,
        },
        labels: {
            show: true,
            style: {
                fontSize: "14px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val;
        },
        offsetY: -30,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: false,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    yaxis: {
        axisBorder: {
            show: true,
        },
        labels: {
            show: true,
        },
    },
    legend: {
        floating: true,
        position: "top",
        horizontalAlign: "right",
        offsetY: -36,
    },
    title: {
        text: "Total de acidentes com e sem mortes por tipo de aeronave",
        align: "left",
    },
    subtitle: {
        // text: "Sessions and Views",
    },
    tooltip: {
        shared: true,
        intersect: false,
    },
};

var chartBar = new ApexCharts(document.querySelector("#bar"), optionsBar);
chartBar.render();

var optionsOperacaoBar = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true,
                position: "top",
            },
        },
    },
    colors: ["#00C5A4", "#FFB900"],
    series: [
        {
            name: "Total de acidentes",
            data: Object.values(totalAcidentesPorOperacao).map(
                (item) => item.total_geral
            ),
        },
        {
            name: "Total de mortes",
            data: Object.values(totalAcidentesPorOperacao).map(
                (item) => item.total_mortes
            ),
        },
    ],
    labels: Object.keys(totalAcidentesPorOperacao).map((item) =>
        item.split(" ")
    ),
    xaxis: {
        axisBorder: {
            show: true,
        },
        axisTicks: {
            show: true,
        },
        crosshairs: {
            show: true,
        },
        labels: {
            show: true,
            style: {
                fontSize: "14px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val;
        },
        offsetY: -30,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: false,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    yaxis: {
        axisBorder: {
            show: true,
        },
        labels: {
            show: true,
        },
    },
    legend: {
        floating: true,
        position: "top",
        horizontalAlign: "right",
        offsetY: -36,
    },
    title: {
        text: "Qual operação existe mais acidentes",
        align: "left",
    },
    subtitle: {
        // text: "Sessions and Views",
    },
    tooltip: {
        shared: true,
        intersect: false,
    },
};

var chartBar = new ApexCharts(
    document.querySelector("#bar_operacao_fator"),
    optionsOperacaoBar
);
chartBar.render();

var optionsNivelDanoBar = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true,
                position: "top",
            },
        },
    },
    colors: ["#00C5A4", "#FFB900"],
    series: [
        {
            name: "Total de acidentes",
            data: Object.values(totalAcidentesPorNivelDano).map(
                (item) => item.total_geral
            ),
        },
        {
            name: "Total de mortas",
            data: Object.values(totalAcidentesPorNivelDano).map(
                (item) => item.total_mortes
            ),
        },
    ],
    labels: Object.keys(totalAcidentesPorNivelDano).map((item) =>
        item.split(" ")
    ),
    xaxis: {
        axisBorder: {
            show: true,
        },
        axisTicks: {
            show: true,
        },
        crosshairs: {
            show: true,
        },
        labels: {
            show: true,
            style: {
                fontSize: "14px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return val;
        },
        offsetY: -30,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: false,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    yaxis: {
        axisBorder: {
            show: true,
        },
        labels: {
            show: true,
        },
    },
    legend: {
        floating: true,
        position: "top",
        horizontalAlign: "right",
        offsetY: -36,
    },
    title: {
        text: "Nível do dano aeronave, com a quantidade de mortos",
        align: "left",
    },
    subtitle: {
        // text: "Sessions and Views",
    },
    tooltip: {
        shared: true,
        intersect: false,
    },
};

var chartBar = new ApexCharts(
    document.querySelector("#bar_nivel_dano"),
    optionsNivelDanoBar
);
chartBar.render();

// var optionsMortesBar = {
//     chart: {
//         type: "bar",
//         height: 300,
//         width: "100%",
//         foreColor: "#999",
//     },
//     plotOptions: {
//         bar: {
//             dataLabels: {
//                 enabled: true,
//                 position: "top",
//             },
//         },
//     },
//     colors: ["#FFB900"],
//     series: [
//         {
//             name: "Total de acidentes",
//             data: Object.values(acidentesMortesPorTipo),
//         },
//     ],
//     labels: Object.keys(acidentesMortesPorTipo),
//     xaxis: {
//         axisBorder: {
//             show: true,
//         },
//         axisTicks: {
//             show: true,
//         },
//         crosshairs: {
//             show: true,
//         },
//         labels: {
//             show: true,
//             style: {
//                 fontSize: "14px",
//             },
//         },
//     },
//     dataLabels: {
//         enabled: true,
//         formatter: function (val) {
//             return val;
//         },
//         offsetY: -30,
//         style: {
//             fontSize: "12px",
//             colors: ["#304758"],
//         },
//     },
//     grid: {
//         xaxis: {
//             lines: {
//                 show: false,
//             },
//         },
//         yaxis: {
//             lines: {
//                 show: true,
//             },
//         },
//     },
//     yaxis: {
//         axisBorder: {
//             show: true,
//         },
//         labels: {
//             show: true,
//         },
//     },
//     legend: {
//         floating: true,
//         position: "top",
//         horizontalAlign: "right",
//         offsetY: -36,
//     },
//     title: {
//         text: "Total de acidentes com mortes por tipo de aeronave",
//         align: "left",
//     },
//     subtitle: {
//         // text: "Sessions and Views",
//     },
//     tooltip: {
//         shared: true,
//         intersect: false,
//     },
// };

// var chartMortesBar = new ApexCharts(
//     document.querySelector("#bar_mortes"),
//     optionsMortesBar
// );
// chartMortesBar.render();

var optionsBoxPlotBR = {
    series: [
        {
            type: "boxPlot",
            data: [
                {
                    x: "Acidentes por ano BR",
                    y: boxPlotAcidentesPorAnoBr,
                },
            ],
        },
    ],
    chart: {
        type: "boxPlot",
        height: 350,
    },
    title: {
        text: "BoxPlot de Acidentes por ano BR",
        align: "left",
    },
    plotOptions: {
        boxPlot: {
            colors: {
                upper: "#5C4742",
                lower: "#A5978B",
            },
        },
    },
};

var chartMortesBar = new ApexCharts(
    document.querySelector("#box_plot_br"),
    optionsBoxPlotBR
);
chartMortesBar.render();

var optionsBoxPlotSp = {
    series: [
        {
            type: "boxPlot",
            data: [
                {
                    x: "Acidentes por ano SP",
                    y: boxPlotAcidentesPorAnoSP,
                },
            ],
        },
    ],
    chart: {
        type: "boxPlot",
        height: 350,
    },
    title: {
        text: "BoxPlot de Acidentes por ano SP",
        align: "left",
    },
    plotOptions: {
        boxPlot: {
            colors: {
                upper: "#5a534b",
                lower: "#7e7d7d",
            },
        },
    },
};

var chartMortesBar = new ApexCharts(
    document.querySelector("#box_plot_sp"),
    optionsBoxPlotSp
);
chartMortesBar.render();

var optionsBoxPlotMortes = {
    series: [
        {
            type: "boxPlot",
            data: [
                {
                    x: "Mortes por acidentes",
                    y: mortesTotalBox,
                },
            ],
        },
    ],
    chart: {
        type: "boxPlot",
        height: 350,
    },
    title: {
        text: "BoxPlot de Fatalidades por acidente",
        align: "left",
    },
    plotOptions: {
        boxPlot: {
            colors: {
                upper: "#5a534b",
                lower: "#7e7d7d",
            },
        },
    },
};

var chartMortesBar = new ApexCharts(
    document.querySelector("#box_plot_mortes"),
    optionsBoxPlotMortes
);
chartMortesBar.render();

var optionsAcidentesBrasil = {
    chart: {
        type: "line",
        height: 350,
        width: "100%",
        foreColor: "#999",
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true,
            },
        },
    },
    markers: {
        size: 5,
        style: "hollow",
        strokeWidth: 8,
        strokeColor: "#fff",
        strokeOpacity: 0.25,
    },
    colors: ["#f4516c"],
    dataLabels: {
        enabled: true,
    },
    series: [
        {
            name: "Total por ano no BR",
            data: Object.values(totalAcidentesPorAno),
        },
    ],
    labels: Object.keys(totalAcidentesPorAno),
    legend: {
        floating: true,
        position: "top",
        horizontalAlign: "right",
        offsetY: -36,
    },
    title: {
        text: "Total de acidentes por ano no Brasil",
        align: "left",
    },
    tooltip: {
        shared: false,
        intersect: false,
    },
};

var chartAcidenteBrasil = new ApexCharts(
    document.querySelector("#acidentes_brasil"),
    optionsAcidentesBrasil
);
chartAcidenteBrasil.render();

var optionsAcidentesSp = {
    chart: {
        type: "line",
        height: 350,
        width: "100%",
        foreColor: "#999",
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true,
            },
        },
    },
    markers: {
        size: 5,
        style: "hollow",
        strokeWidth: 8,
        strokeColor: "#fff",
        strokeOpacity: 0.25,
    },
    colors: ["#775DD0"],
    dataLabels: {
        enabled: true,
    },
    series: [
        {
            name: "Total por ano em SP",
            data: Object.values(totalAcidentesPorAnoSp),
        },
    ],
    labels: Object.keys(totalAcidentesPorAnoSp),
    legend: {
        floating: true,
        position: "top",
        horizontalAlign: "right",
        offsetY: -36,
    },
    title: {
        text: "Total de acidentes por ano em SP",
        align: "left",
    },
    tooltip: {
        shared: false,
        intersect: false,
    },
};

var chartAcidenteSp = new ApexCharts(
    document.querySelector("#acidentes_sp"),
    optionsAcidentesSp
);
chartAcidenteSp.render();

var optionsCircle1 = {
    chart: {
        type: "radialBar",
        height: 266,
        zoom: {
            enabled: false,
        },
        offsetY: 20,
    },
    colors: ["#E91E63"],
    plotOptions: {
        radialBar: {
            hollow: {
                size: "70%",
            },
            dataLabels: {
                name: {
                    show: false,
                },
                value: {
                    offsetY: 0,
                },
            },
        },
    },
    series: [mediaTotalAcidentesPorAnoSp],
    theme: {
        monochrome: {
            enabled: false,
        },
    },
    legend: {
        show: false,
    },
    title: {
        text: "Media de acidentes em SP",
        align: "left",
    },
};

var optionsCircle1122 = {
    series: [76, 67, 61, 90, 150],
    chart: {
        height: 390,
        type: "radialBar",
    },
    plotOptions: {
        radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
                margin: 5,
                size: "30%",
                background: "transparent",
                image: undefined,
            },
            dataLabels: {
                name: {
                    show: false,
                },
                value: {
                    show: true,
                },
            },
        },
    },
    colors: ["#1ab7ea", "#0084ff", "#39539E", "#0077B5"],
    labels: ["Media", "Mediana", "Moda", "Minimo", "Maximo"],
    legend: {
        show: true,
        floating: true,
        fontSize: "16px",
        position: "left",
        offsetX: 100,
        offsetY: 15,
        labels: {
            useSeriesColors: true,
        },
        markers: {
            size: 0,
        },
        formatter: function (seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex];
        },
        itemMargin: {
            vertical: 3,
        },
    },
    responsive: [
        {
            breakpoint: 480,
            options: {
                legend: {
                    show: false,
                },
            },
        },
    ],
    title: {
        text: "Acidentes em SP",
        align: "left",
    },
};

// var chartCircle1 = new ApexCharts(
//     document.querySelector("#radialBar1"),
//     optionsCircle1122
// );
// chartCircle1.render();

// var optionsCircle4 = {
//     chart: {
//         height: 314,
//         type: "radialBar",
//     },
//     colors: ["#775DD0", "#00C8E1", "#FFB900"],
//     labels: ["q4"],
//     series: [71, 63, 77],
//     labels: ["June", "May", "April"],
//     theme: {
//         monochrome: {
//             enabled: false,
//         },
//     },
//     plotOptions: {
//         radialBar: {
//             offsetY: -30,
//         },
//     },
//     legend: {
//         show: true,
//         position: "left",
//         containerMargin: {
//             right: 0,
//         },
//     },
//     title: {
//         text: "Growth",
//     },
// };

// // var chartCircle4 = new ApexCharts(
// //     document.querySelector("#radialBarBottom"),
// //     optionsCircle4
// // );
// // chartCircle4.render();

var optionsUF = {
    series: [
        {
            data: totalAcidentesEstado,
        },
    ],
    legend: {
        show: true,
    },
    chart: {
        height: 350,
        type: "treemap",
    },
    title: {
        text: "Total de acidentes por Estado",
    },
    colors: [
        "#3B93A5",
        "#F7B844",
        "#ADD8C7",
        "#EC3C65",
        "#CDD7B6",
        "#C1F666",
        "#D43F97",
        "#1E5D8C",
        "#421243",
        "#7F94B0",
        "#EF6537",
        "#C0ADDB",
    ],
    plotOptions: {
        treemap: {
            distributed: true,
            enableShades: false,
        },
    },
};

var chartUF = new ApexCharts(document.querySelector("#chart_uf"), optionsUF);
chartUF.render();

function generateData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
        var y =
            Math.floor(Math.random() * (yrange.max - yrange.min + 1)) +
            yrange.min;
        var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

        series.push([x, y, z]);
        baseval += 86400000;
        i++;
    }
    return series;
}

function getRandom() {
    return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
}
