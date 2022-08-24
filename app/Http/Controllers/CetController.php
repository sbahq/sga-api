<?php

namespace App\Http\Controllers;

use App\Domains\Services\CetService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CetController extends Controller
{
    public function __construct()
    {
        $this->service = new CetService();
    }

    public function getCets(){
        return response()->json($this->service->getCets(), 200);
    }

    public function getCet($id){
        return response()->json($this->service->getCet($id), 200);
    }

}
