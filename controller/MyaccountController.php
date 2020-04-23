<?php 

    class MyaccountController extends AutorizationController
    {
        
        private $viewDir = 'myaccount' . DIRECTORY_SEPARATOR;
    
        public function index()
        {
            $this->view->render($this->viewDir . 'index', [
                'data' => Myaccount::readData()
            ]);
        }

        public function changeData()
        {
            if($_POST['password']!=$_POST['repeat']){
                $message = 'Password don\'t match!';

                $this->view->render($this->viewDir . 'index', [
                    'data' => Myaccount::readData(),
                    'message' => $message
                    ]);
            }


            if( $_POST['username'] != $_SESSION['user']->username || 
                $_POST['email'] != $_SESSION['user']->email || 
                $_POST['adress'] != $_SESSION['user']->adress){

                Myaccount::basicChange();
                $message = 'You successfuly changed your data';
            }

            if($_POST['password']!='' && $_POST['password']===$_POST['repeat']){
                unset($_POST['repeat']);
                Myaccount::change();

                if(isset($message)){
                    $message .= ' and your password!';
                }else{
                    $message = 'Password changed!';
                }
            }
            
            $this->view->render($this->viewDir . 'index', [
                'data' => Myaccount::readData(),
                'message' => $message
            ]);
        }

        public function removeAccount()
        {
            Myaccount::deleteAccount();
            unset($_SESSION['user']);
            session_destroy();
            $this->view->render('home');
        }

        public function deleteFiles()
        {
            Myaccount::deleteFiles();
            $this->view->render('home');
        }


    }