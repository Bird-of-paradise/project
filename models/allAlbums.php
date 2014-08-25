<?php

////define('DB_NAME', 'localhost');
////define('DB_USER', 'root');
////define('DB_PASSWORD', '');
////define('DB_HOST', 'Localhost');
////$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
////if (!$link) {
////    die('Error: Could not connect');
////}
////$db_selected = mysql_select_db(DB_NAME, $link);
////if (!$db_selected) {
////   die('Error');
//}
//echo('conected<br/>');
//$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
//$data = mysql_query("SELECT * FROM albums") or die(mysql_error());
//$albums = mysql_fetch_array($data);
include_once 'php/dbFunction.php';
$albums = getAllAlbums();



