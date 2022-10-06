<?php

namespace App\Domains\Responses;

use App\Domains\Services\MedicoEspecializacaoService;


class MedicoEspecializacaoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new MedicoEspecializacaoService();
    }

    public function getMedicosEspecializacaoCET($matriculaCET){
        return $this->service->getMedicosEspecializacaoCET($matriculaCET);
    }

    public function getMedicosEspecializacao(){
        return $this->service->getMedicosEspecializacao();
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->service->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration);
    }

}