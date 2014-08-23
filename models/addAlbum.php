<?php
define('DEFAULT_IMG_ALBUM', 'default_img_album.jpg');

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

include_once 'php/dbFunction.php';

if (isset($_POST['albumName']) && $_POST['albumName'] != '' ) {

    $albumName = $_POST['albumName'];

    if (uploadImgFile('img', 200) == false) {

        $fileName = 'images/' . DEFAULT_IMG_ALBUM;
    } else {

        $fileName = 'images/' . $_FILES['img']['name'];
    }

    $result = addAlbum($albumName, $user['id'], $fileName);

    if ($result) {
        echo 'The ', $albumName, ' is added successfully!';
    }
}