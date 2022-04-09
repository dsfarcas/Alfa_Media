<?php

class ReclamatiiController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){        
        session_start();
        if(isset($_SESSION['user'])){
            $data = [];
            $data['title'] = 'PRIVATE Homepage';
            // $data['mainContent'] = '<h2>Private DATA</h2>';
            $data['mainContent'] = '<h3>' . 'HOME PAGE - PRIVATE VIEW' . '</h3>' . $this->render(APP_PATH.VIEWS.'reclamatii.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data = [];
            $data['title'] = 'Homepage - PUBLIC';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'reclamatii.html');
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);            
        }
    }
}

