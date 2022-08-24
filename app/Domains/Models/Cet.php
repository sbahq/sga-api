<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cet extends Model
{

    private $sqlCets = "
    select * from vw_cet
    ";

    public function getCets(){
        $sql = $this->sqlCets;
        $cets = DB::connection('mysql_sbahq')->select($sql);
        return $cets;
    }

    public function getCet($id){
        $sql = $this->sqlCets;
        $sql.= ' where id = ' . $id;
        $cets = DB::connection('mysql_sbahq')->select($sql);
        return $cets;
    }

}