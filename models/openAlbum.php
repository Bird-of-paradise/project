<?php
echo '<div style="text-align: center">I am addAlbum.php.  I will read songs from database and will return an array.</div>';

require_once 'php/dbFunction.php';

// I need to know albumID!!!!!

$idOpenAlbum = $_GET['id_album'];
$_SESSION['id_open_album'] = $idOpenAlbum;
$rows = getSongs($idOpenAlbum);

if ($rows) { // TEST ALBUM_ID = 1 if you make test INSERT into table songs records where album id = 1
    return $rows;
} else {
    echo "There is no songs found for this album!";
}
