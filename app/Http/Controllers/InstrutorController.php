<?php

namespace App\Http\Controllers;

use App\Domains\Services\InstrutorService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstrutorController extends Controller
{
    public function __construct()
    {
        $this->service = new InstrutorService();
    }

    public function getInstrutores(){
        return $this->service->getInstrutores();
    }
}
