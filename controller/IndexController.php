<?php

class IndexController extends Controller
{ 
    public function index()
    {
        $this->view->render('home');
    }
    
    public function registrationPage()
    {
        $this->view->render('registration');
    }

    public function registration()
    {
        Users::newRegistration();
        $this->view->render('home', [
            'message' => 'Registration completed successfully!'
        ]);
    }

    public function logInPage()
    {
        $this->view->render('login', [
            'message' => 'Enter the access information',
            'email' => ''
        ]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->index();
    }

    public function autorization()
    {
        if(!isset($_POST['email']) || !isset($_POST['password']))
        {
            $this->view->render('login', [
                'message' => 'You didn\'t fill in the blanks!',
                'email' => ''
            ]);
            return;
        }

        if(trim($_POST['email'])==='' || trim($_POST['password'])==='')
        {
            $this->view->render('login',[
                'message'=>'Data required!',
                'email' => $_POST['email']
            ]);
            return;
        }
 
        $result = Users::checkExistence();

       

        if($result==null)
        {
            $this->view->render('login', [
                'message' => 'User don\'t exist!',
                'email' => $_POST['email']
            ]);
            return;
        }

        if(!password_verify($_POST['password'], $result->password))
        {
            $this->view->render('login',[
                'message' => 'Email and password combination failed!',
                'email' => $_POST['email']
            ]);
            return;
        }

        unset($result->password);
        $_SESSION['user']=$result;

        $this->view->render('home', [
            'message' => 'Welcome, ',
            'username' => $_SESSION['user']->username
        ]);

    }
  
}