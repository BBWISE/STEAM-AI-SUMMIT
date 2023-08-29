<?php
require_once "backend/Encryption/Encryption.php";
require_once "backend/db codes/DBConnector.php";

$connect = DBConnector::connectToDB();
$enc = new Encryption();


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
        <h1 style="text-align: center">STEAM AI SUMMIT FOR EDUCATORS</h1>
        <h3 style="text-align: center">Registration form</h3>
    <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
        S/N
    </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            Last Name
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            First Name
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            email
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            Phone Number
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            Address
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            Name of School
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            School Address
        </th>
        <th style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
            Designation
        </th>

    <?php
            $num = 1;
            foreach($result as $entry){
    ?>
        <tr>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $num;
                            $num +=1;
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['lname']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['fname']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['email']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['phone_no']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                           echo $enc->getAESDecrypt($entry['address']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['schoolName']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['schoolAddress']);
                ?>
            </td>
            <td style="border-style:solid; border-width: 1px; font-size: 19px; padding-left: 5px; padding-right: 5px;">
                <?php
                            echo $enc->getAESDecrypt($entry['designation']);
                ?>
            </td>

        </tr>
    <?php
            }
    ?>
    <tr></tr>

</table>
    <?php
}

?>