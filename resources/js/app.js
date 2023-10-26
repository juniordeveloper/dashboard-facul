require("./bootstrap");

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
        stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 10,
            dataLabels: {
                total: {
                    enabled: false,
                    style: {
                        fontSize: "13px",
                        fontWeight: 900,
                    },
                },
            },
        },
    },
    colors: ["#1976D2", "#FECDD3"],
    series: dataSexo.series,
    labels: dataSexo.label,
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
        formatter: function (val, opt) {
            return opt.w.globals.seriesNames[opt.seriesIndex] + ":  " + val;
        },
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: true,
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
        text: "Total de pessoas por curso, docentes e funcionarios",
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

var optionsBarV2 = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
        stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 10,
            dataLabels: {
                total: {
                    enabled: false,
                    style: {
                        fontSize: "13px",
                        fontWeight: 900,
                    },
                },
            },
        },
    },
    colors: ["#1976D2", "#FECDD3"],
    series: dataInfraestrutura.dados,
    labels: dataInfraestrutura.labels,
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
        formatter: function (val, opt) {
            return val;
        },
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: true,
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
        text: "Total de pessoas por curso, docentes e funcionarios",
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

var chartBar = new ApexCharts(document.querySelector("#barV2"), optionsBarV2);
chartBar.render();
