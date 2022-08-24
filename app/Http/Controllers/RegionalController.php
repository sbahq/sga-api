<?php

namespace App\Http\Controllers;

use App\Domains\Services\RegionalService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegionalController extends Controller
{
    public function __construct()
    {
        $this->service = new RegionalService();
    }

    public function getRegionais(){
        return response()->json($this->service->getRegionais(), 200);
    }

    public function getRegional($id){
        return response()->json($this->service->getRegional($id), 200);
    }

}
