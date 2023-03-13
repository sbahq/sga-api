<?php

namespace App\Http\Controllers;

use App\Domains\Responses\PontoInstrutorResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PontoInstrutorController extends Controller
{
    public function __construct()
    {
        $this->response = new PontoInstrutorResponse();
    }

    public function getPontosInstrutor($matricula){
        return $this->response->getPontosInstrutor($matricula);
    }

    public function savePontosInstrutor(Request $request){
        $data = $request->all();
        return $data;
    }

}