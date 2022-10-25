<?php

namespace App\Domains\Services;

use App\Domains\Repositories\DadosAnestesicosRepository;


class DadosAnestesicosService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DadosAnestesicosRepository();
    }

    public function getDadosLogbook($matricula){
        return $this->repository->getDadosLogbook($matricula);
    }

}