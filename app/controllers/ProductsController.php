<?php

class ProductsController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();
        if(isset($_SESSION['user'])){
            $data = [];
            $data['title'] = 'Private PRODUCTS Page';
            $data['mainContent'] = '<h2>Private PRODUCTS Page</h2>' . $this->render(APP_PATH.VIEWS.'productsView.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data = [];
            $data['title'] = 'Products';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'productsView.html');
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);                
        }
    }
}