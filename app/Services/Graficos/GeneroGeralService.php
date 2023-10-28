<?php

namespace App\Services\Graficos;

use App\Services\Graficos\Contracts\GeneroGeralServiceInterface;
use Illuminate\Support\Facades\Cache;

class GeneroGeralService implements GeneroGeralServiceInterface
{
    public function __construct()
    {}

    public function handler()
    {
        return true;
    }
}
