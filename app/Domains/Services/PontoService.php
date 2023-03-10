<?php

namespace App\Domains\Services;

use App\Domains\Repositories\PontoRepository;

class PontoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PontoRepository();
    }

    public function getPontos(){
        return $this->repository->getPontos();
    }

}