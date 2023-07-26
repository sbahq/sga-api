<?php

namespace App\Http\Controllers;

use App\Domains\Services\SocioService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocioController extends Controller
{
    public function __construct()
    {
        $this->service = new SocioService();
    }

    public function getSociosEmDia($cpf){
        return response()->json($this->service->getSociosEmDia('cpf', $cpf), 200);
    }

    public function getAllSociosEmDia(){
        return response()->json($this->service->getAllSociosEmDia(), 200);
    }

    public function getAnuidadeSocio($cpf){
        return response()->json($this->service->getAnuidadeSocio( $cpf ), 200);
    }

    public function getAssociadoCPF($cpf){
        return response()->json($this->service->getAssociadoCPF( $cpf ), 200);
    }

    public function getAssociadoEmail($email){
        return response()->json($this->service->getAssociadoEmail( $email ), 200);
    }

    public function getPessoaCPF($cpf){
        return response()->json($this->service->getPessoaCPF( $cpf ), 200);
    }

    public function getPessoaSecret3CPF($cpf){
        return response()->json($this->service->getPessoaSecret3CPF( $cpf ), 200);
    }

}
