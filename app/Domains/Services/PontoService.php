<?php

namespace App\Domains\Services;

use App\Domains\Repositories\PontosRepository;


class PontoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PontosRepository();
    }

    public function getPontos(){
        return $this->repository->getPontos();
    }

}