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
<div class="songs-container">
    <?php
    
    if (isset($_SESSION['errorMessages'])):
        echo $_SESSION['errorMessages'];
        unset($_SESSION['errorMessages']);
    else :
    ?>
    <ul class="graphic">
        <?php for ($i = 0; $i < count($rows); $i++) :
            ?>
            <li><a href="music\<?php echo($rows[$i]['file_name']) ?>"><?php echo($rows[$i]['name']) ?></a></li>
        <?php
        endfor;
        endif
        ?>
    </ul>
</div>









