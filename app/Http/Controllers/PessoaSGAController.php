<?php

namespace App\Http\Controllers;

use App\Domains\Responses\PessoaSGAResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PessoaSGAController extends Controller
{
    public function __construct()
    {
        $this->response = new PessoaSGAResponse();
    }

    public function getPessoaByMatricula($matricula){
        return response()->json($this->response->getPessoaByMatricula($matricula), 200);
    }

    public function getMembrosComissaoCET(){
        return response()->json($this->response->getMembrosComissaoCET(), 200);
    }
    
    public function getSecretarioGeral(){
        return response()->json($this->response->getSecretarioGeral(), 200);
    }

    public function getSenhaUsuario($idPessoa){
        return response()->json($this->response->getSenhaUsuario($idPessoa), 200);
    }

    public function getPresidenteComissaoCET(){
        return response()->json($this->response->getPresidenteComissaoCET(), 200);
    }

    public function getResponsaveisCertificadoSaida(){
        return response()->json($this->response->getResponsaveisCertificadoSaida(), 200);
    }

    public function getResponsaveisCertificadoSaidaAno($ano){
        return response()->json($this->response->getResponsaveisCertificadoSaidaAno($ano), 200);
    }

}