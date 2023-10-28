<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\CorpoDocenteFatecServiceInterface;

class CorpoDocenteFatecService implements CorpoDocenteFatecServiceInterface
{
    public function __construct()
    {}

    /**
     * @param $dadoAlunoGeral
     * @param $dadoDocente
     * @param $dadoFuncionario
     * @return mixed
     */
    public function handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario, $numeroPergunta = 36)
    {
        // dd($dadoDocente->toArray(), $dadoFuncionario->toArray());
        $perguntaSexo = $dadoAlunoGeral->filter(function ($i) use ($numeroPergunta) {
            // return in_array($i->numero_pergunta, ['36']);
            return $i->numero_pergunta == $numeroPergunta;
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
                $key = "{$v->numero_pergunta}_{$kk}";
                $dataSexo['series'][$key]['name'] = "{$vv}";
                $dataSexo['series'][$key]['group'] = $vv;
            }
            foreach ($v->porcentagem as $kk => $vv) {
                $key = "{$v->numero_pergunta}_{$kk}";
                $dataSexo['series'][$key]['data'][] = $vv;
            }
        }
        $dataSexo['series'] = array_values($dataSexo['series']);

        $dataSexo['label'] = array_map(function ($v) {
            return explode(' ', $v);
        }, $dataSexo['label']);
        return $dataSexo;
    }
}
