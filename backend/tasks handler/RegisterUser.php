<?php
session_start();
require_once "./db codes/InsertData.php";
require_once "./db codes/DuplicateExist.php";
require_once "./Encryption/Encryption.php";

class RegisterUser{
    private array $userDetails = [], $OriginalUserDetails = [];
    // A constructor to help assign values into the private variables above.
    public function __construct($userDetails){
        $this->OriginalUserDetails = $userDetails;
        foreach($userDetails as $key=>$value){

            $enc = new Encryption();
            $this->userDetails[$key] = $enc->getAESEncrypt($value);

        }
    }


    // Check if user already exists
    private function existence(){
        $exists = DuplicateExist::exists($this->userDetails['email'], "user");
        if($exists){
            return true;
        }
        else{

            return false;
        }
    }

    // Register new User
    public function register(){
        if($this->existence()){
            $_SESSION['ERROR'] = "The email: ".$this->OriginalUserDetails['email']." already exists.";
            return false;
        }
        else{

            $register = new InsertData();
            $register->user($this->userDetails);
            return true;

        }

    }
}

?>