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
            Myaccount::change();
            $this->view->render($this->viewDir . 'index', [
                'data' => Myaccount::readData()
            ]);
        }

    }