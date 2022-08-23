<?php

namespace App\Domains\Validations;


class Validation
{
    private $messages = [];
    private $erros = [];
    private $rules = [];
    private $data = [];

    public static function instance()
    {
        return new Validation();
    }    

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function getErros()
    {
        return $this->erros;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function extractErro($errorMessage)
    {
        
    }

    public function dataValidator($data, $object)
    {
        $this->setData($data);
        $this->setRules($object->getRules());
        $this->setMessages($object->getErrorMessages());
    }

    public function formatJsonMessage($erros)
    {
        $arrayReturn = [];
        if (is_array($erros) && count($erros) > 0) {
            $arrayReturn = $this ->getError();
            $arrayErros = [];
            foreach ($erros as $key => $erro) {
                array_push($arrayReturn['messages'], ['message' => ['field' => $key, 'text' => $erro]]);
            }
        }
        return $arrayReturn;
    }

    public function getSuccessMessage(): array
    {
        return ['status' => 'success', 'data-hora' => date('Y-m-d H:i:s'), 'messages' => []];
    }

    public function getErrorMessage($messages): array
    {
        return ['status' => 'error', 'data-hora' => date('Y-m-d H:i:s'), 'messages' => [$messages]];
    }

    public function getError(): array
    {
        return ['status' => 'error', 'data-hora' => date('Y-m-d H:i:s'), 'messages' => []];
    }

    public function setArrayErro($label, $message)
    {
        return [$label => $message];
    }

    public function checkId($data)
    {
        if (!isset($data['id'])) {
            throw new \Exception('O atributo id requerido');
        }
    }

    public function checkNullObject($object)
    {
        if (is_null($object)) {
            throw new \Exception(get_class($object).' null');
        }
    }
}
