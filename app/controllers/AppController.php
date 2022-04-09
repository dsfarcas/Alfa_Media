<?php

class AppController
{
    protected $routes = [
                        'home' => 'HomeController',
                        'products' => 'ProductsController',
                        'portfolio' => 'PortfolioController',
                        'contact' => 'ContactController',
                        'login' => 'LoginController',
                        'logout' => 'LogoutController',
                        'signup' => 'SignupController',
                        'contactform' => 'ContactformController',

                        'cumcomand' => 'CumcomandController',
                        'cumcumpar' => 'CumcumparController',
                        'livrare' => 'LivrareController',
                        'reclamatii' => 'ReclamatiiController',
                        'despre' => 'DespreController',
                        'cariere' => 'CariereController',
                        'contacteaza' => 'ContacteazaController',
                        'confidentialitate' => 'ConfidentialitateController'                        
                        ];
    
    public function __construct(){
        // echo "TOTUL E OK!".__FILE__;
        // include APP_PATH.VIEWS.'index.html';
        $this->init();
    }

    public function init(){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else $page = 'home'; // landing page

        if(array_key_exists($page, $this->routes)){
            $className = $this->routes[$page];
        }
        else $className = $this->routes['home'];

        new $className;
    }

    public function render($page, $data=array()){
        $template = file_get_contents($page);
        preg_match_all("[{{\w+}}]", $template, $matches);
        foreach($matches[0] as $value){         
            $item = str_replace("{{", "", $value);
            $item = str_replace("}}", "", $item);

            if(array_key_exists($item, $data)){
                $template = str_replace($value, $data[$item], $template);
            }            
        }
        return $template;
    }

}