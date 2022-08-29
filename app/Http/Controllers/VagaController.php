<?php

namespace App\Http\Controllers;

use App\Domains\Responses\VagaResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VagaController extends Controller
{
    public function __construct()
    {
        $this->response = new VagaResponse();
    }

    public function dadosVaga($matriculaCET){
        return  $this->response->dadosVaga($matriculaCET);
    }

}
