<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Album</title>
    <link href="styles/loginForm.css" rel="stylesheet">
</head>
<body>
<form enctype="multipart/form-data" action="php/addAlbum.php" method="post">
    <input type="text" name="albumName" placeholder="Album Name" required>
    <input type="file" name="img" >
    <div>Choose an image (max size: 200K)</div>
    <input type="submit" value="Create Album">
</form>
</body>
</html>

