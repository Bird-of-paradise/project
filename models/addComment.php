<?php

if (isset($_POST['text']) && $_POST['text'] != '') {

    include_once 'php/dbFunction.php';

    $commentContent = $_POST['text'];
    $result = addComment($commentContent, $user['id'], $_SESSION['id_open_album']);

    if ($result) {
        $_SESSION['alert'] = "<script>alert('The comment  is added successfully!')</script>";
        echo "<script> window.location.replace('userPanel.php?action_user=def') </script>";
        exit;
    }
} else {
    $_SESSION['errorMessages'] = "Don't sent empty comment!";
    echo "<script> window.location.replace('userPanel.php?action_user=7') </script>";
    exit;
}
