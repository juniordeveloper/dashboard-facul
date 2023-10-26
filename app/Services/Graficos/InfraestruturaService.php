<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\InfraestruturaServiceInterface;

class InfraestruturaService implements InfraestruturaServiceInterface
{
    public function __construct()
    {}

    /**
     * @param $dadoAlunoGeral
     * @param $dadoDocente
     * @param $dadoFuncionario
     * @return mixed
     */
    public function handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario)
    {
        // dd($dadoDocente->toArray(), $dadoFuncionario->toArray());
        $perguntaSexo = $dadoAlunoGeral->filter(function ($i) {
            return $i->indicador == 'Eixo: 5';
        });
        // dd($perguntaSexo->toArray());
        $dataSexo = [];
        foreach ($perguntaSexo as $v) {
            if (!in_array($v->pergunta, ['Secretaria acadêmica', 'Espaços de convivência', 'Limpeza/Conservação', 'Iluminação/ Ventilação', 'Mobiliário e Equipamentos'])) {
                continue;
            }
            $titulo = "{$v->pergunta}";
            $slug = \Str::slug($titulo);
            $dataSexo['labels'][$slug] = $titulo;
            $dataSexo['dados'][$slug]['name'] = $titulo;
            foreach ($v->resposta as $kk => $vv) {
                $dataSexo['dados'][$slug]['series'][$kk]['name'] = $vv;
            }
            foreach ($v->totais as $kk => $vv) {
                if (!isset($dataSexo['dados'][$slug]['series'][$kk]['data'])) {
                    $dataSexo['dados'][$slug]['series'][$kk]['data'] = 0;
                }
                $dataSexo['dados'][$slug]['series'][$kk]['data'] += $vv;
            }
            // $dataSexo[$slug][$slug]
        }
        dd($dataSexo);
        $dataSexo['labels'] = array_values($dataSexo['labels']);
        $dataSexo['dados'] = array_values($dataSexo['dados']);
        dd($dataSexo);
        // $dataSexo['label'] = array_map(function ($v) {
        //     return explode(' ', $v);
        // }, $dataSexo['label']);
        return $dataSexo;
    }
}
