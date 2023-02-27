<?php

namespace App\Http\Controllers;

use App\Domains\Responses\ProgramaTeoricoResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramaTeoricoController extends Controller
{
    public function __construct()
    {
        $this->response = new ProgramaTeoricoResponse();
    }

    public function getProgramasTeoricos(){
        return response()->json($this->response->getProgramasTeoricos() , 200);
    }

}