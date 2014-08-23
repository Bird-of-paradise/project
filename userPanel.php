<?php
session_start();

require_once("controlers/controler.php");
require_once("views/testHeader.php");
?>
<!--This is temporary menu-->
    <div class="viewAlbums">
        <a href="userPanel.php?action_user=1">Add album</a>
        <a href="userPanel.php?action_user=2">Open album</a>
        <a href="#">Edit albums</a>
        <a href="userPanel.php?action_user=def">View albums</a>
        <a href="userPanel.php?action_user=log out">Log out</a>
    </div>

<?php
require_once($view);
require_once("views/footer.php");
?>

