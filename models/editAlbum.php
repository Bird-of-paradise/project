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
		$_SESSION['errorMessages'] = $errorMessages;
		$errorMessages = "You must change at least one of the values!";
		header("Location: index.php?action_user=4");
    	//exit;
	}
	$newFileName = null;
}


//TODO: id's must change dynamically
editAlbum(21, $newFileName, $newAlbumName);
?>