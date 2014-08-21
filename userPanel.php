<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: loginForm.php");
    exit;
} else {
    $user = $_SESSION['user'];
}
unset($_POST['albumName']);
?>

<?php
require_once 'php/dbFunction.php';
require_once("php/header.php");
?>

<div id="manage-albums">
<?php
require_once 'addAlbumForm.php';
?>
</div>

<?php
if(isset($_POST['albumName']) && $_POST['albumName'] != ''){
    require_once 'php/addAlbum.php';
}
?>

<?php
$albumsFromUser = getAlbumsFromUser($user);
foreach ($albumsFromUser as $album) : 
?>
	<div class="album-box">
		<span class="album-title"><?=$album?></span>
	</div>
<?php 
endforeach; 
?>

<?php
require_once("php/footer.php");
?>