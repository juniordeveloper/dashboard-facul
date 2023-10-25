<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\AcessibilidadeTotaisServiceInterface;
use Illuminate\Support\Facades\Cache;

class AcessibilidadeTotaisService implements AcessibilidadeTotaisServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        return true;
    }
}
