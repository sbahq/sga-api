<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PontoInstrutor extends Model
{

    public function getPontosInstrutor($matricula){
        $pontosInstrutor = DB::connection('mysql_sbahq')->select("select * from pontos_instrutor where {$matricula}");
        return $pontosInstrutor;
    }

}