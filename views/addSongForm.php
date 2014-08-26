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
</header>
<div class="main">
<?php
if (isset($_SESSION['errorMessages'])):
    ?>
    <div class="error">
        <?php
        echo $_SESSION['errorMessages'];
        unset($_SESSION['errorMessages']);
        ?>
    </div>
<?php
endif;
?>
<form enctype="multipart/form-data" action="userPanel.php" method="post">
    <input type="text" name="name" placeholder="Song Name"  required>
    <input type="text" name="artist" placeholder="Artist" >
    <input type="text" name="genre" placeholder="Genre" >
    <textarea name="text" placeholder="Content"></textarea>
    <input type="file" name="song" >
    <div>Choose a mp3 file (max size: 15 MB)</div>
    <input type="submit" name="action_user" value="Add Song">
</form>

