<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instrutor extends Model
{

    public function getInstrutores(){

        $sql = "select * from vw_instrutores_vagas viv order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresCET($matriculaCET){

        $sql = "select * from vw_instrutores_vagas viv where viv.matricula_cet = {$matriculaCET} order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

}
