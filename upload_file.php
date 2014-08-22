<?php
if(isset($_FILES['file'])) {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $error = $_FILES['file']['error'];

    if(isset($name)) {
        if(!empty($name)) {
            $location = "upload/";
            if(move_uploaded_file($tmp_name, $location . $name)) {
                echo "uploaded";
            }
        } else {
            echo "Please choose a file";
        }
    }
}
?>
<html>
<body>
<form action="upload_file.php" method="post"
      enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file"><br>
    <input type="submit" name="submitBtn" value="Upload">
</form>

</body>
</html>