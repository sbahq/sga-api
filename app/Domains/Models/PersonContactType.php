<?php

namespace App\Domains\Models;

class PersonContactType extends Base
{

    protected $table = 'person_contacts_type';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'contact.required' => 'O :attribute deve ser informado.',
        'contact.max'  => 'O :attribute deve conter no maximo 150 caracteres.'
    ];

    protected $fillable = [
        'contact', 'person_id', 'contact_type_id','guid'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'contact' => "required|max:150"
        ];
    }
}
