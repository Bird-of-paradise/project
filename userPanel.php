<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: loginForm.php");
}

include 'php/dbFunction.php';

echo 'Hello ',$_SESSION['user']['name'],'!';

$result = addAlbum('100-gaidi', $_SESSION['user']['id'], 'image/100-gaidi.png');

if($result){
    echo 'The album is added successfully!';
}