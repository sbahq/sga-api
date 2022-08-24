<?php

namespace App\Domains\Models;

class IndividualPerson extends Base
{

    protected $table = 'individual_persons';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'birthday.required' => 'O :attribute deve ser informado.',
    ];

    protected $fillable = [
        'alias' ,'birthday', 'gender','person_id', 'guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'birthday' => "required",
        ];
    }

}