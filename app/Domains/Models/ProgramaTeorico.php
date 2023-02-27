<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgramaTeorico extends Model
{

    public function getProgramasTeoricos(){
        $programasTeoricos = DB::connection('mysql_sbahq')->select("select * from vw_programa_teorico");
        return $programasTeoricos;
    }

}