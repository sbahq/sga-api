<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstituicoesEnsino extends Model
{

    private $sqlInstituicoesEnsino = "
    select * from vw_instituicoes_ensino
    ";

    public function getInstituicoesEnsino(){
        $sql = $this->sqlInstituicoesEnsino;
        $instituicoesEnsino = DB::connection('mysql_sbahq')->select($sql);
        return $instituicoesEnsino;
    }

    public function getInstituicaoEnsino($id){
        $sql = $this->sqlInstituicoesEnsino;
        $sql.= ' where id = ' . $id;
        $instituicoesEnsino = DB::connection('mysql_sbahq')->select($sql);
        return $instituicoesEnsino;
    }

}