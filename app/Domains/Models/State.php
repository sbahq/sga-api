<?php

namespace App\Domains\Models;

class State extends Base
{

    protected $table = 'states';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];


    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'initials.required' => 'O :attribute deve ser informado.',
    ];

    protected $fillable = [
        'name', 'initials', 'country_id','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:100|unique:states".(isset($data['id']) ? ',name,'.$data['id'] : ''),
            'initials' => "required|max:100",
        ];
    }

}