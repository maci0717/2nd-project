<?php

class IndexController extends Controller
{ 
    public function index()
    {
        $this->view->render('home',[
            'list'=>[],
            ]
        );
    }
    
    public function registrationPage()
    {
        $this->view->render('registration');
    }

    public function registration()
    {
        Users::newRegistration();
        $this->view->render('home');
    }
  
}