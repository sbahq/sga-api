<?php

namespace App\Domains\Models;

class Person extends Base
{

    protected $table = 'persons';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.max'  => 'O :attribute deve conter no maximo 255 caracteres.',
        'person_type_id.required' => "O tipo de pessoa deve ser informado."
    ];

    protected $fillable = [
        'name', 'person_type_id', 'country_id', 'guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:255",
            'person_type_id' => "required"
        ];
    }

}
