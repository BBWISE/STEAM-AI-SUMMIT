<?php
require_once "backend/Encryption/Encryption.php";
require_once "./db codes/DBConnector.php";

$connect = DBConnector::connectToDB();


$sql = "SELECT * FROM `user`";

$registration;

$result = $connect -> query($sql);

if ($result->num_rows > 0) {
    $registration = $result->fetch_all(MYSQLI_ASSOC);
    //return true; // Returns true if the email already exists.
}
else{
    $registration = "No Registration yet!";// Returns false if the email does not exists.
}

if($result == false){
    echo '<h2>'.$registration.'<h2>';
}
else{
?>
    <table>
        
        <thead>
            S/N
        </thead>
        <thead>
            S/N
        </thead>
        
        <tr>

        </tr>
        
    </table>
    <?php
}

?>