<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../loginForm.php");
    exit;
} else {
    $user = $_SESSION['user'];
}
header('Content-Type: text/html; charset=utf-8');

function uploadImgFile($fileInputValue, $maxSizeInKB)
{
    if ($_FILES[$fileInputValue]["error"] === 4) {
        return false;
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES[$fileInputValue]["name"]);
    $extension = strtolower(end($temp));

    if ((($_FILES[$fileInputValue]["type"] == "image/gif")
            || ($_FILES[$fileInputValue]["type"] == "image/jpeg")
            || ($_FILES[$fileInputValue]["type"] == "image/jpg")
            || ($_FILES[$fileInputValue]["type"] == "image/pjpeg")
            || ($_FILES[$fileInputValue]["type"] == "image/x-png")
            || ($_FILES[$fileInputValue]["type"] == "image/png"))
        && ($_FILES[$fileInputValue]["size"] < $maxSizeInKB * 1000)
        && in_array($extension, $allowedExts)
    ) {

        if ($_FILES[$fileInputValue]["error"] > 0) {
            echo "Error: " . $_FILES[$fileInputValue]["error"] . "<br>";
        } else {

            $targetPath = realpath("../image/");

            $targetPath = $targetPath . DIRECTORY_SEPARATOR . basename($_FILES['img']['name']);

            if (!move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)) {

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

include_once 'dbFunction.php';

if (isset($_POST['albumName'])) {

    $albumName = $_POST['albumName'];

    $result = addAlbum($albumName, $user['id'], 'image/'. $_FILES['img']['name']);


    uploadImgFile('img', 200);

    if ($result) {
        echo 'The ', $albumName, ' is added successfully!';
    }
}
