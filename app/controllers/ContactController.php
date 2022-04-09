<?php

class ContactController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){        
        session_start();
        if(isset($_SESSION['user'])){
            $data = [];
            $data['title'] = 'Private Contact Page';
            // $data['mainContent'] = $this->render(APP_PATH.VIEWS.'homeView.html');
            $data['mainContent'] = '<h2>Private CONTACT Page</h2>' . $this->render(APP_PATH.VIEWS.'contactView.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data = [];
            $data['title'] = 'Homepage - PUBLIC';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'contactView.html');
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);            
        }
    }
}