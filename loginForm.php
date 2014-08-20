<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link href="styles/loginForm.css" rel="stylesheet">
</head>
<body>
<?php
    if(isset($_GET['error'])):
?>
<div class="error">
    <?php
    echo 'Invalid user name or password!'
    ?>
</div>
<?php
endif;
?>
    <form action="login.php" method="post">
        <input type="text" name="userName" placeholder="User Name" required>
        <input type="password" name="userPassword" placeholder="Password" required>
        <input type="submit" value="Log in">
        <a href="registrationForm.php">Registration</a>
    </form>
</body>
</html>