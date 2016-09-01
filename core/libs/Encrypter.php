<?php

/**
 * Created by PhpStorm.
 * User: Apolo
 * Date: 31/08/2016
 * Time: 10:22 AM
 */
class Encrypter
{
    static function encrypt($value){
        $evalue = md5($value);
        $evalue = password_hash($evalue,PASSWORD_DEFAULT);
        return $evalue;
    }
    static function verifyPw($originPass,$encryterPass){
        $originPass = md5($originPass);
        $verify = password_verify($originPass,$encryterPass);
        return $verify;
    }
}