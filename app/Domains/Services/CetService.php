<?php

namespace App\Domains\Services;

use App\Domains\Repositories\CetRepository;

class CetService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CetRepository();
    }

    public function getCets(){
        return $this->repository->getCets();
    }

    public function getCet($id){
        return $this->repository->getCet($id);
    }

    public function getVagasCet($cetid = null){
        return $this->repository->getVagasCet($cetid);
    }

}
