<?php

namespace App\Domains\Models;

class Membership extends Base
{

    protected $table = 'memberships';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'registration_code.required' => 'O :attribute deve ser informado.',
        'registration_code.unique' => 'O :attribute já foi cadastrado.',
    ];

    protected $fillable = [
        'registration_code' , 'registration_date' , 'sga_id' , 'date_in' , 'date_out' , 'individual_person_id' , 'guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'registration_code' => "required|unique:memberships".(isset($data['id']) ? ',registration_code,'.$data['id'] : ''),
        ];
    }

}