<?php
session_start();

require_once("controlers/controler.php");
require_once("views/header.php");
?>
<!--This is temporary menu-->
<!--<div class="viewAlbums">*
    <a href="userPanel.php?action_user=1">Add album</a>
    <a href="userPanel.php?action_user=2">Open album</a>
    <a href="#">Edit albums</a>
    <!--I added this button just for debugging-->
<!-- <a href="userPanel.php?action_user=3">ADD SONG</a>
        <a href="userPanel.php?action_user=def">View albums</a>
        <a href="userPanel.php?action_user=log out">Log out</a>
    </div>-->

<?php
require_once($view);
require_once("views/footer.php");
?>

