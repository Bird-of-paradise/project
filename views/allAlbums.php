<?php
foreach($albums as $album){
    Print "<div class='albums'><a href=?action_user=2&id_album=" . $album['id'] . "><h3>" . $album['name'] .
        "</h3>" . "<img src=" . $album['img_file'] . " alt=" . $album['name'] . "/></a></div>";
}

?>
