<?php

namespace App\Domains\Services;

use App\Domains\Repositories\InstrutorRepository;


class InstrutorService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new InstrutorRepository();
    }

    public function getInstrutores(){
        return $this->repository->getInstrutores();
    }

}