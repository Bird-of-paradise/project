<?php

include_once 'php/functions.php';
include_once 'php/dbFunction.php';

if (isset($_POST['name']) && $_POST['name'] != '' && $_FILES['song']['name']) {

    $songName = $_POST['name'];


    $isUpload = uploadSongFile('song', 70000);

    if($isUpload){
        $result = addSong($_POST, $user['id'], $_SESSION['id_open_album'],$_FILES['song']['name']); // Как да намеря ид-то на албума Не ми е ясно!
    } else {
        $result = false;
    }

     if ($result) {
        echo 'The ', $songName, ' is added successfully!';
    }
}  else {
    if(!isset($_SESSION['errorMessages'])){
        $_SESSION['errorMessages'] = "Put a song's name!" ;
    }
    header("Location: userPanel.php?action_user=3");
    exit;
}