<?php
session_start();
$userName = $_POST['userName'];
$password1 = $_POST['userPassword1'];
$password2 = $_POST['userPassword2'];
$email = $_POST['email'];

include 'php/dbFunction.php';

$user = getUser($userName);

if($user){
   $errorMessages[0] = 'The user name exist!';
}

if($password1 !== $password2){
    $errorMessages[1] = 'The first and second password are different!';
}

if($userName == ''){
    $errorMessages[2] = 'The user name is required!';
}

if($email == ''){
    $errorMessages[3] = 'The e-mail is required!';
}

if($password1 == ''){
    $errorMessages[4] = 'The password is required!';
}

if(isset($errorMessages)){
    $_SESSION['errorMessages'] = $errorMessages;
    header("Location: registrationForm.php");
}

$_SESSION['userName'] = $userName;
header("Location: userPanel.php");

//TODO Add user in database