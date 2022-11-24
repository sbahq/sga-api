<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Domains\Responses\DadosAnestesicosResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DadosAnestesicosController extends Controller
{
    public function __construct()
    {
        $this->response = new DadosAnestesicosResponse();
    }

    public function getPeriodoME($matricula){
        return $this->response->getPeriodoME($matricula);
    }

    public function getDadosIndicadorME(Request $request){
        $data = $request->all();
        return $this->response->getDadosIndicadorME($data['matricula'], $data['indicador-me']);
    }

}