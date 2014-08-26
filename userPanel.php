<?php
session_start();
require_once("controlers/controler.php");
require_once("views/header.php");
if(isset($_SESSION['alert'])){
    echo$_SESSION['alert'];
}
require_once($view);
require_once("views/footer.php");
?>

