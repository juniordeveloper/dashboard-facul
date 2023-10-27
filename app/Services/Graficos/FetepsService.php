<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\FetepsServiceInterface;

class FetepsService implements FetepsServiceInterface
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
        $perguntaFetepsAluno = $dadoAlunoGeral
        // ->filter(function ($i) {
        //     return $i->indicador == 'Eixo: 5';
        // })
            ->filter(function ($v) {
                return in_array($v->pergunta, ['FETEPS']);
            })
            ->sortBy('pergunta');

        $totalRespostasAlunos = $perguntaFetepsAluno->sum('totais_validos');
        $perguntaFetepsDocente = $dadoDocente->filter(function ($v) {
            return in_array($v->pergunta, ['FETEPS']);
        });

        $dataFeteps = [
            'label' => $perguntaFetepsAluno->first()->resposta,
            'series' => [
                [
                    'name' => 'Alunos',
                    'data' => [],
                ],
                [
                    'name' => 'Docentes',
                    'data' => [],
                ],
            ],
        ];
        foreach ($perguntaFetepsAluno as $v) {
            foreach ($v->totais as $kk => $vv) {
                if (!isset($dataFeteps['series'][0]['data'][$kk])) {
                    $dataFeteps['series'][0]['data'][$kk] = 0;
                }
                $dataFeteps['series'][0]['data'][$kk] += $vv;
            }
        }

        $dataFeteps['series'][0]['data'] = array_map(function ($v) use ($totalRespostasAlunos) {
            return number_format(($v * 100) / $totalRespostasAlunos, 2);
        }, $dataFeteps['series'][0]['data']);
        $totalRespostasAlunos = array_sum($perguntaFetepsDocente->first()->totais);
        foreach ($perguntaFetepsDocente as $v) {
            foreach ($v->totais as $kk => $vv) {
                if (!isset($dataFeteps['series'][1]['data'][$kk])) {
                    $dataFeteps['series'][1]['data'][$kk] = 0;
                }
                $dataFeteps['series'][1]['data'][$kk] += number_format(($vv * 100) / $totalRespostasAlunos, 2);
            }
        }
        return $dataFeteps;
    }
}
