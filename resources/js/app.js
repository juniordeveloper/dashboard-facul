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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            // return opt.w.globals.seriesNames[opt.seriesIndex] + ":  " + val;
            return val;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
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
        // stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            // borderRadius: 10,
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
    // colors: ["#1976D2", "#FECDD3"],
    series: dataInfraestrutura.series,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return val;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
    },
    title: {
        text: "Avaliação dos alunos a algumas areas da FATEC",
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

var optionsBarV3 = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
        // stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            // borderRadius: 10,
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
    // colors: ["#1976D2", "#FECDD3"],
    series: dataFeteps.series,
    labels: dataFeteps.label,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return `${val}%`;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
    },
    title: {
        text: "Avaliação dos alunos a algumas areas da FATEC",
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

var chartBar = new ApexCharts(document.querySelector("#barV3"), optionsBarV3);
chartBar.render();

var optionsBarV4 = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
        // stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            // borderRadius: 10,
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
    // colors: ["#1976D2", "#FECDD3"],
    series: dataIdade.series,
    labels: dataIdade.label,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return `${val}`;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
    },
    title: {
        text: "Idade dos alunos por curso",
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

var chartBar = new ApexCharts(document.querySelector("#barV4"), optionsBarV4);
chartBar.render();

var optionsBarV5 = {
    chart: {
        type: "bar",
        height: 450,
        width: "100%",
        foreColor: "#999",
        // stacked: true,
    },
    plotOptions: {
        bar: {
            horizontal: false,
            // borderRadius: 10,
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
    // colors: ["#1976D2", "#FECDD3"],
    series: dataQualidadeFatec.series,
    labels: dataQualidadeFatec.label,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return `${val}%`;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
    },
    title: {
        text: "Avaliação da Fatec",
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

var chartBar = new ApexCharts(document.querySelector("#barV5"), optionsBarV5);
chartBar.render();

var optionsBarV6 = {
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
            // borderRadius: 10,
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
    series: dataCorpoDocenteFatec.series,
    labels: dataCorpoDocenteFatec.label,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return `${val}%`;
        },
        style: {
            fontSize: "11px",
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
    // legend: {
    //     floating: true,
    //     position: "top",
    //     horizontalAlign: "right",
    //     offsetY: -10,
    // },
    title: {
        text: "Avaliação da Fatec",
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

var chartBar = new ApexCharts(document.querySelector("#barV6"), optionsBarV6);
chartBar.render();

var optionsBarV7 = {
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
            // borderRadius: 10,
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
    series: dataDidaticaDocente.series,
    labels: dataDidaticaDocente.label,
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
                fontSize: "12px",
            },
        },
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
            return `${val}%`;
        },
        style: {
            fontSize: "11px",
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
        offsetY: -10,
    },
    title: {
        text: "Avaliação da Fatec",
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

var chartBar = new ApexCharts(document.querySelector("#barV7"), optionsBarV7);
chartBar.render();
