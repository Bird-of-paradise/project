<nav>
    <ul>
    	<li><a href="javascript:removeAlbum(<?=$_SESSION['id_open_album']?>)">Remove Album</a></li>
        <li><a href="userPanel.php?action_user=4">Edit album</a></li>
        <li><a href="userPanel.php?action_user=def">View albums</a></li>
        <li><a href="userPanel.php?action_user=top 10">TOP 10 ALBUMS</a></li>
        <li><a href="userPanel.php?action_user=3">Add song</a></li>
        <li><a href="userPanel.php?action_user=8">Add comment</a></li>
        <li><a href="userPanel.php?action_user=9">View comments</a></li>
        <li><a href="userPanel.php?action_user=log out">Log out</a></li>
    </ul>
</nav>
<div class="user"></div>
<hr/>
<script type="text/javascript" src="js/ManageSongs.js"></script>
<script type="text/javascript" src="js/ManageAlbums.js"></script>
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
            <li>
				<a href="music/<?php echo($rows[$i]['file_name']) ?>"><?php echo($rows[$i]['name']) ?></a>
				<button onclick="editSong(<?=$rows[$i]['id']?>)">Edit</button> /
				<button onclick="removeSong(<?=$rows[$i]['id']?>, '<?=$rows[$i]['name']?>', '<?=$rows[$i]['file_name']?>')">Remove</button> /
				<button onclick="downloadSong('<?=$rows[$i]['file_name']?>')">Download Song</button>
			</li>
        <?php
        endfor;
        endif
        ?>
    </ul>
</div>









