<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Base extends Model {

    protected $fillable;
    protected $rules = [];
    protected $messages = [];
    public $timestamps = TRUE;

    public function getFillable(){
        return $this->fillable;
    }

    public function getAllColumnsNames() {

        $query = 'show columns from ' . $this->table;

        $column_name = 'Field';
        $reverse = false;

        $columns = array();

        foreach (DB::select($query) as $column) {
            $columns[] = $column->$column_name;
        }

        if ($reverse) {
            $columns = array_reverse($columns);
        }

        return $columns;
    }

    public function setValues($data) {
        $fields = $this->getAllColumnsNames();
        foreach ($fields as $item) {
            if (strtoupper($item) != $this->primaryKey) {
                if (isset($data[$item])) {
                    if (!is_array($data[$item]))
                        if (strlen(trim($data[$item])) > 0)
                            eval('$this->' . $item . ' = ' . "'" . addslashes(trim($data[$item])) . "'" . ';');
                }
            }
        }
    }

    public function validation($data){
        return Validator::make($data, $this->rules, $this->messages);
    }

}
