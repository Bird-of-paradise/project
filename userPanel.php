<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: loginForm.php");
    exit;
} else {
    $user = $_SESSION['user'];
}

?>

<?php
include 'php/dbFunction.php';

//print_r($_FILES);

require_once("php/header.php");
?>


<form method="post">
	<label for="album-name">Enter album's name:</label><br />
	<input type="text" id="album-name" name="albumName"/><br />
	<input type="submit" value="Create New Album"/>
</form>

<?php
if(isset($_POST['albumName']) && $_POST['albumName'] != ''){

    $albumName = $_POST['albumName'];

    $result = addAlbum($albumName, $user['id'], '');

    if($result){
        echo 'The ', htmlentities($albumName), ' is added successfully!';
    }
>>>>>>> .r17
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