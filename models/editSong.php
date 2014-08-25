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
	header("Location: index.php?action_user=5");
	exit;
}

//and now here comes the big question about getting the song's id :D
editSong(1, $newArtist, $newFileName, $newGenre, $newName, $newText);
?>