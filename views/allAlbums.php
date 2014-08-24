<link rel="stylesheet" href="../styles/allAlbums.css"/>
<?php
require_once '../models/allAlbums.php';
?>


<?php
while($info = mysql_fetch_array( $data )) {
    Print "<div class='albums'><a href=?action_user=2&id_album=".$info['id']."><h3>".$info['name'] . "</h3>". "<img src=".$info['img_file']." alt=".$info['name']."/></a></div>";
}
?>
