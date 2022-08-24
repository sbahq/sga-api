<?php

namespace App\Domains\Services;

use App\Domains\Repositories\RegionalRepository;

class RegionalService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new RegionalRepository();
    }

    public function getRegionais(){
        return $this->repository->getRegionais();
    }

    public function getRegional($id){
        return $this->repository->getRegional($id);
    }

}
