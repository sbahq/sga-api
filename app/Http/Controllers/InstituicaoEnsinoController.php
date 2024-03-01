<?php

namespace App\Http\Controllers;

use App\Domains\Responses\InstituicaoEnsinoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstituicaoEnsinoController extends Controller
{
    public function __construct()
    {
        $this->response = new InstituicaoEnsinoResponse();
    }

    public function getInstituicoesEnsino(){
        return response()->json($this->response->getInstituicoesEnsino(), 200);
    }

    public function getInstituicaoEnsino($id){
        return response()->json($this->response->getInstituicaoEnsino($id), 200);
    }

}
