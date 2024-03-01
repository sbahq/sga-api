<?php

namespace App\Http\Controllers;

use App\Domains\Responses\LigaAcademicaResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LigaAcademicaController extends Controller
{
    public function __construct()
    {
        $this->response = new LigaAcademicaResponse();
    }

    public function getLigasAcademicas($idInstituicaoEnsino){
        return response()->json($this->response->getLigasAcademicas($idInstituicaoEnsino), 200);
    }

    public function getLigaAcademica($idLigaAcademica){
        return response()->json($this->response->getLigaAcademica($idLigaAcademica), 200);
    }

}
