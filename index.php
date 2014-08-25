<?php
session_start();
?>
<link rel="stylesheet" href="styles/style.css"/>
<div class="main">

    <div class="indexLogo">
        <img src="images/Logo.png" alt="Logo"/>
        <div class="login">
            <?php
                if(isset($_GET['registration'])){
                    require_once("views/registrationForm.php");
                } else {
                    require_once("views/loginForm.php");
                }?>
        </div>
    </div>

</div>
