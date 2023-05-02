<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="/css/app.css?curl={{ md5(microtime(true)) }}" rel="stylesheet"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0);">ACIDENTES AÉREOS - RETROSPECTIVO ENTRE 2010 E 2021</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar uma data" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div id="wrapper" class="container-fluid">
        <div class="content-area mb-5">
            <div class="main">
                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <div class="box shadow">
                            <div id="bar"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-md-4">
                        <div class="box shadow">
                            <div id="box_plot_br"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box shadow">
                            <div id="box_plot_sp"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box shadow">
                            <div id="box_plot_mortes"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="box shadow">
                            <div id="acidentes_brasil"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box shadow">
                            <div id="acidentes_sp"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <div class="box shadow">
                            <div id="bar_operacao_fator"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <div class="box shadow">
                            <div id="bar_nivel_dano"></div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="box shadow">
                            <h6>Média de mortes por acidente</h6>
                            <h1>{{ $mortesEstatistica['media'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Moda de mortes por acidente</h6>
                            <h1>{{ implode(', ', $mortesEstatistica['moda']) }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mediana de mortes por acidente</h6>
                            <h1>{{ $mortesEstatistica['mediana'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mínimo de mortes por acidente</h6>
                            <h1>{{ $mortesEstatistica['minimo'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Máximo de mortes por acidente</h6>
                            <h1>{{ $mortesEstatistica['maximo'] }}</h1>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="box shadow">
                            <h6>Média de acidentes BR</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAno['media'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Moda de acidentes BR</h6>
                            <h1>{{ implode(', ', $estatisticasTotalAcidentesPorAno['moda']) }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mediana de acidentes BR</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAno['mediana'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mínimo de acidentes BR</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAno['minimo'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Máximo de acidentes BR</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAno['maximo'] }}</h1>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="box shadow">
                            <h6>Média de acidentes SP</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAnoSp['media'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Moda de acidentes SP</h6>
                            <h1>{{ implode(', ', $estatisticasTotalAcidentesPorAnoSp['moda']) }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mediana de acidentes SP</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAnoSp['mediana'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Mínimo de acidentes SP</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAnoSp['minimo'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box shadow">
                            <h6>Máximo de acidentes SP</h6>
                            <h1>{{ $estatisticasTotalAcidentesPorAnoSp['maximo'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const acidentesPorTipo = {!! json_encode($acidentesPorTipo) !!}
        const acidentesMortesPorTipo = {!! json_encode($acidentesMortesPorTipo) !!}
        const totalAcidentesPorAno = {!! json_encode($totalAcidentesPorAno) !!}
        const totalAcidentesPorAnoSp = {!! json_encode($totalAcidentesPorAnoSp) !!}

        const mediaTotalAcidentesPorAnoSp = '{!! $mediaTotalAcidentesPorAnoSp !!}';
        const medianaTotalAcidentesPorAnoSp = '{!! $medianaTotalAcidentesPorAnoSp !!}';
        const minTotalAcidentesPorAnoSp = '{!! $totalAcidentesPorAnoSp->min() !!}';
        const maxTotalAcidentesPorAnoSp = '{!! $totalAcidentesPorAnoSp->max() !!}';

        const boxPlotAcidentesPorAnoBr = {!! json_encode($boxPlotAcidentesPorAnoBr) !!}
        const boxPlotAcidentesPorAnoSP = {!! json_encode($boxPlotAcidentesPorAnoSP) !!}
        const mortesTotalBox = {!! json_encode($mortesTotalBox) !!}

        const totalAcidentesPorOperacao = {!! json_encode($totalAcidentesPorOperacaoLimit) !!}
        const totalAcidentesPorNivelDano = {!! json_encode($totalAcidentesPorNivelDano) !!}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/js/app.js?curl={{ md5(microtime(true)) }}"></script>
</body>
</html>
