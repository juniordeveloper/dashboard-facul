<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,500;1,600&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
    <title>Dashboard | WebSai | Fatec</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>WebSai </span>Fatec</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content-default">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Filtros...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">
                                Analytics
                            </a>
                        </li>
                        <li><a href="#" class="active"></a></li>
                    </ul>
                </div>
                {{-- <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a> --}}
            </div>

            <!-- Insights -->
            @foreach ($dataTotaisRespostas as $kk => $vv)
            <ul class="insights">
                @foreach ($vv as $key => $value)
                <li class="{{ \Str::slug($key) }}">
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            {{ $key }}
                        </h3>
                        <p>{{ $value }}</p>
                    </span>
                </li>
                @endforeach

                {{-- <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Items</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Items</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Items</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Items</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Items</p>
                    </span>
                </li> --}}
            </ul>
            @endforeach

            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Generos por Curso</h3>
                            </div>
                            <div id="bar"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Comparação Notas Aluno X Docentes sobre a FETEPS</h3>
                            </div>
                            <div id="barV3"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Idade por Curso</h3>
                            </div>
                            <div id="barV4"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Qualidade da Fatec</h3>
                            </div>
                            <div id="barV5"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Avaliação do Corpo Docente</h3>
                            </div>
                            <div id="barV6"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Avaliação da Didatica Corpo Docente</h3>
                            </div>
                            <div id="barV7"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Infraestrutura</h3>
                                {{-- <i class='bx bx-filter'></i>
                                <i class='bx bx-search'></i> --}}
                            </div>
                            <div id="barV2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="bottom-data">
                        <div class="orders">
                            <div class="header">
                                <i class='bx bx-receipt'></i>
                                <h3>Infraestrutura</h3>
                                {{-- <i class='bx bx-filter'></i>
                                <i class='bx bx-search'></i> --}}
                            </div>

                            <div id="barV8"></div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <script src="/js/teste.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var dataSexo = {{ Illuminate\Support\Js::from($dataSexo) }};
        var dataInfraestrutura = {{ Illuminate\Support\Js::from($dataInfraestrutura) }};
        var dataFeteps = {{ Illuminate\Support\Js::from($dataFeteps) }};
        var dataIdade = {{ Illuminate\Support\Js::from($dataIdade) }};
        var dataQualidadeFatec = {{ Illuminate\Support\Js::from($dataQualidadeFatec) }};
        var dataCorpoDocenteFatec = {{ Illuminate\Support\Js::from($dataCorpoDocenteFatec) }};
        var dataDidaticaDocente = {{ Illuminate\Support\Js::from($dataDidaticaDocente) }};
        var dataEspacoConveniencia = {{ Illuminate\Support\Js::from($dataEspacoConveniencia) }};
    </script>
    <script src="/js/app.js"></script>
</body>

</html>
