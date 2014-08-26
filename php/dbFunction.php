<?php
define('HOST_DATABASE', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DATABASE', 'album');

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
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "select * from users where name='$userName'";
    $result = setQuery($link, $sql);
    $row = mysql_fetch_assoc($result);
    mysql_free_result($result);
    mysql_close($link);

    if ($row) {
        return $row;
    } else {
        return false;
    }
}

//Add user information in database album
function addUser($user)
{
    $link = connectDatabase();
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "INSERT INTO users (name, password, email) " .
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
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "INSERT INTO albums (name, img_file, id_user) " .
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

//Add song in database album
function addSong($song, $idUser, $idAlbum, $fileName)
{
    //$text = mysql_real_escape_string($song['text']);

    $link = connectDatabase();
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "INSERT INTO songs (name, genre, artist, file_name, id_album, id_user, text) " .
           "VALUES ('{$song['name']}', '{$song['genre']}', '{$song['artist']}', '{$fileName}',".
            " '{$idAlbum}', '{$idUser}', '{$text}');";
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
function getAlbumsFromUser($user)
{
    $link = connectDatabase();
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "select name from albums where id_user = {$user['id']};";
    $result = setQuery($link, $sql);
    $rows = array();
    while ($currRow = mysql_fetch_array($result, MYSQL_BOTH)) {
        array_push($rows, $currRow['name']);
    }
    mysql_free_result($result);
    mysql_close($link);

    if ($rows) {
        return $rows;
    } else {
        return false;
    }
}

//get songs information by album_id
function getSongs($albumID)
{
    $link = connectDatabase();
    selectDatabase($link, MYSQL_DATABASE);
    $sql = "select * from songs where id_album = $albumID;";
    $result = setQuery($link, $sql);
    $rows = array();
    $totalRows = mysql_num_rows($result);

    //start the loop
    for ( $i = 0; $i < $totalRows; ++$i ) {
        $rows[$i] = mysql_fetch_array($result);
    }

    if ($rows) {
        return $rows;
    } else {
        return false;
    }
}

//get album
function getAlbum($id) {
	$link = connectDatabase();
	selectDatabase($link, 'album');
	
	$sql = "select * from albums where id=${id}";
	$result = setQuery($link, $sql);
    $row = mysql_fetch_assoc($result);
    mysql_free_result($result);
    mysql_close($link);

    if ($row) {
        return $row;
    } else {
        return false;
    }
}

//edit album
function editAlbum($id, $newImgName, $newName) {
	$link = connectDatabase();
	selectDatabase($link, MYSQL_DATABASE);
	
	$sql = "update albums set "; 
	if($newImgName !== null && $newName !== null) {
		$sql .= "img_file='${newImgName}', name='${newName}' ";
	} else {	
		if($newImgName !== null) {
			$sql .= "img_file='${newImgName}' ";
			$currentAlbum = getAlbum($id);
			unlink($currentAlbum["img_file"]);
		} else if($newName !== null) {
			$sql .= "name='${newName}' ";
		}
	}
	$sql .= "where id=${id}";
	
	setQuery($link, $sql);
    mysql_close($link);
}

//artist, file_name, genre, id_album, id_user, name, text
//edit song
function editSong($id, $newArtist, $newFileName, $newGenre, $newName, $newText) {
	$link = connectDatabase();
	selectDatabase($link, MYSQL_DATABASE);
	
	$count = 0;
	$sql = "update songs set ";
	if($newArtist !== null) {
		$sql .= "artist='${newArtist}', ";
		$count++;
	}
	if($newFileName !== null) {
		$sql .= "file_name='${newFileName}', ";
		$count++;
	}
	if($newGenre !== null) {
		$sql .= "genre='${newGenre}', ";
		$count++;
	}
	if($newName !== null) {
		$sql .= "name='${newName}', ";
		$count++;
	}
	if($newText !== null) {
		$sql .= "text='${newText}' ";
		$count++;
	}
	if($count === 1) $sql = str_replace(", ", " ", $sql);
	$sql .= "where id=${id}";
	
	setQuery($link, $sql);
	mysql_close($link);
}

//remove song
function removeSong($id) {
	$link = connectDatabase();
	selectDatabase($link, 'album');
	
	$sql = "delete from songs where id=${id};";
	
	setQuery($link, $sql);
	mysql_close($link);
}

function getAllAlbums(){
    $link = connectDatabase();
    selectDatabase($link, MYSQL_DATABASE);
    $data = mysql_query("SELECT * FROM albums") or die(mysql_error());
    $albums = array();

    while ($album = mysql_fetch_array($data)) {
        $albums[] = $album;
    };

    if(empty($albums)){
        return false;
    }

    return $albums;
}
