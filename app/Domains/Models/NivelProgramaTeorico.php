<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NivelProgramaTeorico extends Model
{

    public function getNiveisProgramasTeoricos(){
        $niveisProgramasTeoricos = DB::connection('mysql_sbahq')->select("select * from vw_nivel_programa_teorico");
        return $niveisProgramasTeoricos;
    }

}