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
        update users set password=:password where id=:id
        ');
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $exp->execute([
            'id' => $_POST['id'],
            'password' => $_POST['password']
        ]);      
    }

    public static function basicChange()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        update users set username=:username, 
        email=:email, adress=:adress where id=:id
        ');
        $exp->execute([
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'adress' => $_POST['adress']
        ]);
        $_SESSION['user']->username = $_POST['username'];
        $_SESSION['user']->email = $_POST['email'];
        $_SESSION['user']->adress = $_POST['adress'];
    }

    public static function deleteAccount()
    {
        $con = DB::getInstance();
        $con->beginTransaction();
        
        $exp = $con->prepare('select id from images where user=:id');   
        $exp->execute([ 'id' => $_SESSION['user']->id ]); 
        $result = $exp->fetchAll();

        $exp = $con->prepare('delete from images where user=:id');   
        $exp->execute([ 'id' => $_SESSION['user']->id ]); 

        $exp = $con->prepare('delete from users where id=:id');   
        $exp->execute([ 'id' => $_SESSION['user']->id ]); 
        
        $con->commit();
        
        unset($_SESSION['user']);
        session_destroy();
        
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        $i=0;
        while($result[$i]){
            $path= BP . 'public' . DIRECTORY_SEPARATOR . 'images'. 
            DIRECTORY_SEPARATOR . $result[$i]->id .'.jpg'; 
            if(!file_exists($path)){
            $path= BP . 'public' . DIRECTORY_SEPARATOR . 'images'. 
            DIRECTORY_SEPARATOR . $result[$i]->id .'.png';
            }
            unlink($path);
            $i++;
        }
    }
}