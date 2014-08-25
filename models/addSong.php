<?php

function uploadSongFile($fileInputValue, $maxSizeInKB)
{
    if ($_FILES[$fileInputValue]["error"] === 4) {
        return false;
    }

    if (($_FILES[$fileInputValue]["type"] == "audio/mp3")
            || ($_FILES[$fileInputValue]["type"] == "audio/mp4")
            || ($_FILES[$fileInputValue]["type"] == "audio/mpeg")
            || ($_FILES[$fileInputValue]["type"] == "audio/wav")
            && ($_FILES[$fileInputValue]["size"] < $maxSizeInKB * 1000)
    ) {

        if ($_FILES[$fileInputValue]["error"] > 0) {
            echo "Error: " . $_FILES[$fileInputValue]["error"] . "<br>";
        } else {

            $targetPath = realpath("music/");

            $targetPath = $targetPath . DIRECTORY_SEPARATOR . basename($_FILES[$fileInputValue]['name']);

            if (!move_uploaded_file($_FILES[$fileInputValue]['tmp_name'], $targetPath)) {

                echo "There was an error uploading the file, please try again!";
                return false;
            }
        }

    } else {
        echo "Invalid file format or size is bigger of $maxSizeInKB K";
        return false;
    }

    return true;
}


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
}
