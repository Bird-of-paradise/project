<?php
include_once 'php/dbFunction.php';
$comments = getComments();

if ($comments) { // TEST ALBUM_ID = 1 if you make test INSERT into table songs records where album id = 1
    return $comments;
} else {
    $_SESSION['errorMessages'] = "There are no comments" ;
}

