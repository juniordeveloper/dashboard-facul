<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\TotalAcidentesPorNivelDanoServiceInterface;
use Illuminate\Support\Facades\Cache;

class TotalAcidentesPorNivelDanoService implements TotalAcidentesPorNivelDanoServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        $rows = Cache::get('dados_cenipa');
        $rows = $rows
            ->filter(function ($item) {
                return stripos($item['nivel-de-dano-da-aeronave'], '***') === false;
            })
            ->filter(function ($item) {
                return stripos($item['tipo-de-aeronave'], '***') === false;
            })
            ->filter(function ($item) {
                return !empty($item['data-e-hora-da-ocorrencia']);
            })
            ->map(function ($item) {
                return [
                    'total-de-fatalidades-no-acidente' => $item['total-de-fatalidades-no-acidente'],
                    'nivel-de-dano-da-aeronave' => $item['nivel-de-dano-da-aeronave'],
                ];
            })
            ->groupBy('nivel-de-dano-da-aeronave');
        $groupwithcount = $rows->map(function ($group) {
            return [
                'total_geral' => $group->count(),
                'total_mortes' => $group->sum('total-de-fatalidades-no-acidente'),
            ];
        })
            ->sortByDesc('total_mortes');
        return $groupwithcount;
    }
}
