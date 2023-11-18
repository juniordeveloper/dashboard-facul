<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Services\Graficos\IdadeService;
use App\Services\Graficos\FetepsService;
use App\Services\Graficos\SexoCursosService;
use App\Services\Graficos\InfraestruturaService;
use App\Services\Graficos\QualidadeFatecService;
use App\Services\Graficos\TotaisRespostasService;
use App\Services\Graficos\CorpoDocenteFatecService;
use App\Services\Graficos\DidaticaDocenteFatecService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        SexoCursosService $sexoCursosService,
        FetepsService $fetepsService,
        IdadeService $idadeService,
        QualidadeFatecService $qualidadeFatecService,
        TotaisRespostasService $totaisRespostasService,
        CorpoDocenteFatecService $corpoDocenteFatecService,
        DidaticaDocenteFatecService $didaticaDocenteFatecService,
        InfraestruturaService $infraestruturaService
    ) {

        $jsonContent = File::get(storage_path('json') . '/teste.json');
        $jsonContent = collect(json_decode($jsonContent));
        $conhecimentoRede = [
            'label' => [],
            'series' => [],
        ];
        foreach($jsonContent as $v) {
            if (!in_array($v->label, $conhecimentoRede['label'])) {
                $conhecimentoRede['label'][] = $v->label;
                $conhecimentoRede['series']['data'][$v->label] = 0;
            }
            $conhecimentoRede['series']['data'][$v->label]++;
        }
        $conhecimentoRede['series'][0]['data'] = array_values($conhecimentoRede['series']['data']);
        $conhecimentoRede['series'][0]['name'] = 'Informação vestibular';
        unset($conhecimentoRede['series']['data']);

        $this->setDataCacheJson();

        $dadoAlunoGeral = $this->getCache('dados_aluno');
        $dadoAluno = $dadoAlunoGeral->filter(function ($i) {
            return stripos($i->curso, 'Dados');
        });
        $dadoDocente = $this->getCache('dados_docente');
        $dadoFuncionario = $this->getCache('dados_funcionario');

        $todos = $dadoAluno->merge($dadoDocente)->merge($dadoFuncionario)->sortBy('numero_pergunta', SORT_NUMERIC);
        $acessibilidade = $todos->filter(function ($i) {
            return stripos($i->pergunta, 'ACESSIBILIDADE') !== false;
        });
        $dataSexo = $sexoCursosService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataInfraestrutura = $infraestruturaService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataEspacoConveniencia = $infraestruturaService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario, 87);
        $dataFeteps = $fetepsService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataIdade = $idadeService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataQualidadeFatec = $qualidadeFatecService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataCorpoDocenteFatec = $corpoDocenteFatecService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataAcessibilidadeFatec = $corpoDocenteFatecService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario, 100);
        $dataDidaticaDocente = $didaticaDocenteFatecService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataTotaisRespostas = $totaisRespostasService->handler($dadoAlunoGeral, $dadoDocente, $dadoFuncionario);
        $dataConhecimentoRede = $conhecimentoRede;
        // dd($dataTotaisRespostas);

        return view(
            'dashboard',
            compact(
                'dadoAluno',
                'dadoDocente',
                'dadoFuncionario',
                'dataSexo',
                'dataInfraestrutura',
                'dataEspacoConveniencia',
                'dataFeteps',
                'dataIdade',
                'dataQualidadeFatec',
                'dataCorpoDocenteFatec',
                'dataDidaticaDocente',
                'dataTotaisRespostas',
                'dataConhecimentoRede',
                'dataAcessibilidadeFatec'
            )
        );
    }

    /**
     * @return mixed
     */
    public function setDataCacheJson()
    {
        $pathJsons = storage_path('json');
        $filesInFolder = File::allFiles($pathJsons);
        foreach ($filesInFolder as $file) {
            $json = $file->getPathname();
            $basename = $file->getBasename('.json');

            if($basename == 'teste') {
                continue;
            }

            if (Cache::has("dados_{$basename}")) {
                continue;
            }

            $jsonContent = File::get($json);
            $jsonContent = collect(json_decode($jsonContent));
            $jsonContent = $jsonContent->map(function ($i) use ($basename) {
                $i->tipo_dado = $basename;

                if (is_string($i->resposta)) {
                    $i->resposta = explode(',', $i->resposta);
                }

                $i->resposta = array_map(function ($ii) {
                    $ii = trim($ii);
                    $ii = str_replace(['A-', 'A -', 'B-', 'B -', 'C-', 'C -', 'D-', 'D -', 'E-', 'E -', 'F-', 'F -'], '', $ii);
                    $ii = trim($ii);
                    return $ii;
                }, $i->resposta);

                $numero = str_pad($i->numero_pergunta, 2, '0', STR_PAD_LEFT);
                $i->pergunta = str_replace(
                    ["{$numero} - ", "{$numero}-", "{$numero}- ", ':'],
                    '',
                    $i->pergunta
                );
                return $i;
            })
                ->sortBy('numero_pergunta', SORT_NUMERIC);
            Cache::put("dados_{$basename}", $jsonContent, now()->minute(1800));
        }
    }

    /**
     * @param $nameCache
     */
    private function getCache($nameCache)
    {
        return Cache::get($nameCache);
    }
}
