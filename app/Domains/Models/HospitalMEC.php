<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HospitalMEC extends Model
{

    private $sqlHospitais = "select * from vw_hospitais_mec";

    public function getHospitais(){
        $sql = $this->sqlHospitais;
        $sql.=" where ativo = 'S'";
        $hospitais = DB::connection('mysql_sbahq')->select($sql);
        return $hospitais;
    }

    public function getHospital($id){
        $sql = $this->sqlHospitais;
        $sql.= ' where id = ' . $id;
        $hospitais = DB::connection('mysql_sbahq')->select($sql);
        return $hospitais;
    }

}