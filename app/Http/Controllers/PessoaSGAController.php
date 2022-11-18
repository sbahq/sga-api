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

}
