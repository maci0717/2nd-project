<?php

class Users
{

    public static function newRegistration()
    {
        $con = DB::getInstance();
        $exp=$con->prepare('insert into users 
        (email, username, password, sessionId) values 
        (:email, :username, :password, :sessionId)');
       
        unset($_POST['PwRepeat']);
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $_POST['sessionId'] = session_id();

        $exp->execute($_POST);
    }

    public static function checkExistence()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('select * from users where email=:email');
        $exp->execute(['email' => $_POST['email']]);
        return $exp->fetch();       
    }

}