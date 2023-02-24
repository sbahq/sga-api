<?php

namespace App\Http\Controllers;

use App\Domains\Responses\NivelProgramaTeoricoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NivelProgramaTeoricoController extends Controller
{
    public function __construct()
    {
        $this->response = new NivelProgramaTeoricoResponse();
    }

    public function getNiveisProgramasTeoricos(){
        return response()->json($this->response->getNiveisProgramasTeoricos() , 200);
    }

}