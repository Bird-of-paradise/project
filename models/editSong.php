<?php

require_once 'php/functions.php';
require_once 'php/dbFunction.php';

$count = 0;
$newArtist = null;
$newFileName = null;
$newGenre = null;
$newName = null;
$newText = null;

if(isset($_POST['newArtist'])) {
	$newArtist = $_POST['newArtist'];
	$count++;
}
if(uploadSongFile('song', 70000)) {
	$newFileName = 'images/' . $_FILES['song']['name'];
	$count++;
}
if(isset($_POST['newGenre'])) {
	$newGenre = $_POST['newGenre'];
	$count++;
}
if(isset($_POST['newName'])) {
	$newName = $_POST['newName'];
	$count++;
}
if(isset($_POST['newText'])) {
	$newText = $_POST['newText'];
	$count++;
}

if($count === 0) {
	$_SESSION['errorMessages'] = 'You must change at least one of the values!';
    echo "<script> window.location.replace('userPanel.php?action_user=5') </script>";
	exit;
}

editSong($_SESSION['id_open_song'], $newArtist, $newFileName, $newGenre, $newName, $newText);
?>