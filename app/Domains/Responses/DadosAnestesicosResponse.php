<?php

namespace App\Domains\Responses;

use App\Domains\Services\DadosAnestesicosService;


class DadosAnestesicosResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new DadosAnestesicosService();
    }

    public function getDadosLogbook($matricula){
        return $this->service->getDadosLogbook($matricula);
    }

}