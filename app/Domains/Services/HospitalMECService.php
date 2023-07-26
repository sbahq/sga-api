<?php

namespace App\Domains\Services;

use App\Domains\Repositories\HospitalMECRepository;

class HospitalMECService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new HospitalMECRepository();
    }

    public function getHospitais(){
        return $this->repository->getHospitais();
    }

    public function getHospital($id){
        return $this->repository->getHospital($id);
    }

}
