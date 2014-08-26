<nav>
    <ul>
        <li><a href="userPanel.php?action_user=4">Edit album</a></li>
        <li><a href="userPanel.php?action_user=def">View albums</a></li>
        <li><a href="userPanel.php?action_user=3">Add song</a></li>
        <li><a href="userPanel.php?action_user=log out">Log out</a></li>
    </ul>
</nav>
<div class="user"></div>
<hr/>
</header>.
<div class="main">
<?php
if (isset($_SESSION['errorMessages'])) {
    ?>
    <div class="error">
        <?php
        echo $_SESSION['errorMessages'];
        unset($_SESSION['errorMessages']);
        ?>
    </div>
<?php
}
?>

<form method="post" enctype="multipart/form-data">
    <label for="change-name">Change Name:</label>
    <input type="text" id="change-name" name="newName" value="<?php ?>"/><br/>
    <label for="change-picture">Change Picture:</label>
    <input type="file" name="img">

    <div>Choose an image (max size: 200K)</div>
    <input type="submit" name="action_user" value="Edit Album"/>
</form>