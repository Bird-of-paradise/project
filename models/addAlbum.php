<?php
define('DEFAULT_IMG_ALBUM', 'default_img_album.jpg');

include_once 'php/functions.php';

include_once 'php/dbFunction.php';

if (isset($_POST['albumName']) && $_POST['albumName'] != '') {

    $albumName = $_POST['albumName'];

    if (uploadImgFile('img', 200) == false) {

        $fileName = 'images/' . DEFAULT_IMG_ALBUM;
    } else {

        $fileName = 'images/' . $_FILES['img']['name'];
    }

    $result = addAlbum($albumName, $user['id'], $fileName);

    if ($result) {
        $_SESSION['alert'] =  "<script>alert('The  $albumName  is added successfully!')</script>";
         echo "<script> window.location.replace('userPanel.php?action_user=def') </script>";
        exit;
    }
} else {
    $_SESSION['errorMessages'] = "Put a album's name!" ;
    echo "<script> window.location.replace('userPanel.php?action_user=1') </script>";
    exit;
}
