<?php
if(isset($_SESSION['errorMessages'])) {
    ?>
    <div class="error"><?=$_SESSION['errorMessages']?></div>
<?php
}
?>

<form method="post" enctype="multipart/form-data">
	<label for="change-name">Change Name:</label>
	<input type="text" id="change-name" name="newName"/><br />
	<label for="change-picture">Change Picture:</label>
	<input type="file" name="img" >
    <div>Choose an image (max size: 200K)</div>
    <input type="submit" name="action_user" value="Edit Album"/>
</form>