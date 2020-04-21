<?php

class Myaccount
{
    public static function readData()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        select id, username, email, password, adress 
        from users where id=:id       
        ');
        $exp->execute([
            'id' => $_SESSION['user']->id
        ]);
        return $exp->fetchAll();       
    }

    public static function change()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        update users set username=:username, email=:email, password=:password, adress=:adress where id=:id
        ');
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $exp->execute($_POST);      
    }

    public static function basicChange()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        update users set username=:username, email=:email, adress=:adress where id=:id
        ');
        $exp->execute([
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'adress' => $_POST['adress']
        ]);      
    }

}