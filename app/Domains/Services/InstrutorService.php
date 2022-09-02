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

    public function getInstrutoresCet($matriculaCET){
        return $this->repository->getInstrutoresCet($matriculaCET);
    }

    public function getTotalInstrutoresCETById($cetID){
        return $this->repository->getTotalInstrutoresCETById($cetID);
    }

}