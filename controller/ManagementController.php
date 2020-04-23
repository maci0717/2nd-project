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
            Management::insertPost();
            $this->view->render($this->viewDir . 'index', [
                'data' => Management::readAll()
            ]);
        }

        public function removePost()
        {
            Management::deletePost();
            $this->view->render($this->viewDir . 'index', [
                'data' => Management::readAll()
            ]);
        }

        public function countImages()
        {
            echo Management::count();          
        }
    }