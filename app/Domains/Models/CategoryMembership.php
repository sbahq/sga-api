<?php

namespace App\Domains\Models;

class CategoryMembership extends Base
{

    protected $table = 'categories_membership';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.unique' => 'O :attribute já foi cadastrado.',
        'name.max'  => 'O :attribute deve conter no maximo 255 caracteres.'
    ];

    protected $fillable = [
        'name', 'key','guid'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:100|unique:categories_membership".(isset($data['id']) ? ',name,'.$data['id'] : '')
        ];
    }

}