<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\TotalAcidentesPorAnoServiceInterface;
use Illuminate\Support\Facades\Cache;

class TotalAcidentesPorAnoService implements TotalAcidentesPorAnoServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        $rows = Cache::get('dados_cenipa');
        // dd($rows[0]);
        $rows = $rows
            ->filter(function ($item) {
                return stripos($item['tipo-de-aeronave'], '***') === false;
            })
            ->filter(function ($item) {
                return !empty($item['data-e-hora-da-ocorrencia']);
            })
            ->map(function ($item) {
                $date = explode(' ', $item['data-e-hora-da-ocorrencia']);
                $ano = explode('-', $date[0]);
                return [
                    'ano' => $ano[0],
                    'total-de-fatalidades-no-acidente' => $item['total-de-fatalidades-no-acidente'],
                    'tipo-de-aeronave' => $item['tipo-de-aeronave'],
                ];
            })
            ->groupBy('ano');
        $groupwithcount = $rows->map(function ($group) {
            return $group->count();
        });
        return $groupwithcount;
    }
}
