<?php

namespace App\Domains\Models;

class City extends Base
{

    protected $table = 'cities';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];


    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
    ];

    protected $fillable = [
        'name', 'state_id','guid',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:100"
        ];
    }

}