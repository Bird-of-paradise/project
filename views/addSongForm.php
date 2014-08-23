<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Album</title>
    <link href="styles/loginForm.css" rel="stylesheet">
</head>
<body>
<form enctype="multipart/form-data" action="php/addSong.php" method="post">
    <input type="text" name="name" placeholder="Song Name" >
    <input type="text" name="artist" placeholder="Artist" >
    <input type="text" name="genre" placeholder="Genre" >
    <textarea name="text" placeholder="Content"></textarea>
    <input type="file" name="song" >
    <div>Choice a mp3 file (max size: 15 MB)</div>
    <input type="submit" value="Add Song">
</form>
</body>
</html>
