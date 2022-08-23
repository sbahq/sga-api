<?php

namespace App\Domains\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends BaseAuth
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'name.required' => 'O :attribute deve ser informado.',
        'name.unique' => 'O :attribute já foi cadastrado.',
        'name.max'  => 'O :attribute deve conter no maximo 255 caracteres.',
        'email.required' =>'O :attribute deve ser informado.',
        'email.email' => 'O :attribute deve ser valido.',
        'password.required' => 'O :attribute deve ser informado.',
        'person_id.required' => 'O tipo de pessoa deve ser informado.',
        'password.required' => 'O :attribute deve ser informado.',
        'password.min' => 'O :attribute deve ter 6 ou mais caracters.',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'person_id',
        'guid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules($data){
        $this->rules = [
            'name' => "required|max:255|unique:users".(isset($data['id']) ? ',name,'.$data['id'] : ''),
            'email' => "email|required|max:255|unique:users".(isset($data['id']) ? ',email,'.$data['id'] : ''),
            'person_id' =>"required",
            'password' => "required|string|min:6",          
        ];
    }
}
