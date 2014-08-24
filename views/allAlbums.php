<link rel="stylesheet" href="../styles/table.css"/>
<?php
require_once '../models/allAlbums.php';
?>


<?php
while($info = mysql_fetch_array( $data )) {
    Print "<div class='albums'><h3>".$info['name'] . "</h3>". "<img src=".$info['img_file']." alt=".$info['name']."/>"."</div>";
}
?>
