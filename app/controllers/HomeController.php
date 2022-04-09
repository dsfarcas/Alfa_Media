<?php

class HomeController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        // include APP_PATH.VIEWS.'layout.html';
        session_start();
        if(isset($_SESSION['user'])){
            $data = [];
            $data['title'] = 'PRIVATE Homepage';
            // $data['mainContent'] = '<h2>Private DATA</h2>';
            $data['mainContent'] = '<h3>' . 'HOME PAGE - PRIVATE VIEW' . '</h3>' . $this->render(APP_PATH.VIEWS.'homeView.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data = [];
            $data['title'] = 'Homepage - PUBLIC';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'homeView.html');
            $data['cumcomand'] = $this->render(APP_PATH.VIEWS.'cumcomand.html'); 
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);            
        }
    }
}