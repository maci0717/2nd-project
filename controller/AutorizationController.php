<?php

class AutorizationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user']))
        {
            $this->view->render('login',[
                'message'=>'You need to be loged in!',
                'email'=>''
            ]);
            exit;      
    }
 
}