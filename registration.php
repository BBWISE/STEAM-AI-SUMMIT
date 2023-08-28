<?php
session_start();


?>
<!DOCTYPE html >
<html>
<head>
    <title>UNESCO Digital Learning Week 2023</title>
    <link rel="stylesheet" href="CSS/styles.css" />
</head>

<body>
    <div id="headDiv">
        <ul>
            <li id="supps">
                <h2 id="topHead">UNESCO Digital Learning Week 2023</h2>
            </li>
            <li id="supps">
                <img src="imgs/kwaraTech.png" id="kwaraTechLogo" />
            </li>
        </ul>


    </div>
    <div id="_fistSection">
        <br/>
        <form action="backend/processor.php" method="post">
            <h2>
                Please fill-in your details carefully!
            </h2>
            <?php
            if(isset($_SESSION['ERROR'])){
                
                $error = $_SESSION['ERROR'];
                ?>
                 <h2 style="color: red"><?php echo $error;?></h2>
            <?php
                 unset($_SESSION['ERROR']);
             }
            if(isset($_SESSION['MESSAGE'])){
                $error = $_SESSION['MESSAGE'];
                    ?>
                    <h2 style="color: green">
                        <?php echo $error;?>
                    </h2>
                    <?php
                unset($_SESSION['MESSAGE']);
             }
            ?>
            <label id="laa">
                Surname:<br/>
                <input type="text" name="LName" required placeholder="enter your family name here..."/>
            </label><br/>
            <label id="laa">
                First name:<br />
                <input type="text" name="FName" required placeholder="enter your personal name here..." />
            </label><br/>
            <label id="laa">
                Email:<br />
                <input type="email" name="email" required placeholder="please enter an active email here..." />
            </label><br/>
            <label id="laa">
                Active Phone Number (<i>your WhatsApp number preferred</i>):<br />
                <input type="number" name="pNumber" required placeholder="your personal phone number" />
            </label><br />
            <label id="laa">
                Address:<br />
                <input type="text" name="address" required placeholder="enter your contact address..." />
            </label><br />
            <label id="laa">
                School Name:<br />
                <input type="text" name="schoolName" required placeholder="Enter the name of the School you are serving..." />
            </label><br />
            
            <label id="laa">
                School Address:<br />
                <input type="text" name="schoolAddress" required placeholder="Enter the address of the School..." />
            </label>
            <br/>
            <button type="submit">Submit</button>
        </form>
    </div>

    <footer id="footer">
        <ul id="supps">
            <li id="supps">
                <img src="imgs/unesco.jpeg" id="kwaraTechLogo2" />
            </li>
            <li id="supps">
                <img src="imgs/tech2GrassrootsAfrica.jpg" id="kwaraTechLogo3" />
            </li>
            <li id="supps">
                <img src="imgs/nitda.jpeg" id="kwaraTechLogo4" />
            </li>
            <li id="supps">
                <img src="imgs/MoE.png" id="kwaraTechLogo5" />
            </li>
            <li id="supps">
                <img src="imgs/kwaraTech.jpg" id="kwaraTechLogo6" />
            </li>
            <li id="supps">
                <img src="imgs/KwaraStateELibraryTechHub.png" id="kwaraTechLogo7" />
            </li>
        </ul>
    </footer>

</body>
</html>
