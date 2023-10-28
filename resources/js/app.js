require("./bootstrap");

window.Apex = {
    // chart: {
    //     fontFamily:'Inter',
    //     fontWeight: '300'
    // },
    dataLabels: {
        // enabled: false,
    },
};

function graficoPadraoV2(data, elemento, titulo, stacked, horizontal) {
    // let colores = [
    //     "#e60049",
    //     "#0bb4ff",
    //     "#50e991",
    //     "#e6d800",
    //     "#9b19f5",
    //     "#ffa300",
    //     "#dc0ab4",
    //     "#b3d4ff",
    //     "#00bfa0",
    // ];
    let colores = [
        "#1A535C",
        "#4ECDC4",
        "#EDAE49",
        "#D1495B",
        "#DB504A",
        "#84E6F8",
        "#D7C0D0",
    ];
    var optionsBarV6 = {
        chart: {
            type: "bar",
            height: horizontal === false ? 450 : 'auto',
            width: "100%",
            foreColor: "#000",
            stacked: stacked,
        },
        plotOptions: {
            bar: {
                horizontal: horizontal,
                // borderRadius: 10,
                dataLabels: {
                    total: {
                        enabled: false,
                        style: {
                            fontSize: "11px",
                            fontWeight: 900,
                        },
                    },
                },
            },
        },
        colors: colores,
        series: data.series,
        labels: data.label,
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
                colors: ["#000"],
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
            text: titulo,
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
        document.querySelector(`#${elemento}`),
        optionsBarV6
    );
    chartBar.render();
}

graficoPadraoV2(dataIdade, "barV4", "Idade dos alunos por Curso", false, true);
graficoPadraoV2(
    dataCorpoDocenteFatec,
    "barV6",
    "Avaliação ao corpo docente",
    false,
    false
);
graficoPadraoV2(
    dataDidaticaDocente,
    "barV7",
    "Avaliação da didatica-pedagogica",
    false,
    false
);
graficoPadraoV2(
    dataQualidadeFatec,
    "barV5",
    "Avaliação dos alunos a Qualidade da Fatec",
    false,
    false
);
graficoPadraoV2(
    dataFeteps,
    "barV3",
    "Avaliação dos alunos e docentes a FETEPS - Feira Tecnológica Paula Souza",
    false,
    false
);

graficoPadraoV2(
    dataInfraestrutura,
    "barV2",
    `Avaliação dos alunos sobre ${dataInfraestrutura.pergunta}`,
    false,
    false
);
graficoPadraoV2(
    dataEspacoConveniencia,
    "barV8",
    `Avaliação dos alunos sobre ${dataEspacoConveniencia.pergunta}`,
    false,
    false
);
graficoPadraoV2(
    dataSexo,
    "bar",
    `Total de pessoas por curso, docentes e funcionarios`,
    true,
    false
);
graficoPadraoV2(
    dataAcessibilidadeFatec,
    "barV9",
    `Avaliação por acessibilidade`,
    true,
    false
);
