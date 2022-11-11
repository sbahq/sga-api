<?php

namespace App\Http\Controllers;

use App\Domains\Responses\AvaliacaoMedicoEspecializacaoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AvaliacaoMedicoEspecializacaoController extends Controller
{

    public function __construct()
    {
        $this->response = new AvaliacaoMedicoEspecializacaoResponse();
    }

    public function getAvaliacoes(Request $request){
        $data = $request->all();
        return $this->response->getAvaliacoes($data['matricula']);
    }

}