<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template</title>
    <?php
        include 'assets/php/dependencies.php';?>
</head>
<body class="background-colour book">
    <?php include 'assets/php/header.php'?>

<?php
    open_row('');
    echo" ";
    close_row();
    open_row('');
    form('Forgot Password', 'A reset link will be sent to your email.',['Email'],[],'Reset', 'center');
    echo "<div class='book center-txt'>Don't have an account? <a href='register.php' class='italic'>Sign up.</a></div>";
    echo "<div class='book center-txt'><a href='login.php' class='italic'>Login instead</a></div>";
    close_row();
?>

</body>
</html>