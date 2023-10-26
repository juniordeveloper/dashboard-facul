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
        })
        ->filter(function ($v) {
            return in_array($v->pergunta, ['Secretaria acadêmica', 'Espaços de convivência', 'Limpeza/Conservação', 'Iluminação/ Ventilação', 'Mobiliário e Equipamentos']);
        })
        ->sortBy('pergunta');
        // dd($perguntaSexo->toArray());
        $dataSexo = [];
        foreach ($perguntaSexo as $v) {
            $titulo = "{$v->pergunta}";
            $slug = \Str::slug($titulo);
            $dataSexo['labels'][$slug] = $titulo;

            foreach ($v->resposta as $kk => $vv) {
                $dataSexo['series'][$kk]['name'] = $vv;
            }

            foreach ($v->totais as $kk => $vv) {
                if(!isset($dataSexo['series'][$kk]['data'][$slug])) {
                    $dataSexo['series'][$kk]['data'][$slug] = 0;
                }
                $dataSexo['series'][$kk]['data'][$slug] += $vv;
            }
        }
        $dataSexo['labels'] = array_values($dataSexo['labels']);
        $dataSexo['series'] = array_map(function($v){
            $v['data'] = array_values($v['data']);
            return $v;
        }, $dataSexo['series']);
        // dd($dataSexo);
        $dataSexo['labels'] = array_map(function ($v) {
            return explode(' ', $v);
        }, $dataSexo['labels']);
        return $dataSexo;
    }
}
