<?php

namespace App\Domains\Models;

class OAuthCorporationPerson extends Base
{

    protected $table = 'oauth_corporation_person';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];


    protected $messages = [
        'corporation_person_id.required' => 'O :attribute deve ser informado.',
        'corporation_person_id.unique' => 'O :attribute já foi cadastrado.',
        'api_token.required' => 'O :attribute deve ser informado.',
        'api_token.unique' => 'O :attribute já foi cadastrado.',
    ];

    protected $fillable = [
        'corporation_person_id', 'api_token', 'open_token', 'active','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'corporation_person_id' => "required",
            'api_token' => "required||unique:oauth_corporation_person".(isset($data['id']) ? ',api_token,'.$data['id'] : ''),
        ];
    }

}