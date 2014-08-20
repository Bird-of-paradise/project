<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: loginForm.php");
}

echo 'Hello ',$_SESSION['userName'],'!';