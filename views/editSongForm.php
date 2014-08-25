<?php
if(isset($_SESSION['errorMessages'])) {
	?>
	<div class="error"><?=$_SESSION['errorMessages']?></div>
<?php
}
?>

<form enctype="multipart/form-data" method="post">
	<label for="change-artist">Change Artist:</label>
	<input type="text" id="change-artist" name="newArtist"/>
	<label for="change-file">Change File:</label>
	<input type="file" id="change-file" name="newFile"/>
	<label for="change-genre">Change Genre:</label>
	<input type="text" id="change-genre" name="newGenre"/>
	<label for="change-name">Change Name:</label>
	<input type="text" id="change-name" name="newName"/>
	<label for="change-text">Change Text:</label>
	<input type="text" id="change-text" name="newText"/>
	<input type="submit" name="action_user" value="Edit Song"/>
</form>