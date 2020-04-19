<?php
session_start();

define("BP",__DIR__ . DIRECTORY_SEPARATOR );

error_reporting(E_ALL);
ini_set("display_errors",1);


set_include_path(implode(PATH_SEPARATOR,
    [
        BP . "model",
        BP . "controller"
    ])
);

spl_autoload_register(function($class)
{
    $paths = explode(PATH_SEPARATOR, get_include_path());
    foreach($paths as $p)
    {
        //echo $p . DIRECTORY_SEPARATOR . $klasa .'<br />';
        if(file_exists($p . DIRECTORY_SEPARATOR . $class. ".php"))
        {
            include $p . DIRECTORY_SEPARATOR . $class. ".php";
            break;
        }
    }
    
});
App::start();