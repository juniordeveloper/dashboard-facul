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

function graficoPadraoV2(data, elemento, titulo, stacked, horizontal, porcentagem) {
    let coloresv1 = [
        "#e60049",
        "#0bb4ff",
        "#50e991",
        "#e6d800",
        "#9b19f5",
        "#ffa300",
        "#dc0ab4",
        "#b3d4ff",
        "#00bfa0",
    ];
    let coloresv2 = [
        "#1A535C",
        "#4ECDC4",
        "#EDAE49",
        "#D1495B",
        "#DB504A",
        "#84E6F8",
        "#D7C0D0",
    ];
    let coloresv3 = [
        '#191970',
        '#000080',
        '#00008B',
        '#0000CD',
        '#0000FF',
        '#6495ED',
        '#4169E1',
        '#1E90FF',
        '#00BFFF',
        '#87CEFA',
        '#87CEEB',
        '#4682B4',
        '#B0C4DE',
    ];
    let coloresv4 = ['#00FFFF', '#00CED1', '#40E0D0', '#48D1CC', '#20B2AA', '#008B8B', '#008B8B', '#7FFFD4', '#66CDAA', '#5F9EA0'];
    let escalas = {
        '0':coloresv3,
        '1':coloresv2,
        '2':coloresv1,
    }
    let randEscala = parseInt(Math.random() * 3);
    let colores = escalas[randEscala];
    colores = coloresv4;
    let tipoGrafico = 'bar';
    if(elemento == 'barV14') {
        tipoGrafico = 'pie'
    }
    var optionsBarV6 = {
        chart: {
            type: tipoGrafico,
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
                return porcentagem ? `${val}%` : val;
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
        plotOptions: {
            bar: {
              distributed: !porcentagem,
            }
        },
    };

    var optionsPie = {
        chart: {
            type: 'pie',
            // width: "100%"
            height: '463',
            foreColor: "#000",
            stacked: stacked,
            toolbar: {
                show: true,
            }
        },
        plotOptions: {
            pie: {
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
        // labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        series: data.series[0].data,
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
                return porcentagem ? `${val}%` : val;
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
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
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
        elemento == 'barV14' ? optionsPie : optionsBarV6
    );
    chartBar.render();
}

graficoPadraoV2(dataIdade, "barV4", "Idade dos alunos por Curso", false, true, true);
graficoPadraoV2(
    dataCorpoDocenteFatec,
    "barV6",
    "Avaliação ao corpo docente",
    false,
    false,
    true
);
graficoPadraoV2(
    dataDidaticaDocente,
    "barV7",
    "Avaliação da didatica-pedagogica",
    false,
    false,
    true
);
graficoPadraoV2(
    dataSatisfacao,
    "barV16",
    "Satisfação pelo curso escolhido",
    false,
    false,
    true
);
graficoPadraoV2(
    dataQualidadeFatec,
    "barV5",
    "Avaliação dos alunos a Qualidade da Fatec",
    false,
    false,
    true
);
// graficoPadraoV2(
//     dataFeteps,
//     "barV3",
//     "Avaliação dos alunos e docentes a FETEPS - Feira Tecnológica Paula Souza",
//     false,
//     false,
//     true
// );

graficoPadraoV2(
    dataInfraestrutura,
    "barV2",
    `Avaliação dos alunos sobre ${dataInfraestrutura.pergunta}`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataEspacoConveniencia,
    "barV8",
    `Avaliação dos alunos sobre ${dataEspacoConveniencia.pergunta}`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataSexo,
    "bar",
    `Total de pessoas por curso, docentes e funcionarios`,
    true,
    false,
    true
);
graficoPadraoV2(
    dataAcessibilidadeFatec,
    "barV9",
    `Avaliação por acessibilidade`,
    true,
    false,
    true
);
graficoPadraoV2(
    dataConhecimentoFatec,
    "barV10",
    `Fatec em Cotia`,
    true,
    false,
    true
);
graficoPadraoV2(
    dataRedesFatec,
    "barV11",
    `Por onde conheceu`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataSexoPresentes,
    "barV12",
    `Total de pessoas por curso, docentes e funcionarios`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataInteresseFatec,
    "barV13",
    `Interesse nos cursos oferecidos pela FATEC COTIA`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataTipoEnsino,
    "barV14",
    `Qual tipo de instituição deseja estudar`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataNotaProbabilidade,
    "barV15",
    `Probabilidade de estudar na FATEC`,
    false,
    false,
    true
);
graficoPadraoV2(
    dataSocialService,
    "barV17",
    `Mídias Sociais`,
    true,
    false,
    true
);
