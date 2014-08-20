<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="styles/loginForm.css" rel="stylesheet">
</head>
<body>
<?php
if(isset($_SESSION['errorMessages'])):
    ?>
    <div class="error">
        <?php
        foreach($_SESSION['errorMessages'] as $mes):
            echo $mes.'</br>';
        endforeach;
        unset($_SESSION['errorMessages']);
        ?>
    </div>
<?php
endif;
?>
<form action="registration.php" method="post">
    <input type="text" name="userName" placeholder="User Name" required>
    <input type="password" name="userPassword1" placeholder="Password" required>
    <input type="password" name="userPassword2" placeholder="Confirmed password" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="submit" value="Registration">
</form>
</body>
</html>