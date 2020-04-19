<?php

class App
{
    public static function start()
    {
        //error_reporting(E_ERROR | E_PARSE);
        $route = Request::getRoute();
        // echo $route;   

        $parts = explode('/',$route); 
        // print_r($parts);

        $class='';
        if(!isset($parts[1]) || $parts[1]===''){
            $class='Index';
        }else{
            $class=ucfirst($parts[1]);
        }

        // $class= $class . 'Controller'; - duži način
        $class.='Controller';

        // echo $class;

        $funkction='';
        if(!isset($parts[2]) || $parts[2]===''){
                $funkction='index';
            }else{
                $funkction=$parts[2];
        }



        if(class_exists($class) && method_exists($class,$funkction)){
           

            $instance = new $class();
            $instance->$funkction();
        }else{
            header('HTTP/1.0 404 Not Found');
        }

    }

    public static function config($key)
    {
        $configuration = include BP . 'configuration.php';
    
        return $configuration[$key];
    }
}