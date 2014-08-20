<?php
session_start();
$userName = $_POST['userName'];
$password = $_POST['userPassword'];

include 'php/dbFunction.php';

$user = getUser($userName);

if($user === false || $user['password'] !==  $password){
    header("Location: loginForm.php?error=1");
} else {
    $_SESSION['user'] = $user;
    header("Location: userPanel.php");
}
