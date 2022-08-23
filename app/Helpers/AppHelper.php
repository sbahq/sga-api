<?php

namespace App\Helpers;

use Exception;

class AppHelper
{

    public static function instance()
    {
        return new AppHelper();
    }

    public function generateGUID()
    {
        mt_srand((float)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = substr(date('YmdHis'), 0, 14) . $hyphen
            . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;
    }

    public function generateToken()
    {
        mt_srand((float)microtime() * 10000);
        $charid = md5(uniqid(rand(), true));
        $hyphen = chr(45); // "-"
        $uuid = substr($charid, 0, 8)
            . substr($charid, 8, 4)
            . substr($charid, 12, 4)
            . substr($charid, 16, 4)
            . substr($charid, 20, 12);
        $return = '';
        for ($i = 0; $i <= strlen($uuid); $i++) {
            $char = substr($uuid, $i, 1);
            if (!is_numeric($char)) {
                $value = rand(0, 1);
                if ($value == 1) $return .=  strtoupper($char);
                else $return .=   strtolower($char);
            } else $return .=  $char;
        }
        return $return;
    }

    public function checkMail($mail)
    {
        //return preg_match('/^[a-z0-9][a-z0-9_.-]+@[a-z0-9-_]+(.[a-z]+)?(.[a-z]+)+$/', $mail);
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }

    public function convertStrToTime($strDate)
    {
        if (!empty($strDate))
            return date("Y-m-d H:i:s", strtotime($strDate));
        return null;
    }

    public function cpfClean($cpf)
    {
        return preg_replace('/[^0-9]/', '', $cpf);;
    }

    public function leftOnlyNumber($string)
    {
        return preg_replace('/[^0-9]/', '', $string);;
    }

    public function checkRepeatSequence($string, $total)
    {
        if (preg_match('/(\d)\1{' . $total . '}/', $this->leftOnlyNumber($string))) return true;
        else return false;
    }

    public function cpfIsValid($paramCpf)
    {
        $cpf = $this->leftOnlyNumber($paramCpf);
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function cnpjIsValid($cnpj)
    {
        $cnpj = $this->leftOnlyNumber($cnpj);
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    public function isEmpetyOrNull($value)
    {
        if (trim($value) == '' || $value == null) return '';
        else return $value;
    }

    public function diffDate($startDate, $endDate, $time)
    {
        $datetime1 = new \DateTime($startDate);
        $datetime2 = new \DateTime($endDate);
        $interval = $datetime1->diff($datetime2);
        return $interval->format("%{$time}");
    }

    public function formatDate($pDate, $pFormatIn = 'Y-m-d H:i:s', $pFormatOut = 'Y-m-d')
    {
        if (trim($pDate) != '') {
            try {
                $date = \DateTime::createFromFormat($pFormatIn, $pDate);
                return $date->format($pFormatOut);
            } catch (Exception $e) {
                $message = ['message' => $e->getMessage()];
                $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
                return $response;
            }
        } else {
            return '';
        }
    }

    public function formatUtc2Date($data)
    {
        //date_default_timezone_set('America/Sao_Paulo');
        $time = strtotime($data);
        $dateInLocal = date("Y-m-d H:i:s", $time);
        return $dateInLocal;
    }

    public function convertAmountToDouble($paramAmount)
    {
        $amount = $this->leftOnlyNumber($paramAmount);
        $length = strlen($amount);
        $value = substr($amount, 0, ($length - 2));
        $final = substr($amount, ($length - 2));
        $amountReturn = (float)$value . '.' . $final;
        return number_format($amountReturn, 2, ".", "");
    }

    public function generateRandomString($length = 255)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()-+[]{}?.,;:';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateRandomCode($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    function setMask($mask,$str){
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;    
    }

}
