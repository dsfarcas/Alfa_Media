<?php

class SignupController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $uName = $_POST['signUpUserName'];
        $uEmail = $_POST['signUpUserEmail'];
        $uPass = $_POST['signUpPass1'];
        $uPass2 = $_POST['signUpPass2'];

        $userNew = new UsersModel;
        // $userNew->addUser($uName, $uPass, $uEmail
        if($uPass == $uPass2 && $uName != null){
            $userNew->addUser($uName, $uEmail, $uPass);
            echo '<h3 style="color:green; display: flex; justify-content: center">' . 'User-ul a fost adăugat.' . '</h3>';
            // echo "USER ADDED";
            header('Refresh:2; url=home');
        }
        else {
            // echo '<h3 style="color:red; display: flex; justify-content: center">' . 'User-ul NU a fost adăugat.' . '</br>' . 'Reintrodu cu atenție datele' . '</h3>';
            header('Refresh:2; url=home');
            }
    }    

} 