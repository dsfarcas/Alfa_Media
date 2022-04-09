<?php

class PortfolioController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        if(isset($_SESSION['user'])){
            $data = [];
            $data['title'] = 'Private Portfolio Page';
            $data['mainContent'] = '<h2>Private PORTFOLIO Page</h2>' . $this->render(APP_PATH.VIEWS.'portfolioView.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data = [];
            $data['title'] = 'Portfolio';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'portfolioView.html');
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);            
        }
    }
}