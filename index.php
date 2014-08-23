<?php
session_start();
require_once("views/testHeader.php");
?>

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

<?php
require_once("views/footer.php");
?>
