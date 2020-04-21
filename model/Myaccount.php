<?php

class Myaccount
{
    public static function readData()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        select id, username, email, password, adress 
        from users where sessionId=:sessionId       
        ');
        $exp->execute([
            'sessionId' => $_SESSION['user']->sessionId
        ]);
        return $exp->fetchAll();       
    }

    public static function change()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        update users set username=:username, email=:email, adress=:adress where id=:id
        ');
        $exp->execute($_POST);      
    }

}