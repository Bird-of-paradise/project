<?php
define( 'HOST_DATABASE', 'localhost');
define( 'MYSQL_USER', 'root');
define( 'MYSQL_PASSWORD', '');

//connect with database
function connectDatabase()
{
    $link = mysql_connect(HOST_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    } else {
        return $link;
    }
}

//select database
function selectDatabase($link, $database)
{
    if (!mysql_select_db($database, $link)) {
        echo 'Could not select database';
        exit;
    }
}

//SQL query
function setQuery($link, $sql)
{
 //   $sql = "select * from users where name='$userName'";
    $result = mysql_query($sql, $link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    } else {
        return $result;
    }
}

//get user information
function getUser($userName)
{
    $link = connectDatabase();
    selectDatabase($link, 'album');
    $sql = "select * from users where name='$userName'";
    $result = setQuery($link, $sql);
    $row = mysql_fetch_assoc($result);
    mysql_free_result($result);
    mysql_close($link);

    if($row){
        return $row;
    } else {
        return false;
    }
}

//Add user information in database album
function addUser($user)
{
    $link = connectDatabase();
    selectDatabase($link, 'album');
    $sql = "INSERT INTO users (name, password, email) ".
        "VALUES ('{$user['userName']}', '{$user['userPassword1']}', '{$user['email']}');";
    $result = setQuery($link, $sql);
    mysql_close($link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    } else {
        return $result;
    }
}

//Add new album in database album
function addAlbum($albumName, $userId, $imgFileName)
{
    $link = connectDatabase();
    selectDatabase($link, 'album');
    $sql = "INSERT INTO albums (name, img_file, id_user) ".
        "VALUES ('$albumName', '$imgFileName', '$userId');";
    $result = setQuery($link, $sql);
    mysql_close($link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    } else {
        return $result;
    }
}

//get album information
function getAlbumsFromUser($user) {
	$link = connectDatabase();
	selectDatabase($link, 'album');
	$sql = "select name from albums where id_user = {$user['id']};";
	$result = setQuery($link, $sql);
	$rows = array();
	while($currRow = mysql_fetch_array($result, MYSQL_BOTH)) {
		array_push($rows,$currRow['name']);
	}
    mysql_free_result($result);
    mysql_close($link);
    
    if($rows) {
    	return $rows;
    } else {
    	return false;
    }
}

