<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PessoaSGA extends Model
{

    public function getPessoaByMatricula($matricula){

        $pessoa = DB::connection('mysql_sbahq')->select("select * from vw_pessoas vp where vp.matricula = {$matricula}");
        return $pessoa;

    }

    public function getMembrosComissaoCET(){

        $membrosComissaoCET = DB::connection('mysql_sbahq')->select("select * from vw_membros_comissao_cet");
        return $membrosComissaoCET;

    }

}
