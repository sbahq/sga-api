<?php

namespace App\Domains\Models;

class PersonDocumentType extends Base
{

    protected $table = 'person_documents_type';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $rules = [];

    protected $messages = [
        'document.required' => 'O :attribute deve ser informado.',
        'document.max'  => 'O :attribute deve conter no maximo 150 caracteres.'
    ];

    protected $fillable = [
        'document', 'document_region' ,'person_id', 'document_type_id','guid'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function rules($data){
        $this->rules = [
            'document' => "required|max:150"
        ];
    }
}
