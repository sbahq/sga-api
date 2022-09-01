<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicoEspecializacao extends Model
{

    public function getMedicosEspecializacaoCET($matriculaCET){

        $sql = "select * from vw_me_cet vmc where vmc.matricula_cet = {$matriculaCET} order by vmc.nome";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

}