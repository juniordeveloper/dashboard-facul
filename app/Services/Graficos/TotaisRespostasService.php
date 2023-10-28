<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\TotaisRespostasServiceInterface;

class TotaisRespostasService implements TotaisRespostasServiceInterface
{
    public function __construct()
    {}

    /**
     * @param $dadoAlunoGeral
     * @param $dadoDocente
     * @param $dadoFuncionario
     */
    public function handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario)
    {
        $totais = $dadoAlunoGeral->pluck('totais_validos', 'curso')->toArray();
        $totais['Docentes'] = array_sum($dadoDocente[0]->totais);
        $totais['Funcionários'] = array_sum($dadoFuncionario[0]->totais);
        $totais = array_chunk($totais, 3, true);
        return $totais;
    }
}
