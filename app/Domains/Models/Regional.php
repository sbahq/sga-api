<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Regional extends Model
{

    private $sqlRegionais = "
    select * from vw_regionais
    ";

    public function getRegionais(){
        $sql = $this->sqlRegionais;
        $regionais = DB::connection('mysql_sbahq')->select($sql);
        return $regionais;
    }

    public function getRegional($id){
        $sql = $this->sqlRegionais;
        $sql.= ' where id = ' . $id;
        $regionais = DB::connection('mysql_sbahq')->select($sql);
        return $regionais;
    }

}