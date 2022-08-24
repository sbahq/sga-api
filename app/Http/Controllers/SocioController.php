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

}
