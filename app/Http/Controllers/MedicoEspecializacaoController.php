<?php

namespace App\Http\Controllers;

use App\Domains\Responses\MedicoEspecializacaoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicoEspecializacaoController extends Controller
{
    public function __construct()
    {
        $this->response = new MedicoEspecializacaoResponse();
    }

    public function getMedicosEspecializacaoCET($matriculaCET){
        return $this->response->getMedicosEspecializacaoCET($matriculaCET);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET){
        return $this->response->getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET);
    }

    public function getMedicosEspecializacao(){
        return $this->response->getMedicosEspecializacao();
    }

    public function getMedicoEspecializacao(Request $request){
        $requestAll = $request->all();
        return $this->response->getMedicoEspecializacao($requestAll['matricula']);
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->response->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome(Request $request){
        $requestAll = $request->all();
        return $this->response->getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($requestAll['matricula'], $requestAll['nome']);
    }

}