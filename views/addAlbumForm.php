<nav>
    <ul>
        <li><a href="userPanel.php?action_user=def">View albums</a></li>
        <li><a href="userPanel.php?action_user=log out">Log out</a></li>
    </ul>
</nav>
<div class="user"></div>
<hr/>
</header>
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
    <input type="text" name="albumName" placeholder="Album Name" required>
    <input type="file" name="img" >
    <div>Choose an image (max size: 200K)</div>
    <input type="submit" name="action_user" value="Add Album">
</form>


