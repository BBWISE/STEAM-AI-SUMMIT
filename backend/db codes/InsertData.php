<?php
/* Importing other require PHP Files*/
require_once "./db codes/DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

class InsertData{
    private string $fName,$lName,$email,$phoneNumber,$Address,$schoolAddress,$schoolName ;

    /**
     * The below method helps to send New User's informations
     * into the user table in the database taking an input
     * of array.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    public function user($userDetails){
        $this->fName = $userDetails['fName'];
        $this->lName = $userDetails['lName'];
        $this->email = $userDetails['email'];
        $this->phoneNumber = $userDetails['phoneNumber'];
        $this->Address = $userDetails['Address'];
        $this->schoolName = $userDetails['schoolName'];
        $this->schoolAddress = $userDetails['schoolAddress'];

        $sql = "INSERT INTO `user` (`id`,`fname`,`lname`,`email`,`phone_no`,`address`,`schoolName`,`schoolAddress`) VALUES(NULL,'$this->fName','$this->lName','$this->email','$this->phoneNumber','$this->Address','$this->schoolName','$this->schoolAddress')";

        global $connect;

        if($connect -> query($sql)==true){
            return true;
        }else{
            //var_dump('failed: '.$connect->error);
            return false;
        }

    }

}

?>