<?php
require_once 'php/dbFunction.php';

// I need to know albumID!!!!!

if(isset($_GET['id_album'])){
    $idOpenAlbum = $_GET['id_album'];
    $_SESSION['id_open_album'] = $idOpenAlbum;
} else {
    $idOpenAlbum =  $_SESSION['id_open_album'];
}

$rows = getSongs($idOpenAlbum);

if ($rows) { // TEST ALBUM_ID = 1 if you make test INSERT into table songs records where album id = 1
    return $rows;
} else {
    $_SESSION['errorMessages'] = "There are no songs in this album" ;
    unset($_SESSION['errorMessages']);
}
