<?php

class Users
{

    public static function newRegistration()
    {
        $veza = DB::getInstance();
        $izraz=$veza->prepare('insert into users 
        (email, username, password, sessionId) values 
        (:email, :username, :password, :sessionId)');
       
        unset($_POST['PwRepeat']);
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $_POST['sessionId'] = session_id();

        $izraz->execute($_POST);
    }
}