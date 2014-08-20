<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: loginForm.php");
} else {
    $user = $_SESSION['user'];
}

include 'php/dbFunction.php';

print_r($_FILES);

if(isset($_POST['albumName'])){

    $albumName = $_POST['albumName'];

    $result = addAlbum($albumName, $user['id'], '');

    if($result){
        echo 'The ', $albumName, ' is added successfully!';
    }
}

