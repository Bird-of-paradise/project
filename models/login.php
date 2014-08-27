<?php
$_SESSION['current_model'] = 'models/login.php';

require_once 'php/dbFunction.php';

if(version_compare(phpversion(), '5.5.0', '<')) {
	require_once 'php/passwordLib.php';
}

$userName = $_POST['userName'];
$password = $_POST['userPassword'];

$user = getUser($userName);

if ($user === false || !password_verify($password, $user['password'])) {

    $_SESSION['errorMessages'] = 'Invalid user name or password!';
    header("Location: index.php");
    exit;
} else {

    $_SESSION['user'] = $user ;
}
