<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\IdadeServiceInterface;

class IdadeService implements IdadeServiceInterface
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
        // dd($dadoDocente->toArray(), $dadoFuncionario->toArray());
        $perguntaSexo = $dadoAlunoGeral->filter(function ($i) {
            return $i->numero_pergunta == 2;
        });
        $perguntaSexoDocente = $dadoDocente->filter(function ($i) {
            return $i->numero_pergunta == 2;
        });
        $perguntaSexoFuncionario = $dadoFuncionario->filter(function ($i) {
            return $i->numero_pergunta == 2;
        });
        $dataSexo = [
            'label' => [],
            'series' => [],
        ];
        foreach ($perguntaSexo as $v) {
            if (!in_array($v->curso, $dataSexo['label'])) {
                $dataSexo['label'][] = $v->curso;
            }
            foreach ($v->resposta as $kk => $vv) {
                $dataSexo['series'][$kk]['name'] = $vv;
            }
            foreach ($v->porcentagem as $kk => $vv) {
                $dataSexo['series'][$kk]['data'][] = $vv;
            }
        }
        $dataSexo['label'][] = 'Docentes';
        $dataSexo['label'][] = 'Funcionários';
        foreach ($perguntaSexoDocente as $v) {
            foreach ($v->totais as $kk => $vv) {
                $dataSexo['series'][$kk]['data'][] = $vv;
            }
        }
        foreach ($perguntaSexoFuncionario as $v) {
            foreach ($v->totais as $kk => $vv) {
                $dataSexo['series'][$kk]['data'][] = $vv;
            }
        }
        $dataSexo['label'] = array_map(function ($v) {
            return explode(' ', $v);
        }, $dataSexo['label']);
        return $dataSexo;
    }
}
