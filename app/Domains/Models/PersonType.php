<?php

namespace App\Domains\Models;

class PersonType extends Base
{

    protected $table = 'persons_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.unique' => 'O :attribute já foi cadastrado.',
        'name.max'  => 'O :attribute deve conter no maximo 50 caracteres.',
    ];

    protected $fillable = [
        'name','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:50|unique:persons_types".(isset($data['id']) ? ',name,'.$data['id'] : '')
        ];
    }

}
