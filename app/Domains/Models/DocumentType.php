<?php

namespace App\Domains\Models;

class DocumentType extends Base
{

    protected $table = 'documents_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.unique' => 'O :attribute já foi cadastrado.',
        'name.max'  => 'O :attribute deve conter no maximo 50 caracteres.',
        'description.max'  => 'O :attribute deve conter no maximo 255 caracteres.',
    ];

    protected $fillable = [
        'name','description','guid'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name'              => "required|max:100|unique:documents_types".(isset($data['id']) ? ',name,'.$data['id'] : ''),
            'abbreviated'       => "required|max:10|unique:documents_types".(isset($data['id']) ? ',abbreviated,'.$data['id'] : ''),
            'description'       => "max:255"            
        ];
    }

}
