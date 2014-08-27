<?php

require_once 'php/dbFunction.php';

$albums = getTop10Albums();

if ($albums) { 
    return $albums;
} else {
    $_SESSION['errorMessages'] = "There are no albums" ;
}

?>