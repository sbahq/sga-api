<?php

namespace App\Http\Controllers;

use App\Domains\Responses\HospitalMECResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HospitalMECController extends Controller
{
    public function __construct()
    {
        $this->response = new HospitalMECResponse();
    }

    public function getHospitais(){
        return response()->json($this->response->getHospitais(), 200);
    }

    public function getHospital($id){
        return response()->json($this->response->getHospital($id), 200);
    }

}
