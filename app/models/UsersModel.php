<?php

class UsersModel extends DBModel
{
    protected $name;
    protected $email;
    protected $password;

    public function __construct($userName='', $userEmail='', $pass=''){
        $this->name = $userName;
        $this->email = $userEmail;
        $this->password = $pass;
    }

    public function details(){
        return $this->name 
                . ' are e-mailul '
                . $this->email;
    }
   
    public function addUser($uName, $uEmail, $uPass){
		$q = "INSERT INTO `users_test`(`userName`, `userEmail`, `hashedPass`) VALUES (?,?,?)";
        $myHash = password_hash($uPass, PASSWORD_DEFAULT);
		// $result = $this->db()->query($q);
        $myPrep = $this->db()->prepare($q);
// types: s (string), i (integer)-nr.intregi, d (double)-nr.reale, b (blob)
        $myPrep->bind_param("sss", $uName, $uEmail, $myHash);
        $myPrep->execute();
        $myPrep->close();
        // return $result;
	}

    public function isAuth($uEmail, $uPass){
        $q = "SELECT * FROM `users_test` WHERE `userEmail` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $uEmail);
        $myPrep->execute();
        $result = $myPrep->get_result()->fetch_assoc();
        $myPrep->close();
        if($result){
            if(password_verify($uPass, $result['hashedPass'])){
                return true;
            }
            else return false;
        }
    }
}