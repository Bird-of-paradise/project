<nav>
    <ul>
        <li><a href="userPanel.php?action_user=1">Add album</a></li>
        <li><a href="userPanel.php?action_user=log out">Log out</a></li>
    </ul>
</nav>
<div class="user"></div>
<hr/>
</header>
<div class="albums-container">
<?php
if (isset($_SESSION['errorMessages'])) {
    echo $_SESSION['errorMessages'];
    unset($_SESSION['errorMessages']);
} else {
    foreach ($albums as $album) {
        Print "<div class='albums'><a href=?action_user=2&id_album=" . $album['id'] . "><h3>" . $album['name'] .
            "</h3>" . "<img src=" . $album['img_file'] . " alt=" . $album['name'] . "/></a></div>";
    }
}
?>
</div>