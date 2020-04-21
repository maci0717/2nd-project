<?php

class Management
{
    public static function readAll()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        select a.id, a.status, b.username, b.email, b.adress 
        from images a 
        right join users b on a.user=b.id        
        ');
        $exp->execute();
        return $exp->fetchAll();       
    }

    public static function insertPost()
    {
        $con = DB::getInstance();
        $exp = $con->prepare('
        insert into images 
        (user,status) values 
        (:user,:status)    
        ');
        $exp->execute($_POST);
        $imageID = $con->lastInsertId();

        if(isset($_FILES['image'])){
            $route = BP . 'public' . DIRECTORY_SEPARATOR
            . 'images' . DIRECTORY_SEPARATOR 
            . $imageID . '.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], $route);
        }
    }

}