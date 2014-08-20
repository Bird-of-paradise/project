<?php
$hostDatabase = 'localhost';
$mysqlUser = 'root';
$mysqlPassword = '';

//connect with database
function connectDatabase()
{
    global $hostDatabase, $mysqlUser, $mysqlPassword;
    $link = mysql_connect($hostDatabase, $mysqlUser, $mysqlPassword);
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




