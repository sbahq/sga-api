<?php

namespace App\Domains\Responses;

use App\Domains\Services\InstrutorService;


class InstrutorResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new InstrutorService();
    }

    public function getInstrutoresCet($matriculaCET){
        return $this->service->getInstrutoresCet($matriculaCET);
    }

}