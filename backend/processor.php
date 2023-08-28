<?php
require_once "tasks handler/RegisterUser.php";

if(isset($_POST['LName'])){
    // Converting user inputs into an array

    $userDetails = [
        'fName'=>$_POST['FName'],
        'lName' => $_POST['LName'],
        'email'=>$_POST['email'],
        'phoneNumber' => $_POST['pNumber'],
        'Address' => $_POST['address'],
        'schoolName' => $_POST['schoolName'],
        'schoolAddress'=>$_POST['schoolAddress'],
    ];


    $userReg = new RegisterUser($userDetails);
    $reg = $userReg->register();

    if($reg == true){
        $email = $_POST['email'];
        $pN = $_POST['pNumber'];
        $_SESSION['MESSAGE'] = "Successful!\nShall contact you later on $email or $pN for further details.";
        header("location: ../registration.php");
    }
    else{
        header("location: ../registration.php");
    }
    unset($_POST['LName']);


}
else{
    if(isset($_POST['emailLogin'])){
        // Converting user inputs into an array
        $userDetails = [
            'email'=>$_POST['emailLogin'],
            'password'=>$_POST['passwordLogin']
        ];
        // Validating user inputs
        if(validator2($userDetails) === null){

            $userLogin = new UserLogin();
            $uLogin = $userLogin->login($userDetails);
            if(is_array($uLogin)){
                $_SESSION['id'] = $uLogin['id'];
                $_SESSION['NAME'] = $uLogin['lname']." ".$uLogin['fname'];

                unset($_POST['emailLogin']);
                unset($_POST['passwordLogin']);
                header("location: ../frontend/market.php");
            }
            else{
                unset($_POST['emailLogin']);
                unset($_POST['passwordLogin']);
                $_SESSION['LOGIN_ERROR'] = "Invalid login details !!";
                header("location: ../frontend/login.php");
            }
        }
        else{
            $_SESSION['LOGIN_ERROR'] = validator2($userDetails);

            header("location: ../frontend/login.php");
        }



    }
}
?>