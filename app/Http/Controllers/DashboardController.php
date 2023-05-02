<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Services\Graficos\AcidentesMortesTipoAeronaveService;
use App\Services\Graficos\AcidentesPorTimeAeronaveService;
use App\Services\Graficos\TotalAcidentesPorAnoService;
use App\Services\Graficos\TotalAcidentesPorAnoSpService;
use App\Services\Graficos\TotalAcidentesPorFatorService;
use App\Services\Graficos\TotalAcidentesPorNivelDanoService;
use App\Services\Graficos\TotalAcidentesPorOperacaoService;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(
        AcidentesPorTimeAeronaveService $acidentesPorTimeAeronaveService,
        AcidentesMortesTipoAeronaveService $acidentesMortesTipoAeronaveService,
        TotalAcidentesPorAnoSpService $totalAcidentesPorAnoSpService,
        TotalAcidentesPorFatorService $totalAcidentesPorFatorService,
        TotalAcidentesPorOperacaoService $totalAcidentesPorOperacaoService,
        TotalAcidentesPorNivelDanoService $totalAcidentesPorNivelDanoService,
        TotalAcidentesPorAnoService $totalAcidentesPorAnoService
    ) {
        $rows = $this->loadCSV(resource_path('cenipa.csv'));
        $mortesTotal = $rows->pluck('total-de-fatalidades-no-acidente')->filter(fn($x) => $x > 0)->toArray();
        $mortesTotalBox = Utils::boxplotData($mortesTotal);
        $mortesEstatistica = Utils::calcularEstatisticas($mortesTotal);
        // dd($mortesTotalBox, $mortesEstatistica);
        // dd($rows->pluck('tipo-de-ocorrencia')->unique()->toArray());
        // dd($rows[0]);

        $totalAcidentesPorFator = $totalAcidentesPorFatorService->handler();
        $totalAcidentesPorNivelDano = $totalAcidentesPorNivelDanoService->handler();
        // dd($totalAcidentesPorNivelDano->toArray());
        $totalAcidentesPorOperacao = $totalAcidentesPorOperacaoService->handler();
        $totalAcidentesPorOperacaoLimit = $totalAcidentesPorOperacao->slice(0, 10);

        // dd($totalAcidentesPorOperacao->toArray(), $totalAcidentesPorOperacao->slice(0, 10)->toArray());
        // dd($rows->pluck('tipo-de-ocorrencia')->unique()->toArray());

        $acidentesPorTipo = $acidentesPorTimeAeronaveService->handler();

        $acidentesMortesPorTipo = $acidentesMortesTipoAeronaveService->handler();
        $totalAcidentesPorAno = $totalAcidentesPorAnoService->handler();
        $boxPlotAcidentesPorAnoBr = Utils::boxplotData($totalAcidentesPorAno->toArray());
        $estatisticasTotalAcidentesPorAno = Utils::calcularEstatisticas($totalAcidentesPorAno->toArray());

        $totalAcidentesPorAnoSp = $totalAcidentesPorAnoSpService->handler();
        $boxPlotAcidentesPorAnoSP = Utils::boxplotData($totalAcidentesPorAnoSp->toArray());
        $mediaTotalAcidentesPorAnoSp = number_format($totalAcidentesPorAnoSp->sum() / $totalAcidentesPorAnoSp->count(), 0);
        $medianaTotalAcidentesPorAnoSp = number_format($totalAcidentesPorAnoSp->median(), 0);
        $estatisticasTotalAcidentesPorAnoSp = Utils::calcularEstatisticas($totalAcidentesPorAnoSp->toArray());

        return view('dashboard', compact(
            'acidentesPorTipo',
            'acidentesMortesPorTipo',
            'totalAcidentesPorAno',
            'totalAcidentesPorAnoSp',
            'mediaTotalAcidentesPorAnoSp',
            'medianaTotalAcidentesPorAnoSp',
            'estatisticasTotalAcidentesPorAno',
            'estatisticasTotalAcidentesPorAnoSp',
            'totalAcidentesPorOperacao',
            'totalAcidentesPorOperacaoLimit',
            'totalAcidentesPorNivelDano',
            'boxPlotAcidentesPorAnoBr',
            'boxPlotAcidentesPorAnoSP',
            'mortesEstatistica',
            'mortesTotalBox'
        ));
    }

    private function loadCSV($csvFile)
    {
        if (Cache::has('dados_cenipa')) {
            return Cache::get('dados_cenipa');
        }

        $lines = file($csvFile);
        $rows = array_map(function ($item) {
            return str_getcsv($item, ';');
        }, $lines);
        $header_row = array_shift($rows);
        $lines = [];
        foreach ($rows as $row) {
            $row['2'] = Utils::formatDate($row['2'], 'd/m/Y H:i', 'Y-m-d H:i:s');
            $row['48'] = Utils::formatDate($row['48'], 'd/m/Y H:i', 'Y-m-d H:i:s');
            $row['13'] = Utils::formatDate($row['13'], 'd/m/Y', 'Y-m-d');
            $row['47'] = Utils::formatDate($row['47'], 'd/m/Y', 'Y-m-d');
            if (!empty($row)) {
                $lines[] = array_combine($header_row, $row);
            }
        }
        Cache::put('dados_cenipa', collect($lines), now()->minute(1800));
        return $lines;
    }
}
