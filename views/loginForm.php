<?php
if (isset($_SESSION['errorMessages'])):
    ?>
    <div class="error">
        <?php
        echo $_SESSION['errorMessages'];
        unset($_SESSION['errorMessages']);
        ?>
    </div>
<?php
endif;
?>
<form action="userPanel.php" method="post">
    <input type="text" name="userName" placeholder="User Name" required>
    <input type="password" name="userPassword" placeholder="Password" required>
    <input type="submit" name='action_guest'; value="Log in">
    <a href="index.php?registration=true">Registration</a>
</form>
