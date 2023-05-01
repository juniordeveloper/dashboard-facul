<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\TotalAcidentesPorFatorServiceInterface;
use Illuminate\Support\Facades\Cache;

class TotalAcidentesPorFatorService implements TotalAcidentesPorFatorServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        $rows = Cache::get('dados_cenipa');
        $rows = $rows
            ->filter(function ($item) {
                return !empty($item['area-do-fator']);
            })
            ->map(function ($item) {
                return [
                    'total-de-fatalidades-no-acidente' => $item['total-de-fatalidades-no-acidente'],
                    'area-do-fator' => $item['area-do-fator'],
                ];
            })
            ->groupBy('area-do-fator');
        $groupwithcount = $rows->map(function ($group) {
            return [
                'total_geral' => $group->count(),
                'total_mortes' => $group->sum('total-de-fatalidades-no-acidente'),
            ];
        })
            ->sortDesc();
        return $groupwithcount;
    }
}
