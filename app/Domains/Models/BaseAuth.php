<?php

namespace App\Domains\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BaseAuth extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

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
        $notShowColummns = array('password','remember_token');
        foreach (DB::select($query) as $column) {
            if( !in_array($column->$column_name, $notShowColummns) )
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
