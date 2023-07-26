<?php

namespace App\Domains\Responses;

use App\Domains\Services\HospitalMECService;

class HospitalMECResponse
{

    private $service;

    public function __construct()
    {
        $this->service = new HospitalMECService();
    }

    public function getHospitais(){
        return $this->service->getHospitais();
    }

    public function getHospital($id){
        return $this->service->getHospital($id);
    }

}