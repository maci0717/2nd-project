<?php 

    class ManagementController extends AutorizationController
    {
        
        private $viewDir = 'management' . 
        DIRECTORY_SEPARATOR;
    
        public function index()
        {
            $this->view->render($this->viewDir . 'index', [
                'data' => Management::readAll()
            ]);
        }

        public function post()
        {
            print_r($_FILES); echo '<br>';
            Management::insertPost();
            print_r($_FILES);
            $this->view->render($this->viewDir . 'index', [
                'data' => Management::readAll()
            ]);
        }
    }