<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ponto extends Model
{

    public function getPontos(){
        $pontos = DB::connection('mysql_sbahq')->select("select * from pontos order by numero");
        return $pontos;
    }

}