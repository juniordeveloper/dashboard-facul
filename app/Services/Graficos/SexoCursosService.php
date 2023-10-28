<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\SexoCursosServiceInterface;

class SexoCursosService implements SexoCursosServiceInterface
{
    public function __construct()
    {}

    /**
     * @return mixed
     */
    public function handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario)
    {
        // dd($dadoDocente->toArray(), $dadoFuncionario->toArray());
        $perguntaSexo = $dadoAlunoGeral->filter(function ($i) {
            return $i->numero_pergunta == 1;
        });
        $perguntaSexoDocente = $dadoDocente->filter(function ($i) {
            return $i->numero_pergunta == 1;
        });
        $perguntaSexoFuncionario = $dadoFuncionario->filter(function ($i) {
            return $i->numero_pergunta == 1;
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
        $dataSexo['label'][] = 'Funcionarios';
        foreach ($perguntaSexoDocente as $v) {
            foreach ($v->porcentagem as $kk => $vv) {
                $dataSexo['series'][$kk]['data'][] = $vv;
            }
        }
        foreach ($perguntaSexoFuncionario as $v) {
            foreach ($v->porcentagem as $kk => $vv) {
                $dataSexo['series'][$kk]['data'][] = $vv;
            }
        }
        $dataSexo['label'] = array_map(function ($v) {
            return explode(' ', $v);
        }, $dataSexo['label']);
        return $dataSexo;
    }
}
