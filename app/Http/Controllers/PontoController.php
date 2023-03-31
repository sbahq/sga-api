<?php

namespace App\Http\Controllers;

use App\Domains\Responses\PontoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PontoController extends Controller
{
    public function __construct()
    {
        $this->response = new PontoResponse();
    }

    public function getPontos(){
        return response()->json($this->response->getPontos(), 200);
    }

    public function getPontosMatricula($matricula){
        return response()->json($this->response->getPontosMatricula($matricula), 200);
    }

}