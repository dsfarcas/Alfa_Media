<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $uEmail = $_POST['userEmail'];
        $uPass = $_POST['userPass'];

        $user = new UsersModel;
        if($user->isAuth($uEmail, $uPass)){
            echo 'USER AUTHENTICATED';
            session_start();
            $_SESSION['user'] = $uEmail;
            $data = [];
            $data['title'] = 'Homepage';
            $data['mainContent'] = '<h3>' . 'HOME PAGE - PRIVATE VIEW' . '</h3>' . $this->render(APP_PATH.VIEWS.'homeView.html');
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            echo "USER NEAUTENTIFICAT";
            header("Refresh:3; url=home");
        }
    }
}