<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\AcidentesMortesTipoAeronaveServiceInterface;
use Illuminate\Support\Facades\Cache;

class AcidentesMortesTipoAeronaveService implements AcidentesMortesTipoAeronaveServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        $rows = Cache::get('dados_cenipa');
        $rows = $rows

            ->filter(function ($item) {
                return !empty($item['data-e-hora-da-ocorrencia']);
            })
            ->filter(function ($item) {
                return stripos($item['tipo-de-aeronave'], '***') === false;
            })
            ->map(function ($item) {
                return [
                    'total-de-fatalidades-no-acidente' => $item['total-de-fatalidades-no-acidente'],
                    'tipo-de-aeronave' => $item['tipo-de-aeronave'],
                ];
            })
            ->groupBy('tipo-de-aeronave');
        $groupwithcount = $rows->map(function ($group) {
            return $group->sum('total-de-fatalidades-no-acidente');
            // return $group->count();
        })
            ->sortDesc();
        return $groupwithcount->all();
    }
}
