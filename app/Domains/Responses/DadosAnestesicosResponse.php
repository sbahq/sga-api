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

    public function getPeriodoME($matricula){
        return $this->service->getPeriodoME($matricula);
    }

}