<?php

class ContactformController extends AppController
{
    public function __construct(){
        $this->init();
    }
  
    public function init(){                   
            if(isset($_POST['contactemail']) 
                    && $_POST['contactemail'] != '' 
                    && $_POST['contactcontent'] != ''){                
                // echo "<pre>";
                //     print_r($_POST);
                // echo "</pre>";

                $name = $_POST['contactname'];
                $email = $_POST['contactemail'];
                $content = $_POST['contactcontent'];

                $mailTo = "test@test.com";
                $headers = "From: " . $email;
                $txt = "Ai primit un email de la " . $name . ".\n\n" . $content;

                mail($mailTo, $txt, $headers);
                $data['mainContent'] = '<h3 style="color: #00ffbf; justify-content: center">' . 'MESAJUL A FOST TRIMIS TRIMIS' . '</h3>';
                echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
                header('Refresh:2; url=home');                
            }
            else {
                echo '<h3 style="color:red; display: flex; justify-content: center">' . 'Mesajul NU a fost trimis.' . '</br>' . 'Reintrodu cu atenție datele' . '</h3>';
                header("Refresh:2; url=contact");
            }
    }  
}