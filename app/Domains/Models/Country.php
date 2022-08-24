<?php

namespace App\Domains\Models;

class Country extends Base
{

    protected $table = 'countries';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.unique' => 'O :attribute já foi cadastrado.',
        'name.max'  => 'O :attribute deve conter no maximo 100 caracteres.',
        'nationality.required' => 'O :attribute deve ser informado.',
        'nationality.unique' => 'O :attribute já foi cadastrado.',
        'nationality.max'  => 'O :attribute deve conter no maximo 100 caracteres.',
        'code.required' => 'O :attribute deve ser informado.',
        'code.unique' => 'O :attribute já foi cadastrado.',
        'code.max'  => 'O :attribute deve conter no maximo 2 caracteres.',
        'description.max'  => 'O :attribute deve conter no maximo 255 caracteres.',
    ];

    protected $fillable = [
        'name','nationality','code','description','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name'              => "required|max:100|unique:countries".(isset($data['id']) ? ',name,'.$data['id'] : ''),
            'nationality'       => "required|max:100|unique:countries".(isset($data['id']) ? ',nationality,'.$data['id'] : ''),
            'code'              => "required|max:2|unique:countries".(isset($data['id']) ? ',code,'.$data['id'] : ''),
            'description'       => "max:255"
        ];
    }

}