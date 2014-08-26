<?php

require_once 'php/functions.php';
require_once 'php/dbFunction.php';

if(isset($_POST['newName']) && $_POST['newName'] != '' ) {
    $newAlbumName = $_POST['newName'];
} else {
	$newAlbumName = null;
}

if(uploadImgFile('img', 200)) {
	$newFileName = 'images/' . $_FILES['img']['name'];
} else {
	if($newAlbumName === null) {
		$_SESSION['errorMessages'] = "You must change at least one of the values!";
        echo "<script> window.location.replace('userPanel.php?action_user=4') </script>";
    	exit;
	}
	$newFileName = null;
}


editAlbum($_SESSION["id_open_album"], $newFileName, $newAlbumName);
?>