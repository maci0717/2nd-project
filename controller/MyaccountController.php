<?php 

    class MyaccountController extends AutorizationController
    {
        
        private $viewDir = 'myaccount' . 
        DIRECTORY_SEPARATOR;
    
        public function index()
        {
            $this->view->render($this->viewDir . 'index', [
                'data' => Myaccount::readData()
            ]);
        }

        public function changeData()
        {
            $message = 'Nothing happened !';

            

            if($_POST['password']!=$_POST['repeat']){
                $message = 'Password don\'t match!';
            }

            if($_POST['password']=='' && $_POST['repeat']==''){
                Myaccount::basicChange();
                $message = 'Basic data changed succesful!';
            }

            if($_POST['password']!='' && $_POST['password']===$_POST['repeat']){
                unset($_POST['repeat']);
                Myaccount::change();
                $message = 'Password changed!';
            }
            
            $this->view->render($this->viewDir . 'index', [
                'data' => Myaccount::readData(),
                'message' => $message
            ]);
        }

    }

    // Uvjeti:
    // 1. password i repeat se moraju poklapati
    // 2. ako ih ne unese moram unset
    // 3. 