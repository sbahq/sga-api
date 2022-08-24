<?php

namespace App\Domains\Models;

class CorporationPerson extends Base
{

    protected $table = 'corporation_persons';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'fantasy_name.required' => 'O :attribute deve ser informado.',
    ];

    protected $fillable = [
        'fantasy_name','person_id','active','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'fantasy_name' => "required|max:150",
        ];
    }

}