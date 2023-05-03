<?php

namespace App\Services\Graficos;

use Illuminate\Support\Facades\Cache;
use App\Services\Graficos\Contracts\TotalAcidentesPorUFServiceInterface;

class TotalAcidentesPorUFService implements TotalAcidentesPorUFServiceInterface
{
    public function __construct()
    {}

    /**
     * @return mixed
     */
    public function handler()
    {
        $rows = Cache::get('dados_cenipa');
        $rows = $rows
            ->filter(function ($item) {
                return !empty($item['uf-da-ocorrencia']);
            })
            ->filter(function ($item) {
                return stripos($item['uf-da-ocorrencia'], '***') === false;
            })
            ->filter(function ($item) {
                return !empty($item['data-e-hora-da-ocorrencia']);
            })
            ->map(function ($item) {
                return [
                    'total-de-fatalidades-no-acidente' => $item['total-de-fatalidades-no-acidente'],
                    'uf-da-ocorrencia' => $item['uf-da-ocorrencia'],
                ];
            })
            ->groupBy('uf-da-ocorrencia');
        $groupwithcount = $rows->map(function ($group) {
            return [
                'total_geral' => $group->count(),
                'total_mortes' => $group->sum('total-de-fatalidades-no-acidente'),
            ];
        })
            ->sortByDesc('total_geral')->toArray();
        $resp = [];
        foreach ($groupwithcount as $uf => $row) {
            $resp[] = [
                'x' => $uf,
                'y' => $row['total_geral'],
            ];
        }
        return $resp;
    }
}
